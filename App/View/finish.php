<?php
    // Include config file
    require_once "config.php";
                        
    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Prepare an insert statement
        $cardNumber = $_POST["cardnumber"];
        $dueDate = $_POST["duedate"];
        $cardName = $_POST["nome"];
        $cvv = $_POST["cvv"];
        $idUser = $_SESSION["id"];
        $idProduto = 0;
        foreach ($cartItems as $key ) {
            $idProduto = (int)$key;
        }

        $valorCompra = number_format($cartTotal, 2, ',', '.');
        $sql = "INSERT INTO card (idUser, cardNumber, dueDate, cardName, cvv, valorCompra, idProduto) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_iduser, $param_cardNumber, $param_dueDate, $param_cardName, $param_cvv, $param_valorCompra, $param_idproduct);

            // Set parameters
            $param_iduser = $idUser;
            $param_cardNumber = $cardNumber;
            $param_dueDate = $dueDate;
            $param_cardName = $cardName;
            $param_cvv = $cvv;
            $param_valorCompra = $valorCompra;
            $param_idproduct = $idProduto;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: purchaseEnd.php");
                
            } else {
                echo "Algo deu errado. Por favor tente novamente mais tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($link);
    }
    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="app/view/assets/css/main.css" />
</head>

<body>
    <div class="tarja">
        <p>_______________</P>
    </div>
    <div class="cart">
        <div class="page-header">
            <h1 class="text-center">Finalizar Compra</h1>
        </div>

        <h3>&nbsp;Detalhes da compra</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="4"><b class="text-success">TOTAL</b></td>
                    <td><b class="text-success">R$ <?php echo number_format($cartTotal, 2, ',', '.') ?></b></td>
                    <td></td>
                </tr>

                </tfood>
                <tbody>
                    <?php foreach ($cartItems as $item) : ?>
                        <tr>
                            <td><?php echo $item->getProduct()->getId() ?></td>
                            <td><?php echo $item->getProduct()->getName() ?></td>
                            <td><?php echo $item->getQuantity() ?> </td>
                            <td>R$ <?php echo number_format($item->getProduct()->getPrice(), 2, ',', '.') ?></td>
                            <td>R$ <?php echo number_format($item->getSubTotal(), 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
        </table>

        <h3>&nbsp;Dados pessoais</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $user->getName() ?></td>
                    <td><?php echo $user->getEmail() ?></td>
                    <td><?php echo $user->getEndereco() ?></td>
                    <td><?php echo $user->getCidade() ?></td>
                    <td><?php echo $user->getEstado() ?></td>
                </tr>
            </tbody>
        </table>
        <form action="" method="post">
            <h3>&nbsp;Dados do cartão de crédito</h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <label for="inputCardNumber">Número do cartão</label>
                        <input type="text" name="cardnumber" class="form-control" id="inputCardNumber" placeholder="xxxx.xxxx.xxxx.xxxx">
                    </div>
                    <div class="col-md-2">
                        <label for="inputDueDate">Data de vencimento</label>
                        <input type="text" name="duedate" class="form-control" id="inputDueDate" placeholder="vencimento do cartão">
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-4">
                        <label for="inputNome">Nome</label>
                        <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Nome impresso no cartão">
                    </div>
                    <div class="col-md-2">
                        <label for="inputCvv">CVV</label>
                        <input type="text" name="cvv" class="form-control" id="inputCvv" placeholder="código de verificação">
                    </div>
                </div>
            </div>
            <br />

            <div class="text-center">
                <div class="row">
                    <input type="submit" class="btn btn-success" value="Comprar">
                    <a href="index.php?page=cart" class="btn btn-success">Voltar</a>
                </div>
            </div>
            <br />
        </form>
    </div>

    <?php include("app/controller/partials/footer2.php"); ?>
</body>

</html>