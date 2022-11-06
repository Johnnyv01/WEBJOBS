<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="estilo.css">
</head>
    <body>

    <?php 
        require('connect.php');
        $webjob = mysqli_query($conexao, "Select * from `cadastro`");
        var_dump($webjob);
        echo "<div class=\"webjob\">";
        while($webjob = mysqli_fetch_array($webjob)){
            echo "<div>";
            echo "<p>Id: $cdo_id [cdo_id]</p>";
            echo "<p>Prestador: $cdo_prestador[cdo_prestador]</p>";
            echo "<p>Cliente: $cdo_cliente[cdo_cliente]</p>";
            echo "<p>Nome Completo: $cdo_nomecompleto[cdo_nomecompleto]</p>";
            echo "<p>Data de Nascimento: $cdo_dtnsc[cdo_dtnsc]</p>";
            echo "<p>CPF:$cdo_cpf[cdo_cpf]</p>";
            echo "<p>Telefone: $cdo_telefone[cdo_telefone] ></p>";
            echo "<p>Email: $cdo_email[cdo_telefone] ></p>";
            echo "<p>Apelido: $cdo_apelido[cdo_apelido] ></p>";
            echo "<p>Senha: $cdo_senha[cdo_senha] ></p>";
            echo "<p>Confirmar Senha: $cdo_senhaConfirm[cdo_senhaConfirm] ></p>";
            echo "</div>";
        }

        echo "</div>";

     ?>

    </body>
</html>