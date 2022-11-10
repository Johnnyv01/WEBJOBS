<?php

include('../connect.php');
session_start();


if (!isset($_SESSION['cdo_id'])) {
  header("Location: ../login.php?erro=true");
  exit;
} else if (isset($_SESSION['cdo_id'])) {
  $dados = $_SESSION['cdo_id'];
  $consulta = "SELECT * FROM CADASTRO WHERE cdo_id = '$dados'";
  $result = $conexao->query($consulta);
  $user_data = mysqli_fetch_assoc($result);
}

$id= $user_data['cdo_id'];
$nome=$_POST['cdo_nomecompleto'];
$telefone=$_POST['cdo_telefone'];
$email=$_POST['cdo_email'];
$apelido=$_POST['cdo_apelido'];
$cep=$_POST['cdo_cep'];
$rua=$_POST['cdo_rua'];
$bairro=$_POST['cdo_bairro'];
$numero_casa=$_POST['cdo_numero_casa'];
$complemento=$_POST['cdo_complemento'];
$cidade=$_POST['cdo_cidade'];
$uf=$_POST['cdo_uf'];


  $sqlinsert = "UPDATE CADASTRO
  SET  cdo_nomecompleto = '$nome', cdo_telefone = '$telefone', cdo_email = '$email', cdo_apelido = '$apelido', cdo_cep = '$cep', cdo_rua = '$rua', cdo_bairro = '$bairro',
  cdo_numero_casa = '$numero_casa', cdo_complemento = '$complemento', cdo_cidade = '$cidade' , cdo_uf = '$uf' WHERE cdo_id = $id";
  
  if(mysqli_query($conexao,$sqlinsert)){
    header("Location: perfilPrestador.php?atualizado=1");
    
  } else {
     echo "Erro ao tentar cadastrar o usuario. " . mysqli_connect_error($conexao);
  }
  mysqli_close($conexao);
  ?>
  