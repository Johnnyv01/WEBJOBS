// Testando a validação usando jQuery
$(function(){

    // ## EXEMPLO 2
    // Aciona a validação ao sair do input
    $('.cpf_cnpj').blur(function(){
    
        // O CPF ou CNPJ
        var cpf_cnpj = $(this).val();
    });
    
});