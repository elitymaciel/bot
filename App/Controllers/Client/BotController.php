<?php

namespace App\Controllers\Client;

use App\Models\User;
use App\Models\Anotacao;
use App\Models\Mensagem;
use App\Models\Api;


class BotController extends ClientController
{
    
      
    public function index()
    {
        $user = User::where('email', $_SESSION['email'])->first();
        $apiConfig = Api::where('user_id', $user->id)->first();

        $mensagems = Mensagem::where('id_session', $apiConfig->id)
            ->distinct()
            ->pluck('categoria'); 
        echo $this->view()->render("chatbot", [
            'mensagems' => $mensagems
        ]);
    }

    public function menuBot($data)
    {    
        $user = User::where('email', $_SESSION['email'])->first();
        $apiConfig = Api::where('user_id', $user->id)->first();
        $mensagems = Mensagem::where('id_session', $apiConfig->id)
            ->where('categoria', $data['nome'])->get();
            /* ->distinct()
            ->pluck('item'); */
            $options = [];
        foreach ($mensagems as $key => $option) {
            $options[] = $option;
        } 
        header('Content-Type: application/json');
        echo json_encode($options);
    }
}
