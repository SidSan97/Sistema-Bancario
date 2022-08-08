<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .sec-deposito
        {
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .sec-deposito input
        {
            width: 100%;
            outline: none;
        }
    </style>
</head>
<body>
<div class="container">
    <section class="sec-deposito">
        <form action="?router=DepositoController/depositar/" method="post">
            <div class="row mb-4">
                <div class="col-lg-6 mb-1">
                    <label for="saque">Quanto você quer depositar na sua conta?</label>
                    <input type="number" id="deposito" name="deposito" autofocus required maxlength="10">
                </div>
            </div>

            <button class="btn btn-success" type="submit" name="depositar">Fazer deposito</button>
        </form>
    </section>
</body>
</html>