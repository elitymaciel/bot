<?php
namespace App\Controllers;

use CoffeeCode\Router\Router; 


class AuthController
{ 
    public function __construct()
    {
        if (empty($_SESSION['logado'])) {
            (new Router(SITE["base_url"]))->redirect("login");
        }
        if($_SESSION['permissao'] == 'admin') {
            (new Router(SITE["base_url"]))->redirect("/admin");
        }
        if ($_SESSION['permissao'] == 'client') {
            (new Router(SITE["base_url"]))->redirect("/client");
        }
    }

}