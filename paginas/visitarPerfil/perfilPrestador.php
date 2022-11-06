<?php
    include('../connect.php');

    $retorno = $_GET['email'];

    $consulta = "SELECT * FROM CADASTRO WHERE cdo_email = '$retorno'";
    
    $resultado = $conexao->query($consulta);
    $user_data = mysqli_fetch_assoc($resultado);
     
   
  
    ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <!--  <link rel="stylesheet"type="text/css" href="../chat/styles.css"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfilPrestador.css">
    <link rel="stylesheet" href="fontawesome-6.2.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


    <script type="text/javascript">
    function ajax(){
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status == 200){
                document.getElementById('chat').innerHTML = 
                req.responseText;
            }
        }

        req.open('GET','chat.php', true);
        req.send();
    }
    setInterval(function(){ajax();}, 1000);
    </script>

    <title>Perfil</title>
</head>

<body>
    <div class="container">
        <div class="profile-header">
            <div class="profile-img">
                <img src="img/image-perfil.jpg" width="200px" alt="Image Perfil">
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
                        echo $user_data['cdo_telefone'] . "<br>"
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
                    <button type="button" class="chatbtn" onclick="window.location.href='../chat/index.php'">

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
                        <div class="galery-container">
                            <h1 class="titulo">Galeria de Fotos</h1>
                            <div class="tabela">


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

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
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