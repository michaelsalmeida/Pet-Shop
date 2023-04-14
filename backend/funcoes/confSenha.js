var confsenha = document.getElementsByName('confsenha')[0] // Pega os inputs de acordo com o name
var senha = document.getElementsByName('senha')[0]

confsenha.addEventListener('input', conferir) // Aciona a função quando o input tiver uma entrada
senha.addEventListener('input', conferir)

function conferir() {
    if (senha.value == confsenha.value && senha.value != '' && confsenha.value != '') {
        document.getElementById('cadastrar').disabled = false; // se as senhas forem diferentes, o botão será desativado
    } else {
        document.getElementById('cadastrar').disabled = true;
    }
}