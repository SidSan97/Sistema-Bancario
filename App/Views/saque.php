<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .sec-saque
        {
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .sec-saque input
        {
            width: 100%;
            outline: none;
        }
    </style>
</head>
<body>
<div class="container">
    <section class="sec-saque">
        <form action="?router=SaqueController/sacarValor/" method="post">
            <div class="row mb-4">
                <div class="col-lg-6 mb-1">
                    <label for="saque">Quanto você quer sacar da sua conta?</label>
                    <input type="number" id="saque" name="saque" autofocus required maxlength="100">
                </div>
            </div>

            <button class="btn btn-success" type="submit" name="sacar">Fazer saque</button>
        </form>
    </section>
</body>
</html>