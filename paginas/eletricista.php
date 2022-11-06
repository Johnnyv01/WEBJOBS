<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="/paginas/css/mobile.css">
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
                <span class="eletricista-tittle">Solicitar eletricista </span> <br>
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
                <button class="my-button" onclick="alert('solicitacao enviada!')"> Clique para solicitar</button>

            </div>
    </section>

    <div id="footer">
        <p>Copyright 2022 - Todos os direitos reservados</p>
    </div>

</body>

</html>