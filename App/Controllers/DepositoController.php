<?php

namespace App\Controllers;

use App\Models\DepositoModel;

class DepositoController extends DepositoModel
{
    public function depositar()
    {
        $valorDeposito = $this->deposito();
        require_once __DIR__ . '/../Views/deposito.php';
    }
}