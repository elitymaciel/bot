<?php

namespace Core;
 
use Illuminate\Database\Capsule\Manager;
use Exception; 
use Dotenv\Dotenv;

class Bootstrap extends Manager
{
    private $orm;
 
    public function __destruct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $this->orm = new Manager();
        $this->orm->addConnection([
            "driver" => $_ENV['DRIVER'],
            "host" => $_ENV['HOST'],
            "database" => $_ENV['DBNAME'],
            "username" => $_ENV['USERNAME'],
            "password" => $_ENV['PASSWORD']
        ]);

        $this->orm->setAsGlobal();
        $this->orm->bootEloquent();
    }
}