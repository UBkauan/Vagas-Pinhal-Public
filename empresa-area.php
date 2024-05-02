<?php
include_once("conexao.php");

session_start(); // Iniciar sessão
if (!isset($_SESSION['nomeEmpresa']))

    if (isset($_POST['btn_enviar'])) {

        $tituloVaga = $_POST['titulo'];
        $descricaoVaga = $_POST['descricao'];
        $data_cadastro = date('d/m/y H:i:s');


        $sql = "INSERT INTO vagas (titulo,descricao,data_cadastro) VALUES ('$tituloVaga','$descricaoVaga','$data_cadastro','$empresanome');";
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
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    <div class="resultado">

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
                    <div id="userName" style="color: white;"><?php echo $_SESSION['nomeEmpresa']; ?></div>
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
                    <p id="name-user"><?php echo $_SESSION['nomeEmpresa']; ?></p>
                    <p>Profissão</p>
                    <hr>
                </div>
                <div class="postagem">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input type="text" name="titulo" placeholder="Título da vaga" required><br>

                        <textarea name="descricao" placeholder="Descrição da vaga" required></textarea><br>
                        <button type="submit" name="btn_enviar">Publicar Vaga</button>
                    </form>

                    
                </div>
            </div>

            <div class="teste">

                <?php

                include_once "conexao.php";
                $sql = "SELECT * FROM  vagas;";
                $resultado = mysqli_query($conexao, $sql);
                $result = $conexao->query($sql);

                if ($result->num_rows > 0) {
                    while ($dados = $result->fetch_assoc()) {
                        echo '<div style="width: 254px;" class="img-name">

                        <img src="img/mercado.png" alt="" class="perfil_img">
                        <p>Supermercado Biazoto Ltda</p>
                     </div>
                     <div class="descricao-vagas">
                        <p>' . $dados["descricao"] . '</p>
                        <p>' . $dados["data_cadastro"] . '</p>
    
                        </div>
                        <img src="img/padeiro.svg" alt="" style="width: 590px;">
    
                    <div>
                    </div>';
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