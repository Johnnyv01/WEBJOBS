<?php
include('../connect.php');

$retorno = $_GET['id'];

$consulta = "SELECT * FROM CADASTRO WHERE cdo_id = '$retorno'";

$resultado = $conexao->query($consulta);
$user_data = mysqli_fetch_assoc($resultado);

$consulta2 = "SELECT * FROM ARQUIVOS WHERE id = '129'";

$resultado2 = $conexao->query($consulta2);
$user_data2 = mysqli_fetch_assoc($resultado2);


$sqlQuery = $conexao->query("SELECT * FROM arquivos WHERE id_cadastro = '$retorno' ") or die($conexao->error);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!--  <link rel="stylesheet"type="text/css" href="../chat/styles.css"> -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/perfilPrestador.css">
  <link rel="stylesheet" href="perfilPrestador.css">
  <link rel="stylesheet" href="fontawesome-6.2.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


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

  <div class="container">
    <div class="profile-header">
      <div class="profile-img">
        <?php echo "<img src=../$user_data[foto_doc] id='foto'></a>"; ?>

      </div>

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
          <span class="pais">

            <?php

            echo $user_data['cdo_cidade'] . "<br>";
            ?>

          </span>
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
              echo $user_data['cdo_habilidades'] . "<br>"
              ?>
            </p>
          </div>

          <div class="profile-btn">
            <button type="button" class="chatbtn" onclick="window.location.href='../chat/indexVisitante.php?id=<?php echo $user_data['cdo_id']?>'" target="_blank">

              <i class="fa fa-comment"></i>Chat
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
              <h1 class="titulo">Portifólio</h1>
              
              <?php
              while ($arquivo = $sqlQuery->fetch_assoc()) {
              ?>
                <div class="coluna">

                <a href="<?php echo "../perfilPrestador/".$arquivo['path']; ?>" target="_blank">
                                        <img width="150px" ; height="150px" ; src="../perfilPrestador/<?php echo $arquivo['path']; ?>" alt="">
                                    </a>

                  <?php echo date("d/m/y H:i", strtotime($arquivo['data_upload'])); ?>
                 
                </div>


              <?php
              }
              ?>

              <!-- The Modal -->
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>

              <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImg");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
              </script>
              
            </div>

          </div>

          <div class="perfil-review tab">
            <h1>Seus Reviews</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Quia saepe praesentium minus voluptates aperiam voluptate
              blanditiis repudiandae quasi eos, incidunt commodi. Reprehenderit
              rem quaerat saepe alias ut earum quia. Illo.</p>
          </div>

        </div>
      </div>
    </div>
    <br>
  </div>
</body>


 <!-- Footer -->
 <footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Conecte-se com as nossas redes sociais:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>WEB JOBS
          </h6>
          <p>
            Ficou alguma duvida, entre em contato vamos adorar te conhecer
          </p>
        </div>

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
           MENU
          </h6>
          <p>
            <a href="#!" class="text-reset">Sobre nos</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Serviços</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Entrar</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> São paulo, SP 08253-000, BR</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            webjobs@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 55 9234 567 88</p>
         
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Webjobs.com.br</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="./js/perfil.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>