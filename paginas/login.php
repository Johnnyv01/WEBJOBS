<?php
include('connect.php');

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
            $_SESSION['cdo_email'] = $usuario['cdo_email'];
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
    <title>Login</title>
</head>

<body>
    <header>
        <nav id="navbar">
            <div id="navbar-container">
                <h1> <a href="index.php"> WEB JOBS </a></h1>
                <ul id="navbar-items">
                    <li><a href="sobrenos.php"> Sobre Nós </a></li>
                    <li><a href="servicos.php"> Serviços </a></li>
                    <li><a href="login.php">Entrar </a></li>
                    <li><a href="logout.php">Sair </a></li>
                </ul>
            </div>
        </nav>
    </header>

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

    <div id="footer">
        <p>Copyright 2022 - Todos os direitos reservados</p>
    </div>

</body>

</html>