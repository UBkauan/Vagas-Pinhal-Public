<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="resultado">

        <?php
        include_once "conexao.php";
        $sql = "SELECT * FROM  vagas ORDER BY data_cadastro;";
        $resultado = mysqli_query($conexao, $sql);
        while ($dados = mysqli_fetch_assoc($resultado)) {
            echo '
            <div >
        <span>titulo: ' . $dados["titulo"] . '</span><br>
        <span>descricão: ' . $dados["descricao"] . '</span><br>
        </div>
        ';
        }
        ?>
    
    </div>
</body>

</html>