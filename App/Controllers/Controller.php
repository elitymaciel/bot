<?php

namespace App\Controllers;

use League\Plates\Engine;
use CoffeeCode\Router\Router;   

class Controller extends AuthController
{
    private $view;
    private $templateError;
    private $router; 
      
    public function __construct()
    {
        
       /* if (empty($_SESSION['logado'])) {
             (new Router(SITE["base_url"]))->redirect("login"); 
        }  */
        $this->router = new Router(SITE["base_url"]);
        $this->view = new Engine(__DIR__ . '/../../public/web');
        $this->templateError = new Engine(__DIR__ ."/../../public/error");
    }  
    public function view() 
    { 
         $this->view->addData(['empresa' => 'Solar tech Solutions'], '_theme');
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
    
}