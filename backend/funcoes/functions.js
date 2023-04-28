function executeFunctions(func, id) {
    // Define as variaveis necessárias no caso da função for acionada pelo botão de agendar
    extra = `&id=${id}`

    if (func == "fazAgendamentoCli") {
        // Pega o id do animal
        var idAnimal = document.getElementById('animais').value
        // Passa o id do agendamento e do animal para adicionar na url
        extra = `&idAgen=${id}&idAni=${idAnimal}`
    } else if (func == "fazerAgenParaCli"){
        var idAnimal = document.getElementById('animais').value;
        extra = `&idAgen=${id}&idAnimal=${idAnimal}`;
    }

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-shop/backend/execute.php?function=${func}${extra}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Pega a resposta do servidor
            location.href = response; // Segue a url voltada do servidor
        }
    };
    xhr.send();
}


function queryBanco(tipo) {

    // Define as variaveis necessárias no caso da função for acionada...

    extra = "";
    if (tipo == 'profissionais') { // para puxar os funcionários
        var servico = document.getElementById('servicos').value;
        extra = `&servico=${servico}`;

    } else if (tipo == 'gerarTabelaFazAgenCli') { // Puxar os agendamentos para o agendamento
        var tipoAgen = document.getElementById('tipoAgen').value
        var data = document.getElementById('dataAgen').value
        var extra = `&tipo=${tipoAgen}&data=${data}`;

    } else if (tipo == 'animais') {
        var cpf = document.getElementById('cpf').value;
        var extra = `&cpf=${cpf}`;
    }

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-shop/backend/execute.php?function=${tipo}${extra}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            
            var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
            document.getElementById(response[0]).innerHTML = response[1];
            
            // Seleciona o elemento de acordo com o primeiro valor do JSON
            // e coloca o segundo valor dentro deste elemento
        }
    };
    xhr.send();
}

function paginacao(tipo) {
    if (tipo == 'gerarTabelaDeleteFun') { // Listar funcionário
        var pesq = document.getElementById('pesq').value;
        var filtro = document.getElementById('situacoes').value;
        var extra = `&pesq=${pesq}&situ=${filtro}`;
        
    } else if (tipo == 'gerarTabelaAgenFun') { // Puxar os agendamentos para o funcionário
        var pesq = document.getElementById('pesq').value;
        var filtro = document.getElementById('status').value;
        var extra = `&pesq=${pesq}&status=${filtro}`;

    } else if (tipo == 'tabelaFunAgenCli'){
        var pesq = document.getElementById('pesq').value;
        var servico = document.getElementById('status').value;
        var extra = `&servico=${servico}&pesq=${pesq}`;
    } else if (tipo == 'tabelaComentarios'){
        var pesq = document.getElementById('pesq').value;
        var data = document.getElementById('data').value;
        var extra = `&pesq=${pesq}&data=${data}`;
    }

    var pag = document.getElementById('pag').innerText
    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-shop/backend/execute.php?function=${tipo}&pag=${pag}${extra}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) { 
            var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
            
            document.getElementById(response[0]).innerHTML = response[1];
            document.getElementById(response[2]).innerHTML = response[3];
            // Seleciona o elemento de acordo com o primeiro valor do JSON
            // e coloca o segundo valor dentro deste elemento
        }
    };
    xhr.send();
}

function queryBanco2(tipo) {

    // Define as variaveis necessárias no caso da função for acionada...
    extra = "";
    if (tipo == 'animais') {
        var cpf = document.getElementById('cpf').value;
        var extra = `&cpf=${cpf}`;
    

        var xhr = new XMLHttpRequest();
        // Executa o arquivo que irá iniciar a função
        xhr.open("GET", location.origin + `/Pet-shop/backend/execute.php?function=${tipo}${extra}`, true);
        xhr.onload = function () {
            if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
                document.getElementById(response[0]).innerHTML = response[1];
                if (response[1].length > 74){
                    document.getElementById('status').style.display = 'flex';
                    document.getElementById('divpesq').style.display = 'flex';
                    document.getElementById('tabela').style.display = 'flex';
                } else {
                    document.getElementById('status').style.display = 'none';
                    document.getElementById('divpesq').style.display = 'none';
                    document.getElementById('tabela').style.display = 'none';
                }
                // Seleciona o elemento de acordo com o primeiro valor do JSON
                // e coloca o segundo valor dentro deste elemento
            }
        };
    } else if (tipo == 'verificar'){
        var cpf = document.getElementById('cpf').value;
        var extra = `&cpf=${cpf}`;

        var xhr = new XMLHttpRequest();
        // Executa o arquivo que irá iniciar a função
        xhr.open("GET", location.origin + `/Pet-shop/backend/execute.php?function=${tipo}${extra}`, true);
        xhr.onload = function () {
            if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
                document.getElementById(response[0]).innerHTML = response[1];
                console.log(response[1]);
                console.log(response[1].length);
                if (response[1].length > 4){
                    document.getElementById('animal').style.display = 'block';
                    document.getElementById('aviso').style.display = 'none';
                    // document.getElementById('aviso').value = response[1][0];

                } else {
                    document.getElementById('animal').style.display = 'none';
                    document.getElementById('aviso').style.display = 'block';
                }   
            }
        };
    }
    xhr.send();
}

