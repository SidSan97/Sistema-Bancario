<?php

namespace App\Models;

class Crud extends Conexao
{
    public function create()
    {
        if(isset($_POST['cadastrar'])) {

            $nome_razao    = filter_input(INPUT_POST, 'nome_razao', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf_cnpj      = filter_input(INPUT_POST, 'cpf_cnpj', FILTER_SANITIZE_SPECIAL_CHARS);
            $rg_inscSocial = filter_input(INPUT_POST, 'rg_inscSocial', FILTER_SANITIZE_SPECIAL_CHARS);
            $data          = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_SPECIAL_CHARS);   
            $telefone      = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
            $cep           = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade        = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro        = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
            $rua           = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_SPECIAL_CHARS);
            $numRua        = filter_input(INPUT_POST, 'numRua', FILTER_VALIDATE_INT);
            $complemento   = /*filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS)*/$_POST['complemento'];
            $email         = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha         = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            $senha2        = filter_input(INPUT_POST, 'senha2', FILTER_SANITIZE_SPECIAL_CHARS);
            $num_conta     = rand();
            $data_cadastro = date("d-m-Y H:i:s");
            $saldo = 0;

            if($senha != $senha2) {
                $erro = "Senhas diferentes";
                throw new $erro;
                die;
            }

            $conn = $this->connect();

            $conn->beginTransaction();
            $sql = "INSERT INTO correntista VALUES (default, :nome_razao_social, :email, :rg_inscricao_social, :data_nasc_fundacao, :telefone, :cep, :cidade, 
                                                    :bairro, :rua, :num_rua, :complemento, :num_conta, :saldo)";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':nome_razao_social', $nome_razao);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':rg_inscricao_social', $rg_inscSocial);
            $stmt->bindParam(':data_nasc_fundacao', $data);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':cep', $cep);
            $stmt->bindParam(':cidade', $cidade);
            $stmt->bindParam(':bairro', $bairro);
            $stmt->bindParam(':rua', $rua);
            $stmt->bindParam(':num_rua', $numRua);
            $stmt->bindParam(':complemento', $complemento);
            $stmt->bindParam(':num_conta', $num_conta);
            $stmt->bindParam(':saldo', $saldo);

            if($stmt->execute()) {
                
                $ultimoId = $conn->lastInsertId();

                $sql2 = "INSERT INTO login_correntista VALUES (default, :id_correntista, :cpf_cnpj, :senha, :data_cadastro)";

                $stmt2 = $conn->prepare($sql2);
                $stmt2->bindParam(':id_correntista', $ultimoId);
                $stmt2->bindParam(':cpf_cnpj', $cpf_cnpj);
                $stmt2->bindParam(':senha', $senha);
                $stmt2->bindParam(':data_cadastro', $data_cadastro);

                if($stmt2->execute()) {
                    return $stmt.$stmt2;
                }
                else {
                    $conn->rollBack();
                    die;
                }
            }
            else {
                $conn->rollBack();
                die;
            }
        }
    }
}