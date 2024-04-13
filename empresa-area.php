<?php
include_once("conexao.php");

session_start(); // Iniciar sessão


if (isset($_POST['btn_enviar'])) {
    $tituloVaga = $_POST['titulo'];
    $descricaoVaga = $_POST['descricao'];
    $data_cadastro = date('d/m/y H:i:s');

    $sql = "INSERT INTO vagas (titulo,descricao,data_cadastro) VALUES ('$tituloVaga','$descricaoVaga','$data_cadastro');";
    $sql1 = "SELECT * FROM vagas WHERE titulo = '$tituloVaga' AND descricao = '$descricaoVaga';";
    $verifica = mysqli_query($conexao, $sql1);



    if ($conexao->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conexao->error;
    }
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
        <button type="submit" name="btn_enviar">Publicar Vaga</button>
    </form>
    
</body>

</html>