<?php
    include('connect.php');
    /*if(!isset($_GET['cdo_profissao'])){
    header("Location: login.php");
    exit;
}*/

    $pesquisa = $conexao->real_escape_string($_GET['cdo_profissao']);
    $sqlcode = "SELECT * FROM cadastro WHERE cdo_profissao LIKE '%$pesquisa%'";
    $sql_query = $conexao->query($sqlcode) or die("Erro ao fazer a consulta! " . $conexao->error);

    if (!isset($_GET['cdo_profissao'])) {
        echo "Digite algo para pesquisar";
    } else {
        $pesquisa = $conexao->real_escape_string($_GET['cdo_profissao']);
        $sqlcode = "SELECT * FROM cadastro WHERE cdo_profissao LIKE '%$pesquisa%'";
        $sql_query = $conexao->query($sqlcode) or die("Erro ao fazer a consulta! " . $conexao->error);

        if ($sql_query->num_rows == 0) {

            echo "Nenhuma resultado encontrado";
        } else {
            while ($dados = $sql_query->fetch_assoc()) {

                var_dump($dados);
            }
        }
    }
    ?>
              