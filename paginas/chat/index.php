<?php
include('../connect.php');
session_start();

if (!isset($_SESSION['cdo_email'])) {
    header("Location: ../login.php?erro=true");
    exit;
} else if (isset($_SESSION['cdo_email'])) {
    $dados = $_SESSION['cdo_email'];
    $consulta = "SELECT * FROM CADASTRO WHERE cdo_email = '$dados'";
    $result = $conexao->query($consulta);
    $user_data = mysqli_fetch_assoc($result);
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet"type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=
    Mukta+Vaani:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    
    <title> Chat</title>
</head>
<body>
    
    <div id="conteudo"> 
        <div id="caixa-chat">
            <div id="chat"> 
            
            
            </div>
        
        </div>

        <form method="POST" action=""> 
           
            <textarea name="mensagem" placeholder="Insira uma mensagem"></textarea>    
            <input type="submit" name="enviar" value="Enviar">
        </form>

        <?php
        if(isset($_POST['enviar'])){
            $nome = $user_data['cdo_nomecompleto'];
            $mensagem = $_POST['mensagem'];
            $consulta = "INSERT INTO tb_chat (nome, mensagem) VALUES 
            ('$nome', '$mensagem')";
            $executar = $conexao->query($consulta); 
            if($executar){
                echo"<embed loop='false' src='beep.mp3'
                hidden='true' autoplay='true'>";
            }
        }

        ?>

    </div>

</body>
</html>