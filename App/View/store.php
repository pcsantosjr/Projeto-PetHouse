<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="app/view/assets/css/main.css" />
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

    <div>
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
                <a href="index.php"><img src="app/view/images/LOGO_.png"></a>
            </div>
            <div id="tpmenu">
                <nav id="topmenu">
                    <ul>
                        <li><a href="index.php?page=store&action=redirect&currentTypeOfProduct=2">Brinquedos</a></li>
                        <li><a href="index.php?page=store&action=redirect&currentTypeOfProduct=3">Moda Pet</a></li>
                        <li><a href="index.php?page=store&action=redirect&currentTypeOfProduct=1">Rações</a></li>
                    </ul>
                </nav>

                <section id="icon">
                    <ul class="fa-ul">
                    <li>
                        <span style="color:red;">
                            </a><i class="fa fa-user fa-2x"></i>
                        </span>
                        <a href="login.php">ENTRAR</a> / <a href="logout.php">SAIR</a>
                    </li>
                    <li>
                        <?php 
                            
                            if(empty($_SESSION['username']))
                                echo '';
                            else
                                echo $_SESSION['username']
                        ?>
                    </li>
                        <li>
                            <a href="index.php?page=cart"><i class="fa fa-shopping-cart fa-2x"></i>
                            (
                                <?php include("app/Controller/partials/quantidadeCarrinho.php"); ?>
                                <?php 
                                    if(empty($_SESSION['quantidadeProduto']))
                                        echo 0;
                                    else
                                        echo $_SESSION['quantidadeProduto'];
                                ?>
                            )
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
            <div class="tarja">
                <p>_______________</P>
            </div>
        </header>
    </div>

    <?php foreach($products as $product) : ?>
        <div class="prod">'
            <a href="">
                <?php echo '<img src="app/view/images/'. $product->getImage().'">'; ?>
            </a>
            <p><?php echo $product->getName(); ?></p>
            <p>R$ <?php echo number_format($product->getPrice(), 2, ',', '.'); ?></p>
            <form action="index.php?page=cart&action=add" method="post">
                <input name="id" type="hidden" value="<?php echo $product->getId() ?>"/>
                <button type="submit" class="btn btn-danger">COMPRAR</button>
            </form>
        </div>
    <?php endforeach ?>

    <footer id="footer">
        <!-- tarja-->
        <div class="tarja">
            <p>_______________</P>
        </div>
        <div id="rodape">
            <div id="atendimento">
                <h3>ATENDIMENTO</h3>
                    <ul>
                        <li>Fale com a gente:</li>
                        <li><span style="color:red;"><i class="fa fa-envelope fa-2x "></i></span> sac@pethouse.com.br</li>
                        <li><span style="color:green;"><i class="fa fa-whatsapp fa-2x "></span></i> (11) 9 9999-9999</li>
                        <li><a href="#sac">Reclame aqui</a></li>
                    </ul>
            </div>
            <div id="letter">
                <img src="app/view/images/amor_e_carinho_.png">
            <!--    <h3>Receba nossas novidades!</h3>
                <button style="font-size: 15px">
                    <input type="text" id="lname" name="lname" value="Insira seu nome" size="15"> <input type="email" id="lmail" name="lmail" value="Insira seu e-mail"> <input type="submit" value="Cadastrar">
                </button> -->
            </div>
        </div>
    </footer>
</body>
</html>

