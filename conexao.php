<?php
    $usuario  = "root";
    $senha    = "";
    $url      = "localhost";
    $database = "loginsystem";
    
    $conexao = mysqli_connect($url, $usuario, $senha, $database);
    
    // Verifica se a conexão foi bem sucedida
    //if (!$conexao) {
    //    die("Falha na conexão: " . mysqli_connect_error());
    //}
    
    // Se chegou aqui, a conexão foi bem sucedida
    //echo "Conexão bem sucedida!";
?>