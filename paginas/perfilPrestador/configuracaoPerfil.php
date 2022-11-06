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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/configuracaoPerfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle " width="150px" src="img/image-perfil.jpg">
                    <span class="font-weight-bold">
                        <?php echo $user_data['cdo_nomecompleto'] . "<br>";
                        ?>
                    </span>
                    <span class="text-black-50">
                        <?php echo $user_data['cdo_email'] . "<br>";
                              
                        ?>
                    </span><span> </span>
                </div>
            </div>

            <div class="col-md-5 border-right">
                <form action="salvaralteracao.php" method="POST">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Configuração perfil</h4>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Nome</label>
                                <input type="text" value="<?php echo $user_data['cdo_nomecompleto']; ?>" name="cdo_nomecompleto" class="form-control" placeholder="Nome completo" id="nome_completo">
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Número</label>
                                <input type="text" value="<?php echo $user_data['cdo_telefone']; ?>" name="cdo_telefone" class="form-control" placeholder="Número de celular" id="cdo_telefone">
                            </div>

                            <div class="col-md-12">
                                <label class="labels">E-mail</label>
                                <input type="text" value="<?php echo $user_data['cdo_email']; ?>" name="cdo_email" class="form-control" placeholder="Endereço de e-mail"  id="cdo_email">
                            </div>

                            <div class="col-md-12">
                                <label class="labels">Apelido</label>
                                <input type="text" value="<?php echo $user_data['cdo_apelido']; ?>" name="cdo_apelido" class="form-control" placeholder="Como gostaria de ser chamado"  id="cdo_apelido">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">CEP</label>
                                <input type="text" value="<?php echo $user_data['cdo_cep']; ?>" name="cdo_cep" class="form-control" placeholder="Insira o CEP"  id="cdo_cep">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Rua</label>
                                <input type="text" value="<?php echo $user_data['cdo_rua']; ?>" name="cdo_rua" class="form-control" placeholder="Rua"  id="cdo_rua">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Bairro</label>
                                <input type="text" value="<?php echo $user_data['cdo_bairro']; ?>" name="cdo_bairro"  class="form-control" placeholder="Bairro "  id="cdo_bairro">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Número casa</label>
                                <input type="text" value="<?php echo $user_data['cdo_numero_casa']; ?>" name="cdo_numero_casa"class="form-control" placeholder="Número da casa"  id="cdo_numero_casa">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Complemento</label>
                                <input type="text" value="<?php echo $user_data['cdo_complemento']; ?>" name="cdo_complemento" class="form-control" placeholder="Complemento"  id="cdo_complemento">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Cidade</label>
                                <input type="text" value="<?php echo $user_data['cdo_cidade']; ?>" name="cdo_cidade" class="form-control" placeholder="Cidade" id="cdo_cidade" >
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Estado/Região</label>
                                <input type="text" value="<?php echo $user_data['cdo_uf']; ?>" name="cdo_uf" class="form-control" placeholder="Estado" id="cdo_uf">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Salva perfil</button>
                            <a href="perfilPrestador.php"><button class="btn btn-primary back-profile" type="button">voltar</button></a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>