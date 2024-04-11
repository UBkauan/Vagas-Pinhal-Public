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

            <form id="userForm" action="Login_empresa.php" method="POST">
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
                session_start();

                // Verifica se os campos foram submetidos
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Conexão com o banco de dados
                    $usuario = "root";
                    $senha = "";
                    $url = "localhost";
                    $database = "LoginSystem";

                    $conn = mysqli_connect($url, $usuario, $senha, $database);

                    // Verifica conexão
                    if ($conn->connect_error) {
                        die("Conexão falhou: " . $conn->connect_error);
                    }

                    // Coleta dados do formulário
                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

                    // Consulta no banco de dados para verificar se o email existe
                    $sql = "SELECT id, email, senha FROM empresas WHERE email=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $senha_hash = $row['senha'];

                        // Verifica a senha
                        if (password_verify($senha, $senha_hash)) {
                            $_SESSION['empresa_id'] = $row['id'];
                            $_SESSION['email_empresa'] = $row['email'];
                            header("Location: empresa-area.php");
                            exit();
                        } else {
                            echo "Senha incorreta.";
                        }
                    } else {
                        echo "Email não encontrado.";
                    }

                    $stmt->close();
                    $conn->close();
                }
                ?>


            </form>
        </div>
    </div>

</body>

</html>