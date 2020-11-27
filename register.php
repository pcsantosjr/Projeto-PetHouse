<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, coloque um usuário.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Esse usuário já está sendo utilizado.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Ops! Algo deu errado. Por favor tente novamente mais tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor coloque uma senha.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "A senha precisa ter no mínimo 6 caracteres";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor, confirme a senha.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "A senha não confere, digite as senhas iguais.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $cep = $_POST["cep"];
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];
        $bairro = $_POST["bairro"];
        $complemento = $_POST["complemento"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $sql = "INSERT INTO users (username, password, name, cpf, email, telephone, cep, adress, number, neigborhood, other, city, state) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_username, $param_password, $param_name, $param_cpf, $param_email, $param_telephone, $param_cep, $param_address, $param_number, $param_neigborhood, $param_other, $param_city, $param_state);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_name = $nome;
            $param_cpf = $cpf;
            $param_email = $email;
            $param_telephone = $telefone;
            $param_cep = $cep;
            $param_address = $endereco;
            $param_number = $numero;
            $param_neigborhood = $bairro;
            $param_other = $complemento;
            $param_city = $cidade;
            $param_state = $estado;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
            } else {
                echo "Algo deu errado. Por favor tente novamente mais tarde.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<?php include("app\controller\partials\header2.php"); ?>

<section id="banner_login">
    <div class="inner">
        <div class="logo">
            <a href="index.php"><img src="app\view\images\banner_caes_gatos.png"></a>

        </div>
    </div>
</section>

<div class="wrapper">
    <div class="tela_login text-center">
        <h2>Registro</h2>
        <p>Por favor, preencha esse formulário.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-5 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label for="inputUserName">Usuário:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Nome de usuário">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group col-md-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?> ">
                    <label for="inputPassword">Senha:</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Sua senha">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group col-md-3<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?> ">
                    <label for="inputPassword">Repetir a Senha:</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Igual a enterior">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputNome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Nome completo">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="inputCpf" placeholder="xxx.xxx.xxx-xx">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">E-mail</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="pethouse@pethouse.com">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPhone">Telefone</label>
                    <input type="phone" name="telefone" class="form-control" id="inputTel" placeholder="(  ) 999999999">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCep">CEP</label>
                    <input type="text" name="cep" class="form-control" id="inputCep" placeholder="CEP">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputAddress">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Rua dos Bobos">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputNumero">Nº</label>
                    <input type="text" name="numero" class="form-control" id="inputNumero" placeholder="0">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputBairro">Bairro</label>
                    <input type="text" name="bairro" class="form-control" id="inputBairro" placeholder="Centro">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputComplemento">Complemento</label>
                    <input type="text" name="complemento" class="form-control" id="inputComplemento" placeholder="Apartamento 1">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Cidade</label>
                    <input type="text" name="cidade" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputEstado">Estado</label>
                    <select id="inputEstado" name="estado" class="form-control">
                        <option selected>Escolher...</option>
                        <option>ACRE</option>
                        <option>ALAGOAS</option>
                        <option>AMAZONAS</option>
                        <option>AMAPA</option>
                        <option>BAHIA</option>
                        <option>BRASILIA</option>
                        <option>CEARA</option>
                        <option>ESPIRITO SANTO</option>
                        <option>GOIAS</option>
                        <option>MARANHÃO</option>
                        <option>MINAS GERAIS</option>
                        <option>MATO GROSSO</option>
                        <option>MATO GROSSO DO SUL</option>
                        <option>PARÁ</option>
                        <option>PARAÍBA</option>
                        <option>PERNANBUCO</option>
                        <option>PIAUÍ</option>
                        <option>PARANÁ</option>
                        <option>RIO DE JANEIRO</option>
                        <option>RIO GRANDE DO NORTE</option>
                        <option>RIO GRANDE DO SUL</option>
                        <option>RONDÔNIA</option>
                        <option>RORAIMA</option>
                        <option>SANTA CATARINA</option>
                        <option>SERGIPE</option>
                        <option>SÃO PAULO</option>
                        <option>TOCANTINS</option>
                    </select>
                </div>
            </div>
            <div class="form-row text-center">
                <div class="form-group col-md-5">
                    <input type="submit" class="btn btn-primary btn-lg" value="Cadastrar">
                </div>
                <div class="form-group col-md-4">
                    <input type="reset" class="btn btn-secondary btn-lg" value="Limpar">
                </div>
            </div>
            <div class="text-center">
                <p>Já tem uma conta? <a href="login.php">Faça login aqui.</a>.</p>
            </div>
        </form>
    </div>
</div>


<?php include("app/controller/partials/footer2.php"); ?>