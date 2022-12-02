<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styles.css" type="text/css">
  <link rel="stylesheet" media="screen and (max-width: 768px)" href="../css/mobile.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <title>WEBJOBS</title>
</head>

<body>
  <script>
    if ('geolocation' in navigator) {
      navigator.geolocation.getCurrentPosition(function(position) {
        console.log(position)
      }, function(error) {
        console.log(error)
      })
    } else {
      alert('ops, nao foi possivel localizar')
    }
  </script>


  <nav id="navbar">
    <div id="navbar-container">
      <h3 class="logo"> WEB JOBS</h3>
      <ul id="navbar-items">
        <li><a href="sobrenos.php"> Sobre Nós </a></li>
        <li><a href="servicos.php"> Serviços </a></li>
        <li><a href="login.php?variavel">Entrar</a></li>
      </ul>
    </div>
  </nav>

  <section id="showcase">
    <div class="container">
      <div class="box">
        <div id="showcase-container">
          <h1>O PRAZER NO TRABALHO APERFEIÇOA A OBRA.</h1><br>
          <p>Encontre os melhores prestadores de serviços proximo de você!</p>
          <!--<img src="/imagens/img/location.png"  class="location" alt="" >
            <p>Localização atual</p>-->
          <form action="../paginas/servicosListado/servicosListado.php">
            <input name="cdo_profissao" size="50" class="search-text" placeholder="Digite o que deseja pesquisar">
            <button type="submit" class="button">Buscar</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="clients">
    <div class="headline">Serviços mais procurados</div>
    <div id="clients-container">
      <img src="../imagens/img/eletricista.jpeg" class="client" alt="">
      <img src="../imagens/img/encanador.jpg" class="client" alt="">
      <img src="../imagens/img/pedreiro.jpeg" class="client" alt="">
      <img src="../imagens/img/mecanico.jpeg" class="client" alt="">
    </div>
  </section>

  <section id="features" >
    <div class="headline" >O que fazemos</div>
    <div id="features-container"  data-aos="fade-up">
      <div class="feature">
        <i class="fa-solid fa-user-tie fa-3x"></i>
        <span class="feature-tittle">Facilidade na busca de emprego </span> <br>
        <p>Em um único ambiente você consegue busca capacitada e agilizada de diversos serviços
        </p>
      </div>
      <div class="feature">
        <i class="fa-solid fa-lock fa-3x"></i>
        <span class="feature-tittle">Segurança</span> <br>
        <p>Na WEBJOBS nós iremos fazer a intermediação do prestador e o contratante, iremos agendar a entrevista
          e qualificar o melhor prestador a você.
        </p>
      </div>
      <div class="feature">
        <i class="fas fa-layer-group fa-3x"></i>
        <span class="feature-tittle">Gerenciamento</span> <br>
        <p>Gerenciamos todo o seu processo de evolução na plataforma, deixando o seu perfil altamente almejado
          pela sua capacitação
        </p>
      </div>
    </div>
  </section>

  <section id="product">
    <div class="headline">Nosso produto</div>
    <div id="product-container"  data-aos="fade-right">
      <!--<img src="../imagens/img/iphonexr.jpg" alt="iphonexr">-->
      <div id="items">
        <div class="item">
          <i class="fa-solid fa-cloud fa-2x"></i>
          <p>Nós te conectamos aos melhores profissionais de diversas areas!</p>
        </div>
        <div class="item">
          <i class="fas fa-map-marked fa-2x color-primary"></i>
          <p>Encontre profissionais altamente capacitados e almejados no mercado mais proximo de voce!</p>
        </div>
        <div class="item">
          <i class="fas fa-layer-group fa-2x"></i>
          <p>Gerenciamos todo o seu progresso na plataforma!</p>
        </div>
        <div class="item">
          <i class="fa-solid fa-person fa-2x"></i>
          <p>Não contrate ou preste serviços a pessoas não qualificadas, nós te recomendaremos e iremos
            qualificar os melhores profissionais a você!</p>
        </div>
      </div>
    </div>
    </div>
  </section>

  <div id="testimonials">
    <div class="headline">O que falam sobre nós</div>
    <div id="testimonials-container">
      <div class="testimonial">
        <p>Excelente aplicativo, solucionou meu problema com profissionais sensacionais.</p>
      </div>
      <div class="testimonial">
        <p>Me ajudou muito e tem profissionais excelentes! Ótimo recomendo!</p>
      </div>
    </div>
  </div>

  <section id="gallery">
    <div class="headline">Serviços Prestados</div>
    <div id="gallery-container">

      <h2 class="w3-center">Os melhores prestadores</h2>

      <div class="w3-content w3-section" style="max-width:500px">
        <img class="mySlides" src="../imagens/img/encanador.jpg" style="width:100%">
        <img class="mySlides" src="../imagens/img/eletricista.jpeg" style="width:100%">
        <img class="mySlides" src="../imagens/img/mecanico.jpeg" style="width:100%">
        <img class="mySlides" src="../imagens/img/pedreiro.jpeg" style="width:100%">
      </div>
      <h2 class="w3-center">Os melhores prestadores</h2>

      <script>
        var myIndex = 0;
        carousel();

        function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          myIndex++;
          if (myIndex > x.length) {
            myIndex = 1
          }
          x[myIndex - 1].style.display = "block";
          setTimeout(carousel, 2000); // Change image every 2 seconds
        }
      </script>
    </div>
  </section>





  <script src="https://kit.fontawesome.com/71e5aa4932.js" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

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

</html>