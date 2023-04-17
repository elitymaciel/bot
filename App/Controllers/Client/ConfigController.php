<?php
namespace App\Controllers\Client;
 
use stdClass;
use App\Models\Api;
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
        $api = Api::where('user_id', $usuario->id)->first();
        $status = new \App\Helpers\Api();
        echo $status->statusSession(['token' => $api->token, 'session' => $api->session]);
        
    } 

    public function start()
    {
        $status = new \App\Helpers\Api();
        $usuario = User::where('email', $_SESSION['email'])->first();
        $api = Api::where('user_id', $usuario->id)->first();
        $session = Session::query('id_session', $api->id)->first();
        if($session){
            Session::query('id_session', $api->id)->update([ 
                'type' => 'loding',
                'urlcode' => 's'
            ]);
            echo  $status->start(['token' => $api->token, 'session' => $api->session]);
        }else {
            Session::query('id_session', $api->session)->create([ 
                'id_session' => $api->id,
                'type' => 'loding',
                'urlcode' => 's'
            ]);
            echo  $status->start(['token' => $api->token, 'session' => $api->session]);
        }
    }
    
    public function qrcode()
    {
        $usuario = User::where('email', $_SESSION['email'])->first();
        $api = Api::where('user_id', $usuario->id)->first();
        $qrcode = Session::where('id_session', $api->id)->first();
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