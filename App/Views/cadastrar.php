<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <style>
        .sec-cadastro
        {
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .sec-cadastro input
        {
            width: 100%;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <section class="sec-cadastro">
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

                <div class="row mb-4">
                    <div class="col-lg-4 mb-1">
                        <label for="rg_inscSocial">RG/INSCRIÇÃO SOCIAL</label>
                        <input type="text" id="rg_inscSocial" name="rg_inscSocial" autofocus required maxlength="100">
                    </div>

                    <div class="col-lg-4 mb-1">
                        <label for="rg_inscSocial">E-MAIL</label>
                        <input type="text" id="email" name="email" autofocus required maxlength="100">
                    </div>

                    <div class="col-lg-4 mb-1">
                        <label for="data">DATA DE NASCIMENTO OU FUNDAÇÃO</label>
                        <input type="date" id="data" name="data" autofocus required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-lg-6 mb-1">
                        <label for="telefone">TELEFONE</label>
                        <input type="text" id="telefone" name="telefone" autofocus required>
                    </div>

                    <div class="col-lg-6 mb-1">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" autofocus required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-lg-6 mb-1">
                        <label for="cidade">CIDADE</label>
                        <input type="text" id="cidade" name="cidade" autofocus required>
                    </div>

                    <div class="col-lg-6 mb-1">
                        <label for="cep">BAIRRO</label>
                        <input type="cep" id="bairro" name="bairro" autofocus required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-lg-5 mb-1">
                        <label for="cidade">RUA</label>
                        <input type="text" id="rua" name="rua" autofocus required>
                    </div>

                    <div class="col-lg-2 mb-1">
                        <label for="numRua">NÚMERO DA RUA</label>
                        <input type="number" id="numRua" name="numRua" autofocus >
                    </div>

                    <div class="col-lg-5 mb-1">
                        <label for="complemento">COMPLEMENTO</label>
                        <input type="text" id="complemento" name="complemento" autofocus>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-lg-6 mb-1">
                        <label for="senha">SENHA</label>
                        <input type="password" id="senha" name="senha" autofocus required>
                    </div>

                    <div class="col-lg-6 mb-1">
                        <label for="senha">REPITA A SENHA</label>
                        <input type="password" id="senha2" name="senha2" autofocus required>
                    </div>
                </div>

                <div>
                    <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </section>
    </div>
</body>
</html>