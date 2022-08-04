<?php

namespace App\Models;
use App\Models\Conexao;
//session_start();

class LoginModel extends Conexao
{
    public function validarLogin()
    {
        if(isset($_POST['logar'])) {

            $login = filter_input(INPUT_POST, 'cpf_cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

            $conn = $this->connect();

            $sql  = "SELECT * FROM login_correntista WHERE cpf_cnpj =:cpf_cnpj LIMIT 1";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':cpf_cnpj', $login);

            if($stmt->execute()) {

                if(($linha = $stmt->fetch(\PDO::FETCH_ASSOC))) {
                    
                    if(password_verify($senha, $linha['senha'])) {
                        $_SESSION['cliente_autenticado'] = true;
                        $_SESSION['id_cliente']   = $linha['id_correntista'];
                        $_SESSION['nome_cliente'] = $linha['nome_razao_social'];

                        return true;
                    }
                    else {                     
                        session_destroy();
                        $_SESSION['cliente_autenticado'] = false; 
                        
                        return false;
                    }
                }
                else {
                    session_destroy();
                    $_SESSION['cliente_autenticado'] = false; 
                        
                    return false;
                }
            }
            else {
                session_destroy();
                $_SESSION['cliente_autenticado'] = false; 

                return false;
            }
        }
    }
}