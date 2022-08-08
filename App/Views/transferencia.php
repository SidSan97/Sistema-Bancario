<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Faça sua transaçao aqui</h1> <br>

    <form action="?router=TransfController/transferir/" method="POST">
        <input type="number" name="valorTransferencia" required placeholder="valor transf">
        <input type="number" name="numContaDest" required placeholder="numero conta destino">
        <input type="text" name="nomeRem" required placeholder="nome remetente">

        <button type="submit" name="enviar" class="btn btn-primary"> Transferir </button>
    </form>
</body>
</html>