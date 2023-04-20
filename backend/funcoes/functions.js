function executeFunctions(func, idAgen) {
    // Define as variaveis necessárias no caso da função for acionada pelo botão de agendar
    extra = ""
    if (idAgen != 0) {
        // Pega o id do animal
        var idAnimal = document.getElementById('animais').value
        // Passa o id do agendamento e do animal para adicionar na url
        extra = `&idAgen=${idAgen}&idAni=${idAnimal}`
    }

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    xhr.onload = function() {
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
        
    } else if (tipo == 'gerarTabelaAgenFun'){ // Puxar os agendamentos para o funcionário
        var pesq = document.getElementById('pesq').value;
        var filtro = document.getElementById('status').value;
        var extra = `&pesq=${pesq}&status=${filtro}`;
        
    } else if (tipo == 'gerarTabelaDeleteFun'){ // Listar funcionário
        var pesq = document.getElementById('pesq').value;
        var filtro = document.getElementById('situacoes').value;
        var extra = `&pesq=${pesq}&situ=${filtro}`;
    } else if (tipo == 'animais'){
        var cpf = document.getElementById('cpf');
        var extra = `&cpf=${cpf}`;
    }
    
    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${tipo}${extra}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${tipo}${extra}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); // Pega a resposta do servidor e passa para JSON
            document.getElementById(response[0]).innerHTML = response[1]; 
            // Seleciona o elemento de acordo com o primeiro valor do JSON
            // e coloca o segundo valor dentro deste elemento
        }
    };
    xhr.send();
}

function altAnimal() {
    var idAni = document.getElementsByName("idAnimal")[0].value // Pega o id do animal

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=altAnimal&idAni=${idAni}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=altAnimal&idAni=${idAni}`, true);
    xhr.onload = function() {
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
    document.getElementById("id01").style.display="block" // Muda a modal para block, para que possa ser vista

    if (tipo == "Cancelar") { // se o botão passar o tipo Cancelar
        // Monta a modal com os elementos do cancelamento
        document.getElementById("container-modal").innerHTML = `
        <p>Você tem certeza que deseja Cancelar este Agendamento?<p>
        <span onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright">&times;</span>
        ${
        `<a href = "` + location.origin + `/Pet-Shop/backend/processos/proc_cancelAgen.php?id=${id}` + `">Sim</a>`
        // `<a href = "` + location.origin + `/Pet-Shop/backend/processos/proc_cancelAgen.php?id=${id}` + `">Sim</a>`
        }
        <button onclick="document.getElementById('id01').style.display='none'">Não</button>`;
    } else { // se o botão não passar o tipo Cancelar
        // Busca os detalhes no servidor
        var xhr = new XMLHttpRequest();
        // Executa o arquivo que irá iniciar a função
        xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=getDesc&id=${id}`, true);
        // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=getDesc&id=${id}`, true);
        xhr.onload = function() {
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


function apagarFun(func, id) {

    extra = `&id=${id}`;


    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            location.href = response; // Log the response to the console
        }
    };
    xhr.send();
}

function activeModalDetalhesFun(id, tipo) {
    document.getElementById("id01").style.display="block"
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=getDesc&id=${id}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=getDesc&id=${id}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == '' && tipo != 'admin'){
                document.getElementById("container-modal").innerHTML = `
                <h2>Descrição do Agendamento</h2>
                <input name="ide" hidden value="${id}"></input>
                <textarea cols="30" rows="10" name="descricao"></textarea>
                <span onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright">&times;</span>
                <input type='submit' value='Salvar'></input>`;

            } else {
                document.getElementById("container-modal").innerHTML = `
                <h2>Descrição do Agendamento</h2>
                <p>Detalhes não definido</p>
                <span onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright">&times;</span>`;
            }
        }
    }
    xhr.send();
}

function finalizarConsulta(func, id) {

    extra = `&id=${id}`;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            location.href = response; // Log the response to the console
        }
    };
    xhr.send();
}

function inserirDetalhes(func, id) {

    extra = `&id=${id}`;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            location.href = response; // Log the response to the console
        }
    };
    xhr.send();
}

function activeModalDetalhesFun(id, cliente, animal) {
    document.getElementById("id01").style.display="block"
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=getDesc&id=${id}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=getDesc&id=${id}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == ''){
                document.getElementById("container-modal").innerHTML = `
                <h2>Descrição do Agendamento</h2>
                <h3>Cliente - ${cliente}, Animal - ${animal}</h3>
                <textarea cols="30" rows="10"></textarea>
                <span onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright">&times;</span>`;

            }
        }
    }
    xhr.send();
}

function finalizarConsulta(func, id) {

    extra = `&id=${id}`;


    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            location.href = response; // Log the response to the console
        }
    };
    xhr.send();
}

function meuPerfilCli() {
    document.getElementsByName("nome")[0].removeAttribute("readonly")
    document.getElementsByName("sobrenome")[0].removeAttribute("readonly")
    document.getElementsByName("celular")[0].removeAttribute("readonly")
    document.getElementsByName("cep")[0].removeAttribute("readonly")
    document.getElementsByName("num")[0].removeAttribute("readonly")
    document.getElementsByName("comp")[0].removeAttribute("readonly")
    document.getElementsByName("email")[0].removeAttribute("readonly")
    document.getElementsByName("conf")[0].removeAttribute("hidden")
}

function altMeuPerfilCli() {
    var idCli = document.getElementsByName("idCliente")[0].value
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=altMeuPerfilCli&idCli=${idCli}`, true);
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=altMeuPerfilCli&idCli=${idCli}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); // Get the response from the server
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
