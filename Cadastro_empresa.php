<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro_Empresa.css">
    <title>Cadastro - Empresa</title>
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
            <div class="form-text">
                <h2>Cadastre Sua Empresa</h2>
            </div>
            <form id="empresaForm" action="cadastro_empresa.php" method="POST">
                <div class="input-box">
                    <label for="nome_empresa">Nome da Empresa:</label>
                    <input type="text" id="nome_empresa" name="nome_empresa">
                </div>

                <div class="input-box">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" id="cnpj" name="cnpj">
                </div>

                <div class="input-box">
                    <label for="email_empresa">Email Corporativo:</label>
                    <input type="email" id="email_empresa" name="email_empresa">
                </div>

                <div class="input-box">
                    <label for="senha_empresa">Senha:</label>
                    <input type="password" id="senha_empresa" name="senha_empresa">
                </div>

                <div class="input-box">
                    <label for="endereco_empresa">Endereço:</label>
                    <input type="text" id="endereco_empresa" name="endereco_empresa">
                </div>


                <p>Já tem uma conta? <a href="Login_empresa.php">Conectar-se</a></p>
                <p>É um usuário? <a href="cadastro.php">Cadastre-se Grátis aqui!</a></p>
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
                $nome_empresa = filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING);
                $cnpj = filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING);
                $email_empresa = filter_input(INPUT_POST, 'email_empresa', FILTER_SANITIZE_EMAIL);
                $senha_empresa = filter_input(INPUT_POST, 'senha_empresa', FILTER_SANITIZE_STRING);
                $endereco_empresa = filter_input(INPUT_POST, 'endereco_empresa', FILTER_SANITIZE_STRING);
                $cidade_empresa = filter_input(INPUT_POST, 'cidade_empresa', FILTER_SANITIZE_STRING);
                $estado_empresa = filter_input(INPUT_POST, 'estado_empresa', FILTER_SANITIZE_STRING);
                $cep_empresa = filter_input(INPUT_POST, 'cep_empresa', FILTER_SANITIZE_STRING);

                // Validação básica dos campos obrigatórios
                if (empty($nome_empresa) || empty($cnpj) || empty($email_empresa) || empty($senha_empresa)) {
                    echo "Todos os campos obrigatórios devem ser preenchidos.";
                    exit;
                }

                // Hash da senha antes de salvar no banco
                $senhaHash = password_hash($senha_empresa, PASSWORD_DEFAULT);

                // Insere dados na tabela 'empresas'
                $sql = "INSERT INTO empresas (nome_empresa, cnpj, email, senha, endereco, cidade, estado, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssss", $nome_empresa, $cnpj, $email_empresa, $senhaHash, $endereco_empresa, $cidade_empresa, $estado_empresa, $cep_empresa);

                if ($stmt->execute()) {
                    echo "Cadastro realizado com sucesso!";
                    header("Location: Login_empresa.php");
                    exit();
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