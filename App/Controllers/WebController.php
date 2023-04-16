<?php

namespace App\Controllers;
 

class WebController extends Controller
{
    public function index()
    {
        echo $this->view()->render("home");
    }
}
