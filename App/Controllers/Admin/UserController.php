<?php

namespace App\Controllers\Admin;

use App\Models\User;
use \App\Helpers\Api;
use App\Models\Api as ModelsApi;
use Illuminate\Support\Facades\DB;


class UserController extends AdminController
{
    public function index()
    {
        $usuarios =  User::all();
        echo $this->view()->render("clients", [
            'usuarios' => $usuarios
        ]);
    }
    public function cadastro($data)
    {
        $userData = filter_var_array($data);

        if (is_array($userData)) {
            $cadastro = User::create([
                'username' => $userData['username'],
                'last_name' => $userData['last_name'],
                'email' => $userData['email'],
                'password' => password_hash($userData['password'], PASSWORD_BCRYPT),
                'permissao' => intval($userData['permissao']),
            ]);

            if ($cadastro) {
                ModelsApi::create([
                    'user_id' => $cadastro->id,
                    'session' => $this->random()->geraSenha(12),
                ]);
                if (!empty($_FILES['avatar'])) {
                    $diretorio = dirname(dirname(dirname(__DIR__))) . '/public/assets/img/';
                    $savedFile = $this->saveFile($_FILES['avatar'], $diretorio);
                }
                if ($savedFile) {
                    User::where('id', $cadastro->id)->update([
                        'avatar' => $savedFile
                    ]);
                }
                $this->router()->redirect("/admin/users");
            }
        }
    }
    
    function saveFile($file, $uploadDir)
    {
        $fileName = $file['name'];
        $fileTempName = $file['tmp_name'];
        $fileType = $file['type'];
        $fileSize = $file['size'];

        // Verifica se o arquivo é uma imagem
        $isImage = strpos($fileType, 'image') !== false;

        // Gera um nome de arquivo único
        $uniqueFileName = md5(uniqid(rand(), true)) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

        // Move o arquivo temporário para o diretório de upload
        if (move_uploaded_file($fileTempName, $uploadDir . $uniqueFileName)) {
            return $uniqueFileName;
        } else {
            return false;
        }
    }

   function geraToken($data)
    {
        if (!empty($data['id']) && isset($data['id'])) {
            $usuarios = User::where('id', $data['id'])->first();
            $session = ModelsApi::where('user_id', $usuarios->id)->first();
             
            if (empty($session->token)) {
                echo json_encode(["status" => "error", "message" => "Usuario não possui Token Cadastrado"] );
                die;
            } else {
                echo json_encode(["status" => "success", "message" => "Usuario já possui Token", "type" => "successToken"]);
                die;
            }
        }
        if (!empty($data['idInput']) || $data['idInput']) {
            $user = User::where('id', $data['idInput'])->first();
            $session = ModelsApi::where('user_id', $user->id)->first();
            $token = (new Api())->generateToken(['session' => $session->session])->token;
            $UpdateToken = ModelsApi::where(['session' => $session->session])->update(['token' => $token]);
            
            if ($UpdateToken) {
                echo json_encode(["status" => "success", "message" => 'Token Adcionando com sucesso']);
                die;
            } else {
                echo json_encode(["status" => "error", "message" => 'Não foi possivel adicionar o Token ']);
                die;
            } 
        }
    }

    
}
