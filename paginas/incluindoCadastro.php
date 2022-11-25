
 <script>
        $('#foto_doc').change(function(){
            const file = $(this)[0].files[0];
            const fileReader = new FileReader();
            fileReader.onloadend = function(){
                $('#img').attr('src', fileReader.result);
            }
            fileReader.readAsDataURL(file)
        });
    </script>
<?php

include('connect.php');

var_dump($_POST);

$profissao = implode(';', $_POST['profissao']);

var_dump($profissao);

$foto_doc = $_FILES['foto_doc'];
$diretorio = "imgs/" . md5(time()) . ".jpg";
move_uploaded_file($foto_doc['tmp_name'], $diretorio);
$nomeCompleto = $_POST['cdo_nomecompleto'];
$email = $_POST['cdo_email'];
$senha = $_POST['cdo_senha'];
//$hash = password_hash($senha, PASSWORD_DEFAULT);
$confirmSenha = $_POST['cdo_senhaConfirm'];
//$hashConfirm = password_hash($confirmSenha, PASSWORD_DEFAULT);
$apelido = $_POST['cdo_apelido'];
$cpf = $_POST['cdo_cpf'];
$datanasc = $_POST['cdo_dtnsc'];
$telefone = $_POST['cdo_telefone'];
$cep = $_POST['cdo_cep'];
$rua = $_POST['cdo_rua'];
$bairro = $_POST['cdo_bairro'];
$cidade = $_POST['cdo_cidade'];
$uf = $_POST['cdo_uf'];
$numeroCasa = $_POST['cdo_numero_casa'];
$complemento = $_POST['cdo_complemento'];
$habilidades = $_POST['cdo_habilidades'];


$sql = "INSERT INTO cadastro(cdo_nomecompleto,cdo_profissao,cdo_email,cdo_senha,cdo_senhaConfirm,cdo_apelido,cdo_cpf,cdo_dtnsc,
 cdo_telefone,cdo_cep,cdo_rua,cdo_bairro,cdo_cidade,cdo_uf,cdo_numero_casa,cdo_complemento,cdo_habilidades,foto_doc) VALUES('$nomeCompleto','$profissao','$email','$senha','$senhaConfirm',
 '$apelido','$cpf','$datanasc','$telefone','$cep','$rua','$bairro','$cidade','$uf','$numeroCasa','$complemento','$habilidades','$diretorio')";

// echo "br". $sql;

if (mysqli_query($conexao, $sql)) {
  echo "O usuario foi cadastrado com sucesso!";
   header("Location: login.php?variavel=1");
} else {
  echo " Erro ao tentar cadastrar o usuario. " . mysqli_connect_error($conexao);
  //header("Location: login.php?variavel=2");
}
mysqli_close($conexao);
?>