function altAnimal() {
    var idAni = document.getElementsByName("idAnimal")[0].value // Pega o id do animal

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-shop/backend/execute.php?function=altAnimal&idAni=${idAni}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
            document.getElementsByName("nome")[0].value = response[0];     // Adiciona o primeiro valor do JSON
            document.getElementsByName("dataNasc")[0].value = response[1]; // Adiciona o segundo valor do JSON
            document.getElementsByName("espec")[0].value = response[2];    // Adiciona o terceiro valor do JSON
            document.getElementsByName("raca")[0].value = response[3];     // Adiciona o quarto valor do JSON
            document.getElementsByName("peso")[0].value = response[4];     // Adiciona o quinto valor do JSON
            document.getElementsByName("cor")[0].value = response[5];      // Adiciona o sexto valor do JSON
        }
    };
    xhr.send();
}

function activeModal(id, tipo) {
    document.getElementById("id01").style.display = "block" // Muda a modal para block, para que possa ser vista

    if (tipo == "Cancelar") { // se o botão passar o tipo Cancelar
        // Monta a modal com os elementos do cancelamento

        document.getElementById("container-modal").innerHTML = `
        <p>Você tem certeza que deseja Cancelar este Agendamento?<p>
        <span onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright">&times;</span>
        <a href = "` + location.origin + `/Pet-shop/backend/processos/proc_cancelAgen.php?id=${id}` + `">Sim</a>
        <button onclick="document.getElementById('id01').style.display='none'">Não</button>`;

    } else { // se o botão não passar o tipo Cancelar
        // Busca os detalhes no servidor

        var xhr = new XMLHttpRequest();
        // Executa o arquivo que irá iniciar a função
        xhr.open("GET", location.origin + `/Pet-shop/backend/execute.php?function=getDesc&id=${id}`, true);

        xhr.onload = function () {
            if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                var response = xhr.responseText; // Pega a resposta do servidor
                // e mostrar na tela

                document.getElementById("container-modal").innerHTML = `
                <h2>Descrição do Agendamento</h2>
                <p>${response}<p>
                <span onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright">&times;</span>`;
            }
        }
        xhr.send();
    }
}

function activeModalApagarConta(id) {
    document.getElementById("id01").style.display = "flex" // Muda a modal para block, para que possa ser vista
    document.getElementById("container-modal").innerHTML = `


    <div class='box-apagar-conta-modal'>

    <h3>Você tem certeza que deseja APAGAR a sua conta?</h3>


    <div class='box-botoes-modal'>

        <a class='sim' href = "` + location.origin + `/Pet-shop/backend/processos/proc_excCliente.php?id=${id}` + `">Sim</a>
        <button class='nao' onclick="document.getElementById('id01').style.display='none'">Não</button> 

    </div>    
    </div>`;
}

