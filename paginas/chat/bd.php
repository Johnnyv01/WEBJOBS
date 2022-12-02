<?php

 //banco de dados servidor local xampp
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "webjobs"; 

//Banco de dados hospedagem Umbler

/*$servidor = "mysql835.umbler.com";
$usuario = "gabrielfreitas";
$password = "projetoetec123";
$bd = "chat_bd";*/

$conexion = new mysqli ($servidor,$usuario,$password,$bd);

function formatarData($data) {
    return date("H:i:s", strtotime($data));
}


?>