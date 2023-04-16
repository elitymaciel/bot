<?php

namespace App\Controllers\Client;
  
use App\Models\User;
use App\Models\Atendimento;

class AtendimentoController extends ClientController
{ 
    public function index()
    { 
            /* $user = User::where('email', $_SESSION['email'])->first();  */
             $Atendimentos = Atendimento::all();
            echo $this->view()->render("atendimento", [
                "atendimentos" => $Atendimentos
            ]); 
    }

    public function listaContatos()
    {
        $Contatos = new \App\Helpers\Api();
        $usuario = User::where('email', $_SESSION['email'])->first(); 
        echo  $Contatos->allContacts($usuario->id_session);
          
    }
}