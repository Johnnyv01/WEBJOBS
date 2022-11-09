<?php
include('connect.php');

$retorno = $_GET['verdade'];


if (isset($_POST['cdo_email']) || isset($_POST['cdo_senha'])) {

  if (strlen($_POST['cdo_email']) == 0) {
    echo "Preencha o seu email";
  } else if (strlen($_POST['cdo_email']) == 0) {
    echo "Preencha sua senha";
  } else {
    $cdo_email = $conexao->real_escape_string($_POST['cdo_email']);
    $cdo_senha = $conexao->real_escape_string($_POST['cdo_senha']);

    $sql_code = "SELECT * FROM `cadastro` WHERE `cdo_email` = '$cdo_email' AND `cdo_senha` = '$cdo_senha'";

    $sql_query = $conexao->query($sql_code) or die("Falha na execucao do codigo sql: " . $conexao->error);
    var_dump($sql_query);
    $quantidade = $sql_query->num_rows;
    if ($quantidade == 1) {
      $usuario = $sql_query->fetch_assoc();
      if (!isset($_SESSION)) {
        session_start();
      }
      $_SESSION['cdo_id'] = $usuario['cdo_id'];
      $_SESSION['cdo_senha'] = $usuario['cdo_senha'];

      header("Location: perfilPrestador/perfilPrestador.php");
    } else {
      echo "Falha ao logar email ou senha icorretos";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>Login</title>
</head>

<body>
    <nav id="navbar">
      <div id="navbar-container">
        <h3> <a href="index.php"> WEB JOBS </a></h3>
        <ul id="navbar-items">
          <li><a href="sobrenos.php"> Sobre Nós </a></li>
          <li><a href="servicos.php"> Serviços </a></li>
          <li><a href="login.php">Entrar </a></li>
        </ul>
      </div>
    </nav>
  

  <div id="abrirModal" class="modal">
    <div class="container_conteudo">
      <a href="#fechar" title="Fechar" class="fechar">x</a>
      <h2> Esqueci minha senha</h2>
      <p>Para recuperar o seu acesso, precisamos que você digite o seu email</p>
      <label for="email">Email</label>
      <input type="text" id="email" name="cdo_email"><br><br>
      <button class="btn-enviar">Enviar</button>
    </div>
  </div>

  <div class="main-login">
    <div class="lado-esquerdo">
      <h1>Faça login<br>E Encontre os melhores prestadores</h1>
      <img class="lado-esquerdo-img" src="../imagens/entra.svg" alt="connected-world-animate">
    </div>

    <form action="" method="POST">
      <div class="lado-direito">

        <div class="card-login">
          <h1>LOGIN</h1>
          <div class="textfield">
            <label for="email">Email</label>
            <input type="text" name="cdo_email" placeholder="Email">
          </div>
          <div class="textfield">
            <label for="senha">Senha</label>
            <input type="password" name="cdo_senha" placeholder="Senha"><br>
            <a href="#abrirModal">Esqueci minha senha</a>
          </div>

          <button class="btn-login">Login</button>
          <a href="cadastro.php">Clique aqui para se cadastra!</a>
    </form>

  </div>

  </div>
  </div>

  
<script>
  if ($tudoCerto)
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  <div id="snackbar">Usuario cadastrado com sucesso!!</div>
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

</html>