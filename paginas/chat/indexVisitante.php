<?php
include('../connect.php');


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

        <form method="POST"> 
            <input type="text" name="nome" placeholder="Preencha seu nome">
            <textarea name="mensagem" placeholder="Insira uma mensagem"></textarea>    
            <input type="submit" name="enviar" value="Enviar">
        </form>

        <?php
        if(isset($_POST['enviar'])){
            $nome = $_POST['nome'];
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