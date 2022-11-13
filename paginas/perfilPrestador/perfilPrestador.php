<?php

include("../connect.php");

session_start();

$TudoCerto = $_GET['atualizado'];

if (!isset($_SESSION['cdo_id'])) {
    header("Location: ../login.php?erro=true");
    exit;
} else if (isset($_SESSION['cdo_id'])) {
    $dados = $_SESSION['cdo_id'];
    $consulta = "SELECT * FROM CADASTRO WHERE cdo_id = '$dados'";
    $result = $conexao->query($consulta);
    $user_data = mysqli_fetch_assoc($result);
}



if (isset($_GET['deletar'])) {

    $id = intval($_GET['deletar']);
    $sqlQuery = $conexao->query("SELECT * FROM arquivos WHERE id ='$id'") or die($conexao->error);
    $arquivo = $sqlQuery->fetch_assoc();

    if (unlink($arquivo['path'])) {
        $deuCerto = $conexao->query("DELETE  FROM arquivos WHERE id ='$id'") or die($conexao->error);
        //if ($deuCerto)
        // echo "<p>Arquivo Excluído com sucesso</p>";
    }
}

function enviarAquivo($error, $size, $name, $tmp_name)
{
    include("../connect.php");

    if ($error)
        die("Falha ao enviar arquivo");

    if ($size > 2097152)
        die("Arquivo muito grande!! Max: 2MB");

    $pasta = "arquivos/";
    $nomeArquivo = $name;
    $novoNomeArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" &&  $extensao != 'jpeg' && $extensao != 'png')
        die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomeArquivo . "." . $extensao;
    $deuCerto = move_uploaded_file($tmp_name, $path);
    if ($deuCerto) {
        $conexao->query("INSERT INTO arquivos (nome, path)VALUES ('$nomeArquivo','$path')") or die($conexao->error);
        return true;
    } else
        return false;
}

if (isset($_FILES['arquivos'])) {
    $arquivos = $_FILES['arquivos'];
    $tudoCerto = true;
    foreach ($arquivos['name'] as $perfilPrestador => $arq) {
        $deuCerto2 = enviarAquivo(
            $arquivos['error'][$perfilPrestador],
            $arquivos['size'][$perfilPrestador],
            $arquivos['name'][$perfilPrestador],
            $arquivos["tmp_name"][$perfilPrestador]
        );

        if (!$deuCerto2)
            $tudoCerto = false;
    }
}


$sqlQuery = $conexao->query("SELECT * FROM arquivos") or die($conexao->error);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfilPrestador.css">
    <link href="https://fonts.googleapis.com/css2?family=
    Mukta+Vaani:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome-6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../chat/styles.css">
    <script type="text/javascript" src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(window).bind("beforeunload", function() {
            if ($("#myModal").is(":visible")) {
                return "Você não salvou a sua tarefa, gostaria mesmo de sair?";
            }
        });
    </script>

    <script type="text/javascript">
        function ajax() {
            var req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (req.readyState == 4 && req.status == 200) {
                    document.getElementById('chat').innerHTML =
                        req.responseText;
                }
            }

            req.open('GET', '../chat/chat.php', true);
            req.send();
        }
        setInterval(function() {
            ajax();
        }, 1000);
    </script>
    <title>Perfil</title>
</head>

