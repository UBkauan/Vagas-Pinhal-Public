<?php
include_once "conexao.php";
$sql = "SELECT * FROM  usuario;";
$resultado = mysqli_query($conexao, $sql);
// Start the session
session_start();
if (!isset($_SESSION['nome']))

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="resultado">

        <footer>
            <img src="img/VagasPinhal.svg" alt="" class="img_vagasPinhal">
            <div id="nav_bar1">
                <a href="index.php">
                    <div id="nav_home">

                        <span class="material-symbols-outlined">
                            home
                        </span>


                        <a href="index.php">HOME
                            <hr>
                        </a>

                    </div>
                </a>
                <a href="#">

                    <span class="material-symbols-outlined">
                        work
                    </span>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        chat
                    </span>
                </a>

                <a href="#">
                    <span class="material-symbols-outlined">
                        notifications
                    </span>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        grid_view
                    </span>
                </a>
            </div>
            <div id="nav_usuario">


                <div class="User_name">
                    <div id="userName"><?php echo $_SESSION['nome']; ?></div>
                </div>
                <div class="dropdown">

                    <div id="iten-imgArrow">
                        <img src="img/augusto-calheiros 1.png" alt="">
                        <a href="#">
                            <div class="dropdown-content">
                                <a href="#">Link 1</a>
                                <a href="#">Link 2</a>
                                <a href="#">Link 3</a>
                            </div>
                            <span class="material-symbols-outlined" class="dropbtn">
                                arrow_drop_down
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

        <main>

            <div class="div_usuario">
                <div class="imgFundo">
                    <img src="img/cavalo.svg" alt="" id="cavalo">
                    <div style="width: 254px;">
                        <img src="img/augusto-calheiros 1.png" alt="" id="user-img">
                    </div>
                </div>

                <div class="info-user">
                    <p id="name-user"><?php echo $_SESSION['nome']; ?></p>
                    <p>Profissão</p>
                    <hr>
                </div>

            </div>

            <div class="teste">
            <div style="width: 254px;" class="img-name">
            
                        <img src="img/mercado.png" alt="" class="perfil_img">
                        <p>Supermercado Biazoto Ltda</p>
                        <div class="descricao-vagas">
                            <p>'.$dados["descricao"].'</p>

                        </div>
                    </div>
                

                <div>
                </div>
                <?php

                include_once "conexao.php";
                $sql = "SELECT * FROM  vagas;";
                $resultado = mysqli_query($conexao, $sql);
                $result = $conexao->query($sql);

                if ($result->num_rows > 0) {
                    while ($dados = $result->fetch_assoc()) {
                        echo '';
                    }
                } else {
                    echo "0 results";
                }

                ?>
            </div>


        </main>


    </div>
</body>

</html>