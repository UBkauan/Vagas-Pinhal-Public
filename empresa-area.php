<?php
include_once("conexao.php");

session_start(); // Iniciar sessão


if (isset($_POST['btn_enviar']))
{
    $tituloVaga = $_POST['titulo'];
    $descricaoVaga = $_POST['descricao'];
    $data_cadastro = date('d/m/y H:i:s');

    $sql = "INSERT INTO vagas (titulo,descricao,data_cadastro) VALUES ('$tituloVaga','$descricaoVaga','$data_cadastro');";
    $sql1 = "SELECT * FROM vagas WHERE titulo = '$tituloVaga' AND descricao = '$descricaoVaga';";
    $verifica = mysqli_query($conexao, $sql1);

    echo $data_cadastro;
    if (mysqli_num_rows($verifica) == 0)
    {
        if (mysqli_query($conexao,$sql)){
            echo 'Vaga enviada com sucesso';
        }
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