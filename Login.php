<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login - Usuário</title>

</head>

<body>
    <nav>
        <div class="logo">

            <img src="img/VagasPinhal.svg" alt="">

        </div>

        <div class="div-botao">

            <button id="entrar"><a href="index.php">Home</a></button>

        </div>


    </nav>
    <div class="container">

        <div class="form-container">
            <div class="image-container"></div>

            <form id="userForm" action="login.php" method="POST">
                <div class="form-text">
                    <h2>Logar</h2>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="input-box">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha">
                </div>
                <div class="btn-box">
                    <input type="submit" value="Entrar" id="btn-logar">
                </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Conectar ao banco de dados e verificar as credenciais
                    include('conexao.php');
                    $email = $_POST['email'];
                    $password = $_POST['senha'];

                    $sql = "SELECT * FROM usuario WHERE email='$email'";
                    $res = $conexao->query($sql);

                    if ($res && $res->num_rows > 0) {
                        $usuario = $res->fetch_assoc();
                        if (password_verify($password, $usuario['senha'])) {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["email"] = $email;
                            header("Location: user-area.php");
                            exit;
                        } else {
                            echo "E-mail ou senha incorretos.";
                        }
                    } else {
                        echo "E-mail ou senha incorretos.";
                    }
                }

                ?>
            </form>
        </div>
    </div>

</body>

</html>