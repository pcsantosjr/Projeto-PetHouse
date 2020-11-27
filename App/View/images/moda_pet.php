<?php include("app/partials/header.php"); ?>


    
    <section id="banner">
        <div class="inner">
            <div class="logo">
                <img src="images\banner_moda_pet.jpg">

            </div>
        </div>
    </section>

    <main id="content">
        <nav class="setores">
            <ul>
                <li>
                    <h2>Setores</h2>
                </li>
                <li class="separador"></li>
                <li><a href="brinquedo.php">Brinquedos</a></li>
                <li class="separador"></li>
                <li><a href="moda_pet.php">Moda Pet</a></li>
                <li class="separador"></li>
                <li><a href="racoes.php">Rações</a></li>
                <li class="separador"></li>
            </ul>

        </nav>
        
        <?php
            $conexao = new PDO('mysql:host=localhost;dbname=pethouse',"root", "");
            $query = $conexao->prepare("SELECT * FROM produtos WHERE TipoDeProduto = 3");
            $query->execute();
            $produtos = $query->fetchAll();

            foreach($produtos as $produto) {
                echo 
                '<div class="prod">'
                    .'<a href=""><img src="images\moda\\'.$produto['NomeImagem'].'"></a>'
                    .'<p>'.$produto['Nome'].'</p>'
                    .'<p>Preco: R$ '.number_format($produto['Preco'],2,',','.').'</p>'
                    .'<a href="carrinho.php?add=carrinho&id='.$produto['Id'].'" class="btn btn-danger">COMPRAR</a>'
                    .'</div>';
            }
        ?>
    </main>
<?php include("app/partials/footer.php"); ?>