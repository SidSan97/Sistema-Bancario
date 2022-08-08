<?php

namespace App\Controllers;

use App\Models\TransfModel;

class TransfController extends TransfModel
{
    public function transferir()
    {
        $transferirValor = $this->transferencia();
        require_once __DIR__ . '/../Views/transferencia.php';
    }
}