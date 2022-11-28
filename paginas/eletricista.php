<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/solicitarServico.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="/paginas/css/mobile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <nav id="navbar">
        <div id="navbar-container">
            <h1> <a href="index.php"> WEB JOBS </a></h1>
            <ul id="navbar-items">
                <li><a href="sobrenos.php">Sobre Nós </a></li>
                <li><a href="servicos.php">Serviços </a></li>
                <li><a href="login.php">Entrar </a></li>
                <li><a href="loginPrestador.php">Ofereça o seu serviço</a></li>
            </ul>
        </div>
    </nav>
    <section id="eletricista">
        <div id="eletricista-container">
            <div class="eletricista">
                <i class="fa-solid fa-user-tie fa-3x"></i>
                <span class="eletricista-tittle">Solicita eletricista </span> <br>
                <p>Informe sua necessidade e os profissionais mais adequados e qualificados entrarão em contato com você
                    <br><br> </p>
                <h3>Informe a sua necessidade?<br><br> </h3>
                <div class="input-box">
                    <textarea placeholder="Descreva a sua real necessidade" required></textarea>
                    <div class="characters">
                        <span class="min_num">0</span>
                        <span class="limit_num">/500</span>
                    </div>
                </div>
                <div class="servicofeito"></div>
                <br>
                <h3>Onde o serviço será feito?</h3><br>
                <div class="input-boxx">
                    <textarea placeholder="Digite o local" required></textarea>
                    <div class="characterss">
                        <span class="min_numm">0</span>
                        <span class="limit_numm">/500</span>
                    </div>
                </div>
                <button class="my-button" onclick="location.href='solicitandoServico.php'"> Clique para solicitar</button>

            </div>
    </section>

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


    <div id="footer">
        <p>Copyright 2022 - Todos os direitos reservados</p>
    </div>

</body>

</html>