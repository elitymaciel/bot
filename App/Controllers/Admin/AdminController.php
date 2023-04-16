<?php

namespace App\Controllers\Admin;
 
use App\Helpers\Notification;
use App\Helpers\Senha;
use CoffeeCode\Router\Router;
use League\Plates\Engine;

class AdminController
{
    private $view;
    private $templateError;
    private $router;
    private $random;
    private $notification;

    public function __construct()
    {
        $this->notification = new Notification();
        
        if (empty($_SESSION['logado'])) {
            $this->notification->showToastrNotification('error', 'Faça login para acessar o painel!');
            $this->router = new Router(SITE["base_url"]);
            $this->router->redirect("login");
        }

        if ($_SESSION['permissao'] !== 'admin') {
            $this->notification->showToastrNotification('error', 'Você não tem permissão para acessar esta página!');
            $this->router = new Router(SITE["base_url"]);
            $this->router->redirect("client");
        }

        $this->random = new Senha();
        $this->router = new Router(SITE["base_url"]);
        $this->view = new Engine(__DIR__ . '/../../../public/admin');
        $this->templateError = new Engine(__DIR__ ."/../../../public/error");
    }

    public function view()
    {
        $this->view->addData(['empresa' => 'Solar tech Solutions'], '_themeAdmin');
        return $this->view;
    }

    public function random()
    {
        return $this->random;
    }

    public function router()
    {
        return $this->router;
    }

    public function templateError()
    {
        $this->view->addData(['empresa' => 'Solar tech Solutions'], '_themeError');
        return $this->templateError;
    }
}
