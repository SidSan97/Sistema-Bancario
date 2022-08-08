<?php

namespace App\Models;

use Exception;

//session_start();

class SaqueModel extends Conexao
{
    public function saldo()
    {
        $sql = 'SELECT * FROM correntista WHERE id_cliente =:id';
        $stmt = Conexao::connect()->prepare($sql);

        $stmt->bindParam(':id', $_SESSION['id_cliente'], \PDO::PARAM_STR);

        if($stmt->execute()) {

            if(($linha = $stmt->fetch(\PDO::FETCH_ASSOC))) {
                $saldo = $linha['saldo'];
            }
            else {

                throw new Exception("sem registro");
                die;
            }
        }
        else {

            throw new Exception("n executou");
            die;
        }

        return $saldo;
    }

    public function saque()
    {
        if(isset($_POST['sacar'])) {

            $valorSaque = filter_input(INPUT_POST, 'saque', FILTER_SANITIZE_SPECIAL_CHARS);

            $saldoAtual = $this->saldo();

            if($valorSaque > $saldoAtual) {

                throw new Exception("Saldo insuficiente");
                die;
            }
            else {      

                $conn = $this->connect();

                $sql = 'UPDATE correntista SET saldo= saldo - ? WHERE id_cliente=?';
                $stmt = $conn->prepare($sql);

                if($stmt->execute([$valorSaque, $_SESSION['id_cliente']])) {

                    return $stmt;
                }
                else {
                    
                    throw new Exception("Erro desconhecido. Tente novamente mais tarde");
                    die;
                }
            }
        }
    }
}