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

        $mensagems = Mensagem::where('id_session', $apiConfig->id)->get();
             
        echo $this->view()->render("chatbot", [
            'mensagems' => $mensagems
        ]);
    }

    public function menuBot($request)
    {    
        $user = User::where('email', $_SESSION['email'])->first();
        $apiConfig = Api::where('user_id', $user->id)->first();
        $mensagems = Mensagem::where('id_session', $apiConfig->id)
            ->where('categoria', $request['nome'])->get(); 
        $options = [];
        foreach ($mensagems as $key => $option) {
            $options[] = $option;
        } 
        header('Content-Type: application/json');
        echo json_encode($options);
    }

    public function menuConsult($request)
    {
        print_r($request);
    }

    public function menuEdit($request)
    { 
        $user = User::where('email', $_SESSION['email'])->first();
        $apiConfig = Api::where('user_id', $user->id)->first();
        $mensagems = Mensagem::where('id_session', $apiConfig->id)
            ->where('categoria', $request['EditIdNome'])->get();
            
        foreach ($mensagems as $key => $option) {
            Mensagem::where('id_session', $apiConfig->id)
                            ->where('id', $option->id)
                            ->update(['categoria' => $request['EditInputNome']]);
        } 
        header('Content-Type: application/json');
        echo json_encode(['status' => 'Atualizado Com sucesso.']);
    }
}
