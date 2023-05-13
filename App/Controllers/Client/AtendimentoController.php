<?php

namespace App\Controllers\Client;

use App\Models\Api;
use App\Models\Chat;
use App\Models\User;
use App\Models\Atendimento;

class AtendimentoController extends ClientController
{ 
    public function index()
    { 
             $user = User::where('email', $_SESSION['email'])->first();
             $api = Api::where('user_id', $user->id)->first();
             $Atendimentos = Atendimento::all();
             $Chat = Chat::where('session', $api->session)->get();
            echo $this->view()->render("atendimento", [
                "atendimentos" => $Atendimentos,
                "chats" => $Chat
            ]); 
    }

    public function listaContatos()
    {
        $Contatos = new \App\Helpers\Api();
        $usuario = User::where('email', $_SESSION['email'])->first(); 
        echo  $Contatos->allContacts($usuario->id_session);
          
    }
}