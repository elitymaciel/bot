<?php 
namespace App\Controllers\Client;
 

use App\Models\User; 

class DashboardController extends ClientController
{ 

    public function home($data = null)                                                                                      
    {      
        $user = User::where('email', $_SESSION['email'])->first(); 
         
        echo $this->view()->render("home", [
        ]);
    }
    public function cadastroClient($data)
    {
        $user = User::where('email', $_SESSION['email'])->first();  
        $client = \App\Models\Client::create([
            'instancia' => $data['telefone'],
            'telefone' => $data['telefone'],
            'nome_completo' => $data['nome_completo'],
            'cpf' => $data['cpf'],
            'cep' => $data['cep'],
            'endereco' => $data['endereco'],
            'cidade' => $data['cidade'],
            'id_user' => $user->id
        ]);
        if(!is_int($client)){
            (new \App\Helpers\Notification())->showToastrNotification('success','Alterações salva'); 
            $this->router()->redirect("/client");
        }
        die;
    }

    public function error($data)
    { 
        echo $this->templateError()->render("error", [
            "error" => $data["error"]
        ]);
    }
}
