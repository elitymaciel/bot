<?php

namespace App\Controllers;

use App\Models\Mensagem;


class WebController extends Controller
{
    public function index()
    {
        echo $this->view()->render("home");
    }
}
