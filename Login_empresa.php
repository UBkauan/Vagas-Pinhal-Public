<?php
session_start();
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
            <a href="index.php">Home</a>
        </div>


    </nav>
    <div class="container">

        <div class="form-container">
            <div class="image-container"></div>

            <form id="userForm" action="Login_empresa.php" method="POST">
                <div class="form-text">
                    <h2>Acesse sua conta</h2>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Coloque seu E-mail institucional">
                </div>
                
                <div class="input-box">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Coloque sua Senha">
                </div>
                <div class="btn-box">
                    <input type="submit" value="Entrar" id="btn-logar">
                </div>
                <?php


                // Verifica se os campos foram submetidos
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Conexão com o banco de dados
                    include_once("conexao.php");

                    $conn = mysqli_connect($url, $usuario, $senha, $database);

                    // Verifica conexão
                    if ($conn->connect_error) {
                        die("Conexão falhou: " . $conn->connect_error);
                    }

                    // Coleta dados do formulário
                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);



                    // Consulta no banco de dados para verificar se o email existe
                    $sql = "SELECT * FROM empresas WHERE email=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();


                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $senha_hash = $row['senha'];
                        // Verifica a senha
                        if (password_verify($senha, $senha_hash)) {
                            $_SESSION['logo1'] = $row['logo'];
                            $_SESSION['email_empresa'] = $row['email'];
                            $_SESSION['nomeEmpresa'] = $row['nome_empresa'];
                            
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