<?php 

ob_start();
  
session_start();
date_default_timezone_set('America/Sao_Paulo');
 
require __DIR__ . "/vendor/autoload.php";
  
use Core\Bootstrap; 
use CoffeeCode\Router\Router;  
new Bootstrap();

$router = new Router(SITE["base_url"]);
$router->namespace("App\Controllers");
 
 
$router->group("/"); 
$router->get("/", "WebController:index"); 
 
$router->group("api"); 
$router->post("/webhook", "WebhookController:index"); 


$router->group("/admin")->namespace("App\Controllers\Admin");
$router->get("/", "DashboardController:home");  
$router->get("/users", "UserController:index");
$router->post("/users/token", "UserController:geraToken");
$router->post("/users/cadastro", "UserController:cadastro");


$router->group("/client")->namespace("App\Controllers\Client");
$router->get("/", "DashboardController:home");
$router->post("/", "DashboardController:cadastroClient");
$router->get("/config", "ConfigController:index");
$router->get("/config/sessions", "ConfigController:sessions"); 
$router->get("/config/start", "ConfigController:start");
$router->get("/config/qrcode", "ConfigController:qrcode");

$router->get("/chatbot", "BotController:index"); 
$router->post("/chatbot", "BotController:front");
$router->get("/chatbot/mensagens", "BotController:menssage");
$router->get("/chatbot/tabela", "BotController:tabela");
$router->get("/chatbot/drawflow", "BotController:drawflow");
$router->post("/chatbot/drawflowresourse", "BotController:drawflowResourse");
$router->post("/chatbot/mensagens", "BotController:menssage");
 
$router->get("/atendimento", "AtendimentoController:index");
$router->get("/atendimento/listacontato", "AtendimentoController:listaContatos");
  
$router->group("login")->namespace("App\Controllers");
$router->get("/", "LoginController:login");
$router->post("/", "LoginController:login");
$router->get("/{login}", "LoginController:login");
$router->post("/{auth}", "LoginController:auth");
/* $router->get("/reset", "LoginController:reset");
$router->post("/reset", "LoginController:reset"); */

$router->group("logout")->namespace("App\Controllers");
$router->get("/", "LoginController:logout"); 
 
$router->group("oops");
$router->get("/{error}", function($data){
    print_r($data['error']);
});


$router->dispatch();

if ($router->error()) {
    if ($router->error()) {
        $router->redirect("/oops/{$router->error()}");
    }
    
} 