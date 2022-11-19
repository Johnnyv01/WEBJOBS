
<?php
include('connect.php');
$texto = $_GET['texto'];


if (isset($_GET['enviar'])) {
	$nome = $user_data['cdo_nomecompleto'];
	$mensagem = $_POST['mensagem'];
	$consulta = "INSERT INTO tb_chat (nome, mensagem) VALUES ('$nome', '$mensagem')";
	$executar = $conexao->query($consulta);
	if ($executar) {
		echo "<embed loop='false' src='beep.mp3'hidden='true' autoplay='true'>";
	}
}



?>

