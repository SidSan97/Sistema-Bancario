<?php

namespace App\Models;

use Exception;

class DepositoModel extends Conexao
{
    public function deposito()
    {
        if(isset($_POST['depositar'])) {

            $valorDeposito = filter_input(INPUT_POST, 'deposito', FILTER_SANITIZE_SPECIAL_CHARS);    

            $sql = 'UPDATE correntista SET saldo= saldo + ? WHERE id_cliente=?';
            $stmt= Conexao::connect()->prepare($sql);
    
            if($stmt->execute([$valorDeposito, $_SESSION['id_cliente']])) {
    
               return $stmt;
               die;
            }
            else {
    
                throw new Exception('sem sucesso'); 
            }
        }
    }
}