
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .div-login input
        {
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Faça seu Login</h1> <br>

    <form action="?router=LoginController/login/" method="POST">
        <div style="display: flex; justify-content: center">
            <div class="div-login">
                <h2>LOGIN</h2>
        
                <input class="mb-3" type="text" name="cpf_cnpj" placeholder="CPF ou CNPJ">
                
                <input class="mb-3" type="password" name="senha" placeholder="Digite sua senha">

                <div style="display: flex; justify-content: center">
                    <button class="btn-login" name="logar" type="submit">ENTRAR</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>