function verificarSenha() {
    var senha_usuario = document.getElementById(senha_usuario).value;
    var confSenha = document.getElementById(confSenha).value;

    if (senha_usuario != confSenha){
        confSenha.setCustomValidity("Senhas diferentes!");
        confSenha.reportValidity();
        return false;
    }
}

confSenha.addEventListener('input', verificarSenha);