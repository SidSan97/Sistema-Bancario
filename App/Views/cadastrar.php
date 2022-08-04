<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <div class="container-fluid">
        <form action="?router=Controllers/cadastrar/" method="post">
            <div class="row mb-4">
                <div class="col-lg-6 mb-1">
                    <label for="nome_razao">NOME OU RAZÃO SOCIAL</label>
                    <input type="text" id="nome_razao" name="nome_razao" autofocus required maxlength="100">
                </div>

                <div class="col-lg-6 mb-1">
                    <label for="cpf_cnpj">CPF OU CNPJ</label>
                    <input type="text" id="cpf_cnpj" name="cpf_cnpj" autofocus required maxlength="20">
                </div>
            </div>
        </form>
    </div>
</body>
</html>