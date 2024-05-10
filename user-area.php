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
    <title>Vagas Pinhal Usuario</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="resultado row container-fluid p-0">

        <footer>
            <a href="index.php">
                <img src="img/VagasPinhal.svg" alt="" class="img_vagasPinhal">
            </a>
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

        <div class="">
            <div class="col-3 d-flex justify-content-center align-items-center flex-column p-5">
                <div class="imgFundo">
                    <img src="img/fundo_blue.svg" alt="" id="cavalo">
                </div>
                <div style="width: 254px;" class="d-flex justify-content-center align-items-center">
                    <div class="col-12"><img src="img/augusto-calheiros 1.png" alt="" id="user-img"></div>
                </div>


                <div class="info-user d-flex justify-content-center align-items-center">
                    <div class="row col-12">
                        <p id="name-user" class="col-12 text-center"><?php echo $_SESSION['nome']; ?></p>
                        <hr style="width: 220px;">
                    </div>

                </div>

            </div>



            <?php

            include_once "conexao.php";
            $sql = "SELECT * FROM  vagas;";
            $resultado = mysqli_query($conexao, $sql);
            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while ($dados = $result->fetch_assoc()) {
                    echo '
                        <div class="d-flex justify-content-center align-items-center">
                        <div class="col-6 m-4">
                          <div class="card shadow-sm p-4 col-8 ">
                          <div class="row p-2" >
                              <div class="col-2"><img src = "' . $_SESSION["logo1"] . '" alt="" class="w-100"></div>
                              <div class="col-6 p-2"><p class="h5">' . $dados["nome_da_empresa"] . ' </p></div></div>
                              <p class="card-text">' . $dados["descricao"] . '</p>
                          <img src="' . $dados["imagem"] . '" alt="" class="w-100">
                            <div class="card-body">                              
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                  <buttom><a class="btn btn-sm btn-outline-secondary">Enviar Curriculo</a></buttom>
                                  <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                                </div>
                                <small class="text-body-secondary">' . $dados["data_cadastro"] . '</small>
                              </div>
                            </div>
                          </div>
                        </div></div>';
                }
            } else {
                echo "0 results";
            }

            ?>

            </div>
        </div>


    </div>
</body>

</html>