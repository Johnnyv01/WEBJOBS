<?php
$host = 'localhost:8091';
$usuario = 'root';
$senha = '';
$database = 'webjobs';

$conexao = mysqli_connect($host,$usuario,$senha,$database);

if($conexao-> error){
die("Falha ao conectar no banco de dados " . $conexao->error);
}

?>