function activeModalAlterarSenha(id) {

    document.getElementById("id01").style.display = "flex" // Muda a modal para block, para que possa ser vista
    document.getElementById("container-modal").innerHTML = `

    <form action="` + location.origin + `/Pet-shop/backend/processos/proc_AlterarSenha.php?id=${id}` + `" method="post" class='box-modal'>


        <div class='box-superior-modal'>
            <h3>Altere sua senha</h3>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button   w3-display-topright">&times;</span>
        </div>

        <div class='box-input-modal'>
            <label for="senhaAtual">Senha atual:</label>
            <input pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[^\\w\\s]).{8,}$" type="password" name="senhaAtual" required placeholder='Digite a senha atual:'>
        </div>

        <div class='box-input-modal'>

            <label for="senha">Nova senha:</label>
            <input pattern='^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[^\\w\\s]).{8,}$' type="password" name="senha" required placeholder='Digite a nova senha:'>

        </div>


        <div class='box-input-modal'>

            <label for="confsenha">Confirme a nova senha:</label>

            <input pattern='^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d)(?=.*[^\\w\\s]).{8,}$' type="password" name="confsenha" required placeholder='Confirme a nova senha:'>
        </div>


        <div class='box-botoes-modal'>

            <button id="alt" disabled class='confirmar-modal'>Confirmar</button>
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class='apagar-conta'>Cancelar</button>

        </div>

    </form>`;

    var confsenha = document.getElementsByName('confsenha')[0] // Pega os inputs de acordo com o name
    var senha = document.getElementsByName('senha')[0]

    confsenha.addEventListener('input', conferir) // Aciona a função quando o input tiver uma entrada
    senha.addEventListener('input', conferir)

    function conferir() {
        if (senha.value == confsenha.value && senha.value != '' && confsenha.value != '') {
            // document.getElementById('senhanaoigual').innerHTML = 'SENHAS COINCIDEM';
            document.getElementById('alt').disabled = false; // se as senhas forem diferentes, o botão será desativado
        } else {
            // document.getElementById('senhanaoigual').innerHTML = 'SENHAS NÃO COINCIDEM';
            document.getElementById('alt').disabled = true;
        }
    }
}

function activeModalDetalhesFun(id, tipo) {
    // Muda a modal para block, para que possa ser vista
    document.getElementById("id01").style.display = "flex"
    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-shop/backend/execute.php?function=getDesc&id=${id}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Pega a resposta do servidor
            // Verifica se o funcionário não é um admin ou secretaria
            console.log(tipo);
            if (response == 'Os detalhes não foram adicionados ainda'){

                if (tipo == 'Veterinario' || tipo == 'Esteticista') {
                    // então mostra o campo para adicionar os detalhes
                    document.getElementById("container-modal").innerHTML = `
                    <h2>Descrição do Agendamento</h2>
                    <input name="ide" hidden value="${id}"></input>
                    <textarea cols="30" rows="10" name="descricao"></textarea>
                    <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-display-topright">&times;</span>
                    <input type='submit' value='Salvar'></input>`;

                } else {
                    // Se não só mostra que os detalhes não foram definidos.
                    document.getElementById("container-modal").innerHTML = `
                    <h2>Descrição do Agendamento</h2>
                    <p>Os detalhes não foram adicionados ainda</p>
                    <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-display-topright">&times;</span>`;

                }
            } else {
                // Se não só mostra que os detalhes não foram definidos.
                document.getElementById("container-modal").innerHTML = `
                
                <div class='box-modal-detalhes'>
                    <h2>Descrição do Agendamento</h2>
                    <p>${response}</p>
                    <span onclick="document.getElementById('id01').style.display='none'">&times;</span>
                </div>`;
            }
        }
    }
    xhr.send();
}

function meuPerfilCliPes() {
    // ativa os campos para que possam ser mudados
    document.getElementsByName("nome")[0].removeAttribute("readonly")
    document.getElementsByName("sobrenome")[0].removeAttribute("readonly")
    document.getElementsByName("celular")[0].removeAttribute("readonly")
    document.getElementsByName("email")[0].removeAttribute("readonly")
    // Ativa o botão de confirmação
    document.getElementsByName("conf")[0].removeAttribute("hidden")
}

function meuPerfilCliEnd() {
    // ativa os campos para que possam ser mudados
    document.getElementsByName("cep")[0].removeAttribute("readonly")
    document.getElementsByName("num")[0].removeAttribute("readonly")
    document.getElementsByName("comp")[0].removeAttribute("readonly")
    // Ativa o botão de confirmação
    document.getElementsByName("conf")[1].removeAttribute("hidden")
}

function altMeuPerfilCli() {
    var idCli = document.getElementsByName("idCliente")[0].value
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-shop/backend/execute.php?function=altMeuPerfilCli&idCli=${idCli}`, true);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor
            // Preenche os campos com os devidos valores.
            document.getElementsByName("cpf")[0].value = response[0];
            document.getElementsByName("nome")[0].value = response[1];
            document.getElementsByName("sobrenome")[0].value = response[2];
            document.getElementsByName("celular")[0].value = response[3];
            document.getElementsByName("cep")[0].value = response[4];
            document.getElementsByName("log")[0].value = response[5];
            document.getElementsByName("num")[0].value = response[6];
            document.getElementsByName("comp")[0].value = response[7];
            document.getElementsByName("bairro")[0].value = response[8];
            document.getElementsByName("cid")[0].value = response[9];
            document.getElementsByName("uf")[0].value = response[10];
            document.getElementsByName("email")[0].value = response[11];
        }
    };
    xhr.send();
}
