<?php
include_once("conexao.php");

session_start(); // Iniciar sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar o formulário de publicação de vagas
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO vagas (empresa_id, titulo, descricao) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iss", $_SESSION['empresa_id'], $titulo, $descricao);
    $stmt->execute();

    // Redirecionar para a página de sucesso
    header("Location: empresa-area.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Seja bem vindo sua empresa linda e maravilhosa</h1>
    <a href="index.php">Gostaria de voltar?</a>
    <form method="POST" action="">
        <input type="text" name="titulo" placeholder="Título da vaga" required><br>
        <textarea name="descricao" placeholder="Descrição da vaga" required></textarea><br>
        <button type="submit">Publicar Vaga</button>
    </form>
</body>

</html>