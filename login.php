<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Digite um usuário.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Digite uma Senha.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        if (password_verify($password, $hash)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "A senha não é valida! Digite uma senha valida.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "Usuário não cadastrado! Cadastre-se";
                }
            } else {
                echo "Oops! Alguma coisa deu errado. Tente novamete mais tarde!";
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
            <a href="index.php"><img src="App\View\images\banner_caes_gatos.png"></a>

        </div>
    </div>
</section>

<div class="wrapper">
    <div class="tela_login text-center">
        <h2>Login</h2>
        <p>Coloque seus dados para entrar.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-row text-center">
                <div class="form-group col-md-7 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> ">
                    <label>
                        <h5>Usuário:</h5>
                    </label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group col-md-4 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?> ">
                    <label>
                        <h5>Senha:</h5>
                    </label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Entrar">
            </div>
            <div class="text-center">
            <p>Não tem uma conta?</p>
            <a href="register.php">Registre-se agora!</a>
            </div>
        </form>
    </div>
</div>
<div class="tarja">
    <p>_______________</P>
</div>

</footer>
</body>

</html>