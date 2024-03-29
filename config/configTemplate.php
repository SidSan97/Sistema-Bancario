<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>SS Crypto</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <a class="navbar-brand" href="#">SS Crypto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-light" href="?router=Controllers/home/">Home <span class="sr-only">(current)</span></a>
                </li>

                <?php 
                    if (isset($_SESSION['cliente_autenticado']) == false): ?>
                    <li class="nav-item">
                            <a class="nav-link text-light" href="?router=Controllers/cadastrar/">Cadastro</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <?php 
                        if (isset($_SESSION['cliente_autenticado']) == true): ?>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="?router=TransfController/transferir/">Transferir</a>
                            </li>
                    <?php endif; ?>
                </li>

                <li class="nav-item">
                    <?php 
                        if (isset($_SESSION['cliente_autenticado']) == true): ?>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="?router=SaqueController/sacarValor/">Saque</a>
                            </li>
                    <?php endif; ?>
                </li>

                <li class="nav-item">
                    <?php 
                        if (isset($_SESSION['cliente_autenticado']) == true): ?>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="?router=DepositoController/depositar/">Deposito</a>
                            </li>
                    <?php endif; ?>
                </li>

                <li class="nav-item">
                    <?php 
                        if (isset($_SESSION['cliente_autenticado']) == false): ?>
                            <a class="nav-link text-light" href="?router=LoginController/login/">Login</a>
                        <?php else: 
                            echo '<span class="nav-link text-dark"> Olá, '.explode(" ",$_SESSION['nome_cliente'])[0].'</span>';
                        endif; 
                    ?>
                </li>

                <?php 
                    if (isset($_SESSION['cliente_autenticado']) == true): ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?router=LoginController/deslogar/">Sair</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
</body>
</html>