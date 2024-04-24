
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro - Usuário</title>
</head>

<body>
    <nav>
        <div class="logo">

            <img src="img/VagasPinhal.svg" alt="">

        </div>

        <div class="div-botao">

            <button id="entrar"><a href="index.php">Home</a></button>
    </nav>
    </div>
    <div class="container">
        <div class="form-container">
            <div class="image-container"></div>

            <div class="form-text">
                <h2>Crie Sua Conta Grátis</h2>
            </div>

            <form id="userForm" action="cadastro.php" method="POST">
                <div class="input-box">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome">
                </div>

                <div class="input-box">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                </div>

                <div class="input-box">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Seu Email">
                </div>

                <div class="input-box">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Sua senha">
                </div>

                <p>Já tem uma conta? <a href="Login.php"> Conectar-se</a></p>
                <p>É uma empresa? <a href="Cadastro_empresa.php">Cadastre-se Grátis aqui!</a></p>
                <div>
                    <input type="submit" value="Criar Conta">
                </div>
                <?php
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

                // Coleta dados do formulário e filtra
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
                $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
                $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
                $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
                $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);

                // Validação básica dos campos obrigatórios
                if (empty($nome) || empty($sobrenome) || empty($email) || empty($senha)) {
                    echo "Todos os campos obrigatórios devem ser preenchidos.";
                    exit;
                }

                // Hash da senha antes de salvar no banco
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

                // Insere dados na tabela 'usuario'
                $sql = "INSERT INTO usuario (senha, email, nome, sobrenome, endereco, cidade, estado, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssss", $senhaHash, $email, $nome, $sobrenome, $endereco, $cidade, $estado, $cep);

                if ($stmt->execute()) {
                    echo "Cadastro realizado com sucesso!";
                    header("Location: Login.php");
                } else {
                    echo "Erro ao cadastrar: " . $conn->error;
                }

                $stmt->close();
                $conn->close();
                ?>

            </form>
            <footer></footer>
        </div>
    </div>

</body>

</html>