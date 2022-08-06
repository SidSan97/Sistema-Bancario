<?php

namespace App\Models;
session_start();

class SaldoModel extends Conexao
{
    public function saldo()
    {
        $sql = 'SELECT * FROM correntista WHERE id_cliente =:id';
        $stmt = Conexao::connect()->prepare($sql);

        $stmt->bindParam(':id', $_SESSION['id_cliente'], \PDO::PARAM_STR);

        if($stmt->execute())
        {
            if(($linha = $stmt->fetch(\PDO::FETCH_ASSOC)))
            {
                $saldo = $linha['saldo'];
            }
            else
            {
                die("sem registro");
            }
        }
        else
            die("n executou");

        return $saldo;
    }
}