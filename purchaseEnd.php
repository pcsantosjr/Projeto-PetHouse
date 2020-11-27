
<?php
    session_start();
    $_SESSION['cart'] = serialize(array());
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra finalizada</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="app/view/assets/css/main.css" />
</head>

<body>
    <div class="tarja">
        <p>_______________</P>
    </div>
    <div class="cart">
        <div class="page-header">
            &nbsp;<a href="index.php?page=home" class="btn btn-default">Home</a>
            <h1 class="text-center">Compra realizada com sucesso!</h1>   
        </div>

        <div class="text-center" style="padding: 10px">
            <h1>Seu pedido foi efetuado.</h1>
            <h3>Você receberá um e-mail com os detalhes/confirmação da sua compra</h3>
            <h3>Após confirmação de pagamento o pedido irá para separação.</h3>
        </div>


    </div>
    <div class="tarja">
        <p>_______________</P>
    </div>
</body>

</html>