<?php

namespace App\Models;
session_start();

class SaqueModel extends Conexao
{
    private $saldo;

    public function __construct(SaldoModel $saldoModel)
    {
        $this->saldo = $saldoModel;
    }

    public function saque()
    {
       if(isset($_POST['sacar'])) {

        $valorSaque = filter_input(INPUT_POST, 'saque', FILTER_SANITIZE_SPECIAL_CHARS);

        $saldoAtual = $this->saldo->saldo();
    
        if($valorSaque > $saldoAtual)
        {
            echo "Saldo insuficiente";
            die;
        }
        else
        {      
            $conn = $this->connect();

            $sql = 'UPDATE correntista SET saldo= saldo - ? WHERE id_cliente=?';
            $stmt = $conn->prepare($sql);

            if($stmt->execute([$valorSaque, $_SESSION['id_cliente']]))
                die("sucesso");
            else
                die('sem sucesso');
        }
       }

       return $stmt;
    }
}