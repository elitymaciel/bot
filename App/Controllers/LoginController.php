<?php

namespace App\Controllers;

use Exception;
use App\Models\User;
use App\Helpers\Email;
use League\Plates\Engine;
use App\Helpers\Notification;
use CoffeeCode\Router\Router;


class LoginController
{
    private $view;
    private $router;
    private $permission;

    public function __construct()
    {
        $this->router = new Router(SITE["base_url"]);
        $this->view = new Engine(__DIR__ . '/../../public/login');
        $this->view->addData(['empresa' => 'Solar tech Solutions'], '_theme');
    }

    public function login(array $data)
    {
        echo $this->view->render("login");
    }
    public function auth(array $data)
    {
        $email = htmlspecialchars(trim($data['email']));
        $password = htmlspecialchars(trim($data['password']));
        if (empty($email) || empty($password)) {
            (new Notification())->showToastrNotification('error', 'Email e senha são obrigatórios.');
            $this->router->redirect("/login");
        }

        $login = User::where('email', $email)->first();
        if (!$login) {
            (new Notification())->showToastrNotification('error', 'Usuário não encontrado.');
            $this->router->redirect("/login");
        }

        if (!password_verify($password, $login->password) || $login->is_locked > 0) { 
            $login_attempts = isset($_SESSION['login_attempts']) ? intval($_SESSION['login_attempts']) : 0;
            if ($login_attempts >= MAX_LOGIN_ATTEMPTS) {
                User::where('id', $login->id)->update(['is_locked' => 1]);
                (new Notification())->showToastrNotification('error', 'Sua conta está bloqueada.');
                $this->router->redirect("/login");
            }
            $_SESSION['login_attempts'] = $login_attempts + 1; 
            (new Notification())->showToastrNotification('error', 'Email ou senha incorretos.');
            $this->router->redirect("/login");
        }

        if ($login->reset_password == 1) {
            $this->router->redirect("login/new_password/{$login->id}");
        }
        $permission = $login->permissao == 1 ? 'admin' : 'client';
        $_SESSION['session'] = session_create_id();
        $_SESSION['nome'] = htmlspecialchars($login->username);
        $_SESSION['lastname'] = htmlspecialchars($login->last_name);
        $_SESSION['email'] = htmlspecialchars($login->email);
        $_SESSION['api_session'] = $login->id_session ? htmlspecialchars($login->id_session) : 0;
        $_SESSION['permissao'] = $permission;
        $_SESSION['avatar'] = htmlspecialchars($login->avatar);
        $_SESSION['logado'] = true;

        session_regenerate_id(true);

        (new Notification())->showToastrNotification('success', 'Login efetuado com sucesso!');

        $this->router->redirect("/" . $permission);
    }

    public function reset(array $data): void
    {
        $geraSenha = new \App\Helpers\Senha();
        $email = new Email();
        if (!empty($data['email'])) {
            /** Verifica se o array no campo email esta vazio */
            $verifica_email = (new User())->find("email = :e", "e={$data['email']}")->fetch();
            if (!$verifica_email) {
                (new Notification())->showToastrNotification('error', 'Email não exite ou incorreto.');
                $this->router->redirect("/login");
            } else {
                $password = $geraSenha->geraSenha(8, false, true, false);
                $updateUsuario = (new User())->findById($verifica_email->id);
                $updateUsuario->password = password_hash($password, PASSWORD_BCRYPT);
                $updateUsuario->reset_password = 1;
                /** Marcapara o usuario alterar a senha no proximo login */
                if ($updateUsuario->save()) {
                    $email->add(
                        "Reset de Senha",
                        "<h1>Sua Nova senha</h1><b>" . $password . "</b>",
                        "maciel Oliveira",
                        $verifica_email->email
                    )->send();
                    if (!$email->error()) {
                        (new Notification())->showToastrNotification('success', 'Senha resetada!');
                        $this->router->redirect("/");
                    } else {
                        echo $email->error()->getMessage();
                    }
                }
            }
        }
        echo $this->view->render("reset");
    }

    public function novaSenha($data): void
    {
        $id = $data['id'];
        unset($data['id']);
        $update_senha = (new User())->findById($id);
        if (isset($data['password'])) {
            if ($data['password'] == $data['password2']) {
                $update_senha->password = password_hash($data['password'], PASSWORD_BCRYPT);
                $update_senha->reset_password = 0; //Marca para o usuario altera '1 sim', '0 não'
                if ($update_senha->save()) {
                    (new Notification())->showToastrNotification('success', 'Senha cadastrada com sucesso');
                    $this->router->redirect("/");
                }
            } else {
                (new Notification())->showToastrNotification('error', 'Error as senha digitadas não são iguais!');
                $this->router->redirect("/login/novasenha/$id");
            }
        } else {
            echo $this->view->render("novasenha");
        }
    }

    public function logout(array $data): void
    {
        session_destroy();
        $this->router->redirect("login");
    }
}
