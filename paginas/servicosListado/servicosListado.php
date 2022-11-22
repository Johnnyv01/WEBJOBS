<?php
include('../connect.php');
/*if(!isset($_GET['cdo_profissao'])){
    header("Location: login.php");
    exit;
}*/

$pesquisa = $conexao->real_escape_string($_GET['cdo_profissao']);
$sqlcode = "SELECT * FROM cadastro WHERE cdo_profissao LIKE '%$pesquisa%'";
$sql_query = $conexao->query($sqlcode) or die("Erro ao fazer a consulta! " . $conexao->error);

if (!isset($_GET['cdo_profissao'])) {
    echo "Digite algo para pesquisar";
} else {
    $pesquisa = $conexao->real_escape_string($_GET['cdo_profissao']);
    $sqlcode = "SELECT * FROM cadastro WHERE cdo_profissao LIKE '%$pesquisa%'";
    $sql_query = $conexao->query($sqlcode) or die("Erro ao fazer a consulta! " . $conexao->error);
    if ($sql_query->num_rows == 0) {

        echo "Nenhuma resultado encontrado";
    }
    /*else {
            while ($dadoss = $sql_query->fetch_assoc()) {

              echo $dadoss['cdo_nomecompleto']."<br>";
            }
        }*/
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/servicosListado.css">

    <title>Document</title>
</head>

<body>

<nav id="navbar">
    <div id="navbar-container">
      <h3 class="logo"><a href="../index.php"> WEB JOBS</a></h3>
      <ul id="navbar-items">
        <li><a href="../sobrenos.php"> Sobre Nós </a></li>
        <li><a href="../servicos.php"> Serviços </a></li>
        <li><a href="../login.php?variavel">Entrar</a></li>
      </ul>
    </div>
  </nav>

    <br><br>
    <?php while ($dadoss = $sql_query->fetch_assoc()) : ?>
        
        <div class="container-fluid well span6">
            <div class="row-fluid">

                <div class="span2">
                    
                <?php echo "<img src=../$dadoss[foto_doc] id='foto'></a>"; ?>
                   <!-- <img src="img/image-perfil.jpg" class="img-circle">-->
                </div>

                <div class="span8">
                    <h3>

                        <?php
                        echo $dadoss['cdo_nomecompleto'] . "<br>";
                        ?>

                    </h3>

                    <h6>Categoria:
                        <?php
                        echo $dadoss['cdo_profissao'] . "<br>";
                        ?>
                    </h6>
                    <h6>Avaliação: Sem Avaliações</h6>
                    <p class="resumo-card"> 
                        <?php
                          echo $dadoss['cdo_habilidades'] . "<br>";
                          ?> <a href="#">More... </a></p>
                </div>

                <div class="span2">
                    <div class="btn-group">
                            
                        <a href='../visitarPerfil/perfilPrestador.php?id=<?php echo $dadoss['cdo_id']?>' class="btn btn-primary">Visitar Perfil</a> -->

                    </div>
                </div>

            </div>
        </div>
    <?php endwhile; ?>

</body>

 

</html>