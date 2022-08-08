<?php

namespace App\Models;

use Exception;

class TransfModel extends Conexao
{
    public function saldo()
    {
        $sql = 'SELECT * FROM correntista WHERE id_cliente =:id';
        $stmt = Conexao::connect()->prepare($sql);

        $stmt->bindParam(':id', $_SESSION['id_cliente'], \PDO::PARAM_STR);

        if($stmt->execute()) {

            if(($linha = $stmt->fetch(\PDO::FETCH_ASSOC))) {

                $saldo = $linha['saldo'];
                $_SESSION['num_conta'] = $linha['num_conta'];
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

    public function transferencia()
    {
        if(isset($_POST['enviar'])) {

            $transferencia = false;

            $valorTransf  = filter_input(INPUT_POST, 'valorTransferencia', FILTER_SANITIZE_SPECIAL_CHARS);
            $numContaDest = filter_input(INPUT_POST, 'numContaDest', FILTER_SANITIZE_SPECIAL_CHARS);
            $nomeRem      = filter_input(INPUT_POST, 'nomeRem', FILTER_SANITIZE_SPECIAL_CHARS);

            $saldoAtual   = $this->saldo();

            if($valorTransf > $saldoAtual) {

                throw new Exception("saldo insuficiente");
                die;
            }
            else {

                $conn = $this->connect();
                $conn->beginTransaction();

                $sql  = 'UPDATE correntista SET saldo= saldo - ? WHERE id_cliente=?';
                $stmt = $conn->prepare($sql);

                if($stmt->execute([$valorTransf, $_SESSION['id_cliente']])) {

                    $sql2  = 'UPDATE correntista SET saldo= saldo + ? WHERE num_conta=?';
                    $stmt2 = $conn->prepare($sql2);

                    if($stmt2->execute([$valorTransf, $numContaDest])) {

                        $transferencia = true;
                    }
                    else {
                        
                        $conn->rollBack();
                        throw new Exception("Não foi possivel fazer a transferência");
                        die;
                    }
                }
                else {

                    $conn->rollBack();
                    throw new Exception("Erro desconhecido.");
                    die;
                }
            }

            if($transferencia == true) {
                unset($stmt, $sql);

                $sql = 'INSERT INTO transacoes (nome_remetente, num_conta_rem, valor_transferencia, id_remetente, nome_destinatario, num_conta_dest, data_transacao)
                        VALUES (?, ?, ?, ?, ?, ?, ?)';
                
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(1, $_SESSION['nome_cliente']);
                $stmt->bindValue(2, $_SESSION['num_conta']);
                $stmt->bindValue(3, $valorTransf);
                $stmt->bindValue(4, $_SESSION['id_cliente']);
                $stmt->bindValue(5, $nomeRem);
                $stmt->bindValue(6, $numContaDest);
                $stmt->bindValue(7, date("d-m-Y H:i:s"));

                if($stmt->execute()) {

                    return $stmt;
                }
                else {

                    $conn->rollBack();
                    throw new Exception("deu ruim na parte da tabela transacao");
                    die;
                }
            }
        }
    }
}