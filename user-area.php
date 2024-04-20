<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="resultado">
        <a href="index.php">Voltar</a>
        <div class="User_name">
            <p></p>
        </div>
        <?php
        include_once "conexao.php";
        $sql = "SELECT * FROM  usuario;";
        $resultado = mysqli_query($conexao, $sql);
        ?>
        <div class="container">
        <table class="table">
                <thead>
                        <th scope="col">Nome</th>
                </thead>
                <tbody>
                    <?php
                    $result = $conexao->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <th scope="row">' . $row["nome"] . '</th>
                             ';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conexao->close();
                    ?>
                </tbody>
            </table>






            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conexao->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
                            <th scope="row">' . $row["titulo"] . '</th>
                             <tr>
                      <th scope="row">' . $row["titulo"] . '</th>
                      <td>' . $row["descricao"] . '</td>
                      <td>' . date_format(date_create($row["data_cadastro"]), 'd/m/Y') . '</td>
                     </tr>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conexao->close();
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>