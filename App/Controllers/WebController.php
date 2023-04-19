<?php

namespace App\Controllers;

use App\Models\Mensagem;
 

class WebController extends Controller
{
    public function index()
    {
        $menu = Mensagem::distinct()->pluck('categoria');
            $options = [];
            foreach ($menu as $key => $categoria) {
                $options[] = $key+1 .'- ' .ucfirst($categoria);
            } 
        echo "<pre>";
        print_r($options);
        die;
        echo $this->view()->render("home");
    }
}
