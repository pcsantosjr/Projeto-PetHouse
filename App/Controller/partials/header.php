<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <meta name="description" content="venda de produtos para pet" />
    <meta name="keywords" content="petshop, pet, moda pet, rações, brinquedos pet" />
    <meta property="og:title" content="Pet House" />
    <meta property="og:description" content="global" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="index.html" />
    <meta property="og:image" content="./images/banner.jpg" />
    <meta property="og:site_name" content="Pet House" />
    <meta name="Robots" content="index, follow">
    <meta name="AUTHOR" content="Chernoviews">
    <meta name="COPYRIGHT" content="2020 Chernoviews" />
    <meta name="language" content="pt-BR">
    <meta name="RATING" content="general">


    <title>Pet House</title>
</head>

<body>

<div id="wrapper">
    <header>
        <div id="promo">
            <h4>
                <span style="color:black" ;>
                    <i class="fa fa-star"></i></span>
                COMPRE E GANHE DESCONTO EM NOSSOS PRODUTOS
                <span style="color:black" ;>
                    <i class="fa fa-star"></i></span>
            </h4>

        </div>
        <div id="logo">
            <a href="index.php"><img src="images\pet_house_logo_mini.jpg"></a>
        </div>
        <div id="tpmenu">
            <nav id="topmenu">
                <ul>
                    <li><a href="brinquedo.php">Brinquedos</a></li>
                    <li><a href="moda_pet.php">Moda Pet</a></li>
                    <li><a href="racoes.php">Rações</a></li>
                    
                    <!--<li><a href="">Cadastre-se</a></li> -->
                </ul>
            </nav>


            <section id="icon">
                <ul class="fa-ul">
                    <li>
                        <span style="color:red;">
                            </a><i class="fa fa-user fa-2x"></i>
                        </span>
                        <a href="login.php">ENTRAR</a> / <a href="logout.php">SAIR</a>
                        <?php 
                            session_start();
                            if(empty($_SESSION['username']))
                                echo '';
                            else
                                echo $_SESSION['username']
                        ?>
                    </li>
                    <li><a href="carrinho.php"><i class="fa fa-shopping-cart fa-2x"></i>(
                        <?php include("app/Controller/partials/quantidadeCarrinho.php"); ?>
                        <?php 
                            if(empty($_SESSION['quantidadeProduto']))
                                echo 0;
                            else
                                echo $_SESSION['quantidadeProduto'];
                        ?>
                    )</a></li>
                </ul>
                <!--<div class="login">
                        <i class="fa fa-user"></i><h3>ENTRAR</h3>
                    </div>
                    <div class="cart">

                    </div>
                    <div class="socials">
                    </div>
                -->
            </section>
        </div>

  <!-- tarja -->
  <div class="tarja">
        <p>_______________</P>
    </div>
    </header>