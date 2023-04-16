<?php 
namespace App\Controllers\Admin;
 

use App\Models\User;
use App\Helpers\Api; 

class DashboardController extends AdminController
{ 

    public function home($data = null)                                                                                      
    {     
        $user = User::where('email', $_SESSION['email'])->first(); 
         
        echo $this->view()->render("home", [
        ]);
    }

    public function error($data)
    { 
        echo $this->templateError()->render("error", [
            "error" => $data["error"]
        ]);
    }
}
