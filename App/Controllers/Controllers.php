<?php

namespace App\Controllers;

class Controllers
{
    public function home()
    {
        require_once __DIR__ . '/../Views/home.php';
    }

    public function cadastrar()
    {
        //$cadastro = $this->create();
        require_once __DIR__ . '/../Views/cadastrar.php';
    }
}