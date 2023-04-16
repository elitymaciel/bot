<?php
 
function dd($data = null) { 
    
echo '<div style="background-color: #1C1C1C; color: #FFFFFF; padding: 10px;">'; 
echo '<strong>Mensagem:</strong><pre> ' . is_array($data)? json_encode($data) : $data .'</pre>';
echo '</div>';   
} 


ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);
 
define('DEBUG_MODE', true); 
if (DEBUG_MODE) { 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $last_error = error_get_last();
    if ($last_error) {
        dd($last_error['message']);
    }
}


$config['url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$config['url'] .= "://".$_SERVER['HTTP_HOST'];
$config['url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

define("MAX_LOGIN_ATTEMPTS", 1);

define("EMPRESA", [
    "nome" => "Solar tech Solutions"
]);

define("SITE", [
    "titulo" => "Instituto PCEP",
    "base_url" => $config['url'],
    "locale" => "pt_BR",
    "development" => "Maciel Oliveira"
]);
define("EMAIL", [
    "host" => "smtp.office365.com", /** host referente ao Outlook */
    "post" => "587",
    "user" => "admin@admin.com.br",
    "passwd" => "",
    "from_name" => "Reset de Senha",
    "from_email" => "admin@admin.com.br" /**  Repetir o user */
]); 
