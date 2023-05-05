function limpa_formulário_cep() { // limpa os campos relacionados as informações do eendereço
    document.getElementsByName('log')[0].value = ""
    document.getElementsByName('bairro')[0].value = ""
    document.getElementsByName('cid')[0].value = ""
    document.getElementsByName('uf')[0].value = ""
}

function meu_callback(conteudo) { 
    // insere as informações do endereço ao seus respectivos inputs
    if (!("erro" in conteudo)) {
        document.getElementsByName('log')[0].value = conteudo.logradouro
        document.getElementsByName('bairro')[0].value = conteudo.bairro
        document.getElementsByName('cid')[0].value = conteudo.localidade
        document.getElementsByName('uf')[0].value = conteudo.uf
    } else {
        limpa_formulário_cep()
        alert("CEP não encontrado.")
    }
}

function pesquisacep(valor) {
    // realiza a pesquisa pelo CEP digitado e ate retornar algo ele insere os "..." nos inputs
    var cep = valor.replace(/\D/g, '')

    if (cep != "") {
        var validacep = /^[0-9]{8}$/
        if (validacep.test(cep)) {
            document.getElementsByName('log')[0].value = "..."
            document.getElementsByName('bairro')[0].value = "..."
            document.getElementsByName('cid')[0].value = "..."
            document.getElementsByName('uf')[0].value = "..."

            var script = document.createElement('script')

            script.src = "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback"

            document.body.appendChild(script)
        } else {
            limpa_formulário_cep()
            alert("Formato de CEP inválido.")
        }
    } else {
        limpa_formulário_cep()
    }
}
