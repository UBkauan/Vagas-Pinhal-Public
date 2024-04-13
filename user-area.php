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
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conexao->query($sql1);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo ' <tr>
                      <th scope="row">' . $row["titulo"] . '</th>
                      <td>' . $row["descricao"] . '</td>
                      <td>' . $row["data_cadastro"] . '</td>
                     </tr>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>