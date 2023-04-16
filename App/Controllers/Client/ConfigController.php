<?php
namespace App\Controllers\Client;
 
use stdClass;
use App\Models\Chat;
use App\Models\User;
use App\Models\Client;
use App\Models\Session;

class ConfigController extends ClientController
{
     

    public function index()
    { 
        echo $this->view()->render('configuration', [
            
        ]);
    }

    public function sessions()
    { 
        $usuario = User::where('email', $_SESSION['email'])->first();
        $status = new \App\Helpers\Api();
        echo $status->statusSession(['token' => $usuario->token, 'session' => $usuario->id_session]);
        
    } 

    public function start()
    {
        $status = new \App\Helpers\Api();
        $usuario = User::where('email', $_SESSION['email'])->where('id_session', $_SESSION['session'])->first();
        $qrcodde = Chat::query('session', $usuario->id_session)->count();

        if($qrcodde){
            Chat::query('session', $usuario->id_session)->update([ 
                'type' => 'loding',
                'urlcode' => ' '
            ]);
            echo  $status->start(['token' => $usuario->token, 'session' => $usuario->id_session]);
        } 
    }
    
    public function qrcode()
    {
        $usuario = User::where('email', $_SESSION['email'])->first();
        $qrcode = Session::where('id_session', $usuario->id_session)->first();
        if($qrcode){
            if($qrcode->urlcode > 0){
                echo  json_encode(['status' => $qrcode->type, 'qrcode' => $qrcode->urlcode]);
            }else{
                echo  json_encode(['status' => $qrcode->type, 'qrcode' => 'sem qrcode']);
            }
            
        }else{
            echo  json_encode(['status' => 'errorSession', 'menssage' => 'Nao possui session iniciada']);
        }
        
    }

}