<body onload="checaCookie()">

    <nav id="navbar">
        <div id="navbar-container">
            <h1 class="logo"> WEB JOBS</h1>
            <ul id="navbar-items">
                <li><a href=""></a></li>

                <div class="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" color="#00bfff" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                    </svg>
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        User
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../sobrenos.php">Sobre Nos</a></li>
                        <li><a class="dropdown-item" href="../servicos.php">Serviços</a></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </div>
            </ul>


        </div>
    </nav>

    <div class="container">
        <div class="profile-header">
            <div class="profile-img">
                <?php echo "<img src=../$user_data[foto_doc] id='foto'></a>"; ?>

                <nav id="navs">
                    <ul id="foto">
                        <li><img src="img/cam.png" width="200px" id="cam">
                            <ul>
                                <li>Upload de foto</li>
                                <li>Remover foto</li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- camera -->

            <div class="profile-nav-info">
                <h3 class="user-name">

                    <?php
                    echo $user_data['cdo_nomecompleto'] . "<br>";
                    ?>
                </h3>
                <div class="endereco">
                    <p class="estado">

                        <?php
                        echo $user_data['cdo_uf'] . "<br>";
                        ?>
                    </p>
                    <span class="cidade">
                        <?php
                        echo $user_data['cdo_cidade'] . "<br>";
                        ?>
                    </span>
                </div>
            </div>
            <div class="perfil-opcoes">
                <div class="notificacao">
                    <a href="configuracaoPerfil.php"><i class="fa fa-cog"></i></a>

                </div>
            </div>
        </div>
        <div class="main-bd">
            <div class="lado-esquerdo">
                <div class="profile-side">
                    <p class="mobile-no"><i class="fa fa-phone"></i>

                        <?php
                        echo $user_data['cdo_telefone'] . "<br>";
                        ?>
                    </p>
                    <p class="user-mail"><i class="fa fa-envelope"></i>
                        <?php
                        echo $user_data['cdo_email'] . "<br>";
                        ?>
                    </p>
                    <div class="user-bio">
                        <h3>Bio</h3>
                        <p class="bio">
                            <?php
                            echo $user_data['cdo_habilidades'] . "<br>";
                            ?>
                        </p>
                    </div>



                    <script>

                    </script>
                    <div class="profile-btn">
                        <button type="button" class="chatbtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">

                            <i class="fa fa-comment"></i>Chat
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button" class="createbtn" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i>Create
                        </button>


                    </div>
                    <div class="user-raring">
                        <h3 class="rating">4.5</h3>
                        <div class="rate">
                            <div class="estrelas">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="no-user">
                                <span>123</span> &nbsp;
                                &nbsp; Reviews
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lado-direito">
                <div class="nav">
                    <ul>
                        <li onclick="tabs(0)" class="user-post active">
                            Posts

                        </li>
                        <li onclick="tabs(1)" class="user-review">
                            Reviews
                        </li>

                    </ul>
                </div>
                <div class="profile-body">
                    <div class="perfil-posts tab">
                        <div class="galery">
                            <h1 class="titulo">Galeria de Fotos</h1>

                            <?php
                            while ($arquivo = $sqlQuery->fetch_assoc()) {
                            ?>
                                <div class="coluna">
                                    <a href="<?php echo $arquivo['path']; ?>" target="_blank">
                                        <img width="150px" ; height="150px" ; src="<?php echo $arquivo['path']; ?>" alt="">
                                    </a>
                                    <?php echo date("d/m/y H:i", strtotime($arquivo['data_upload'])); ?>
                                    <a id="link" href="perfilPrestador.php?atualizado=2&deletar=<?php echo $arquivo['id']; ?>"><i class="fa fa-trash"></i></a>
                                </div>


                            <?php
                            }
                            ?>
                        </div>
                        <!-- Modal Fotos -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Enviar Foto</h5>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" enctype="multipart/form-data" action="perfilPrestador.php?atualizado=3">
                                            <div>
                                                <label for="arquivo">Selecione um aqurivo</label>
                                                <input multiple name="arquivos[]" type="file" id="arquivo">
                                            </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="enviar" name="upload" type="submit">Enviar</button></a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="perfil-review tab">
                        <h1>Seus Reviews</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Quia saepe praesentium minus voluptates aperiam voluptate
                            blanditiis repudiandae quasi eos, incidunt commodi. Reprehenderit
                            rem quaerat saepe alias ut earum quia. Illo.</p>
                    </div>
                    <!-- Modal  Chat-->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">CHAT </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="conteudo">
                                        <div id="caixa-chat">
                                            <div id="chat">
                                            </div>

                                        </div>

                                        <form method="POST">

                                            <textarea name="mensagem" placeholder="Insira uma mensagem"></textarea>
                                            
                                           <input type="submit" name="enviar" value="Enviar">
                                        </form>

                                        <?php
                                        if (isset($_POST['enviar'])) {
                                            $nome = $user_data['cdo_nomecompleto'];
                                            $mensagem = $_POST['mensagem'];
                                            $consulta = "INSERT INTO tb_chat (nome, mensagem) VALUES ('$nome', '$mensagem')";
                                            $executar = $conexao->query($consulta);
                                            if ($executar) {
                                                echo "<embed loop='false' src='beep.mp3'hidden='true' autoplay='true'>";
                                            }
                                        }

                                        ?>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script>
        function checaCookie() {

            staticBackdrop();
            if (navigator.cookieEnabled == true)
                staticBackdrop();
            else
                alert("Cookies bloqueados")
        }
    </script>

    <?php
    $var = $TudoCerto;
    ?>
    <script>
        <?php
        echo "var jsvar ='$var';";
        ?>
        console.log(jsvar);
    </script>
    <div id="snackbarss">Imagem foi adicionada a galeria com sucesso!!</div>
    <div id="snackbars">Imagem excluida com sucesso!!</div>
    <div id="snackbar">Dados do usuario foram atualizados com sucesso!!</div>
    <script type="text/javascript">
        if (jsvar == 1) {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        } else if (jsvar == 2) {
            var x = document.getElementById("snackbars");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        } else if (jsvar == 3) {
            var x = document.getElementById("snackbarss");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
    </script>




    <script src="./js/perfil.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>