<?php

namespace App\Controllers\Client;

use League\Plates\Engine;
use CoffeeCode\Router\Router;   

class ClientController
{
    private $view;
    private $templateError;
    private $router;
    public array $dados;
      
    public function __construct()
    {
        $this->client();
        $this->firstAccess();
        $this->router = new Router(SITE["base_url"]); 
        $this->templateError = new Engine(__DIR__ ."/../../../public/error");
    }  
    public function view() 
    { 
        $this->view = new Engine(__DIR__ . '/../../../public/client');
        $this->view->addData(['empresa' => 'Solar tech Solutions'], '_themeAdmin');
        return $this->view;
    }

    public function router()
    {
        return $this->router;
    }


    public function templateError()
    {
        $this->view->addData(['empresa' => 'Solar tech Solutions'], '_themeError ');
        return $this->templateError;
    }
    
    public function client()
    { 
        if (empty($_SESSION['logado'])) {
            (new \App\Helpers\Notification())->showToastrNotification('error','O que quer fazer? primeiro login necessario'); 
            (new Router(SITE["base_url"]))->redirect("login"); 
        }  
        if ($_SESSION['permissao'] != 'client') {
            (new \App\Helpers\Notification())->showToastrNotification('error','Sem permissão de acesso'); 
            (new Router(SITE["base_url"]))->redirect($_SESSION['permissao']);
        }
        
    }

    public function firstAccess()
    {
        $user = \App\Models\User::query('email', $_SESSION['email'])->first();
        $client = \App\Models\Client::query('id_user', $user->id)->count();
        if (!$client) {     
            echo $this->view()->render("first_access"); 
        }
        return true;
    }
    
}