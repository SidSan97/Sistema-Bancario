<?php

namespace App\Controllers;
use App\Models\Crud;

class Controllers extends Crud
{
    public function home()
    {
        require_once __DIR__ . '/../Views/home.php';
    }

    public function cadastrar()
    {
        $cadastro = $this->create();
        require_once __DIR__ . '/../Views/cadastrar.php';
    }
}