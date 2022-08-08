<?php

namespace App\Controllers;

use App\Models\SaqueModel;

class SaqueController extends SaqueModel
{
    public function sacarValor()
    {
        $valorSaque = $this->saque();
        require_once __DIR__ . '/../Views/saque.php';
    }
}