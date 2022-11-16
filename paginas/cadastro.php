


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebJobs | Cadastro</title>
    <link rel="stylesheet" href="../css/cadastroPrestador.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous">
    </script>
    <script src="../js/cadastro/valida_cep.js"></script>

    <!-- Funções para validação de senha -->
    <script src="../js/cadastro/validarSenhaConfirm.js"></script>
    <!-- Funções para validação de CPF e CNPJ -->
    <script src="../js/cadastro/valida_cpf_cnpj.js"></script>
    <!-- Pressionando teclas -->
    <script src="../js/cadastro/exemplo_1.js"></script>
    <!-- Após sair do campo -->
    <script src="../js/cadastro/exemplo_2.js"></script>
    <!-- Formatando o CPF ou CNPJ -->
    <script src="../js/cadastro/exemplo_3.js"></script>
    <script>
        $(document).ready(function() {
            $('#numero_casa').mask('00000')
            $('.cpf_cnpj').mask('000.000.000-00', {
                reverse: true
            });
            $('input[name="cdo_telefone"]').mask('(00) 00000-0000');
            $('input[name="cdo_cep"]').mask('00000000');
            $('#nasc_usuario').mask('0000-00-00');
        });
    </script>

</head>

<body>

    <div id="corpo-form">
        <form action="incluindoCadastro.php" enctype="multipart/form-data" method="POST">
            <h1>Cadastro Prestador</h1>

            <div class="f-container">
                <p>
                    <label for="nome_completo">Nome Completo</label>
                    <input type="text" name="cdo_nomecompleto" class="inputs" id="nome_completo">
                </p>
                <p>
                    <label for="email_usuario">Email </label>
                    <input type="email" name="cdo_email" class="inputs" id="cdo_email">
                </p>
                <p>
                    <label for="senha_usuario">Senha </label>
                    <input type="password" name="cdo_senha" class="inputs" id="cdo_senha">
                </p>
                <p>
                    <label for="confSenha">Confimar Senha </label>
                    <input type="password" name="cdo_senhaConfirm" class="inputs" id="cdo_senhaConfirm">
                </p>
                <p>
                    <label for="user_usuario">Apelido </label>
                    <input type="text" name="cdo_apelido" class="inputs">
                </p>
                <p>
                    <label for="cpf">CPF</label>
                    <input type="bigint" name="cdo_cpf" class="cpf_cnpj" id="cpf" maxlength="14">
                </p>
                <p>
                    <label for="nasc_usuario">Data Nascimento</label>
                    <input type="date" name="cdo_dtnsc" class="inputs" id="cdo_dtnsc">
                </p>
                <p>
                    <label for="telefone">Telefone </label>
                    <input type="text" name="cdo_telefone" class="inputs" id="cdo_telefone">
                </p>
            </div>

            <div class="f-container">
                <p>
                    <label for="cep">CEP</label>
                    <input name="cdo_cep" type="text" id="cep" maxlength="9" class="inputs"
                     onblur="pesquisacep(this.value);">
                </p>
                <p>
                    <label for="rua">Rua </label>
                    <input name="cdo_rua" type="text" id="rua" class="inputs">
                </p>
                <p>
                    <label for="bairro">Bairro</label>
                    <input name="cdo_bairro" type="text" id="bairro" class="inputs">
                </p>
                <p>
                    <label for="cidade">Cidade</label>
                    <input name="cdo_cidade" type="text" id="cidade" class="inputs">
                </p>
                <p>
                    <label for="uf">UF</label>
                    <input name="cdo_uf" type="text" id="uf" size="2" class="inputs">
                </p>
                <p>
                    <label for="numero_casa">Número </label>
                    <input name="cdo_numero_casa" type="text" id="numero_casa" size="4" class="inputs">
                </p>
                <p>
                    <label for="complemento">Complemento </label>
                    <input name="cdo_complemento" type="text" id="complemento" class="inputs">
                </p>
            </div>

            <div class="f-container2">
                <h1>Escolha sua categoria</h1>
                <div class="categoria">
                    <input type="checkbox" id="ConstrucaoCivil" name="profissao[]" value="ConstrucaoCivil" >
                    <label class="inputRadio" for="ConstrucaoCivil">Construção civil</label>
                    <br><br>
                    <input type="checkbox" id="eletricista" name="profissao[]" value="eletricista" >
                    <label class="inputRadio" for="eletricista">Eletricista</label>
                    <br><br>
                    <input type="checkbox" id="servicosHidraulicos" name="profissao[]" value="servicosHidraulicos" >
                    <label class="inputRadio" for="servicosHidraulicos">Serviços hidráulicos</label>
                    <br><br>
                    <input type="checkbox" id="servicosInformatica" name="profissao[]" value="servicosInformatica" >
                    <label class="inputRadio" for="servicosInformatica">Serviços em informática</label>
                    <br>

                    <h1>Descreva suas habilidades</h1><br>

                    <script src="js/cadastro/cadastroPrestador.js"></script>
                </div>
            </div>

            <div class="input-box">
                <textarea placeholder="Escreva suas habilidades" name="cdo_habilidades" required></textarea>
                <!-- <input type="text" name="cdo_habilidades" class="inputs" id="cdo_habilidades"> -->
            </div>

            <div class="f-container-ft">
                <label for="foto_doc" id="ft">Foto de perfil <input type="file" name="foto_doc" id="foto_doc"></label>
                <label for="foto_doc"><img id="img"></label>
                <h5>Clique dentro do campo, e selecione a imagem.</h5>
                <input type="submit" value="Cadastrar" id="continuar">
            </div>
            <a href="login.php?variavel" id="voltar">Voltar</a>
        </form>
    </div>

    <div id="footer">
        <p id="text-footer">Copyright 2022 - Todos os direitos reservados</p>
    </div>

</body>
