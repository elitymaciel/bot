<?php

namespace App\Controllers\Admin;
 


class WebController extends AdminController
{
    public function index()
    { 
        echo $this->view()->render("web", []);
    }  
    
}
