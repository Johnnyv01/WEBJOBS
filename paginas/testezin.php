<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar produtos</title>
</head>
<body>
    <?php
     include('connect.php');
      $consulta = "SELECT * FROM CADASTRO WHERE cdo_profissao = 'ConstrucaoCivil'";
      $result = $conexao->query($consulta);
      $user_data = mysqli_fetch_assoc($result);
      var_dump($user_data);
     /* echo "Nome: ";
      echo $user_data['cdo_nomecompleto']."<br>";
      echo "CPF: ";
      echo $user_data['cdo_cpf']."<br>";
      echo "Apelido: ";
      echo $user_data['cdo_apelido']."<br>";*/
    /* while(){
         echo "<tr>";
         echo "<td>".$user_data['cdo_nomecompleto']."</td>"." "."<br>".
         "</tr>";
        }*/

    ?> 
   
</body>
</html>