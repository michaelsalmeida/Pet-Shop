function executeFunctions(func, idAgen) {

    extra = ""
    if (idAgen != 0) {
        var idAnimal = document.getElementById('animais').value
        extra = `&idAgen=${idAgen}&idAni=${idAnimal}`
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=${func}${extra}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            location.href = response; // Log the response to the console
        }
    };
    xhr.send();
}

function queryBanco(tipo) {
    var xhr = new XMLHttpRequest();

    extra = "";
    if (tipo == 'profissionais') {
        var servico = document.getElementById('servicos').value;
        extra = `&servico=${servico}`;
    } else if (tipo == 'gerarTabelaFazAgenCli') {
        var tipoAgen = document.getElementById('tipoAgen').value
        var data = document.getElementById('dataAgen').value
        var extra = `&tipo=${tipoAgen}&data=${data}`;
    } else if (tipo == 'gerarTabelaAgenFun'){
        var pesq = document.getElementById('pesq').value;
        var extra = `&pesq=${pesq}`;
    } else if (tipo == 'gerarTabelaDeleteFun'){
        var pesq = document.getElementById('pesq').value;
        var extra = `&pesq=${pesq}`;
    }

    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${tipo}${extra}`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=${tipo}${extra}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); // Get the response from the server
            document.getElementById(response[0]).innerHTML = response[1];
        }
    };
    xhr.send();
}

function altAnimal() {
    var idAni = document.getElementsByName("idAnimal")[0].value
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=altAnimal&idAni=${idAni}`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=altAnimal&idAni=${idAni}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText); // Get the response from the server
            document.getElementsByName("nome")[0].value = response[0];
            document.getElementsByName("dataNasc")[0].value = response[1];
            document.getElementsByName("espec")[0].value = response[2];
            document.getElementsByName("raca")[0].value = response[3];
            document.getElementsByName("peso")[0].value = response[4];
            document.getElementsByName("cor")[0].value = response[5];
        }
    };
    xhr.send();
}

function activeModal(id, tipo) {
    document.getElementById("id01").style.display="block"
    if (tipo == "Cancelar") {
        document.getElementById("container-modal").innerHTML = `
        <p>Você tem certeza que deseja Cancelar este Agendamento?<p>
        <span onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright">&times;</span>
        ${
        `<a href = "` + location.origin + `/Pet-Shop/backend/processos/proc_cancelAgen.php?id=${id}` + `">Sim</a>`
        // `<a href = "` + location.origin + `/backend/processos/proc_cancelAgen.php?id=${id}` + `">Sim</a>`
        }
        <button onclick="document.getElementById('id01').style.display='none'">Não</button>`;
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=getDesc&id=${id}`, true);
        // xhr.open("GET", location.origin + `/backend/execute.php?function=getDesc&id=${id}`, true);
        xhr.onload = function() {
            if (xhr.readyState === xhr.DONE && xhr.status === 200) {
                var response = xhr.responseText;
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


function apagarFun(func, name) {

    extra = `&nome=${name}`;


    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}${extra}`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=${func}${extra}`, true);
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
    // xhr.open("GET", location.origin + `/backend/execute.php?function=getDesc&id=${id}`, true);
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
    // xhr.open("GET", location.origin + `/backend/execute.php?function=${func}${extra}`, true);
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
    // xhr.open("GET", location.origin + `/backend/execute.php?function=getDesc&id=${id}`, true);
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
    // xhr.open("GET", location.origin + `/backend/execute.php?function=${func}${extra}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            location.href = response; // Log the response to the console
        }
    };
    xhr.send();
}

function meuPerfil() {
    document.getElementsByName("nome")[0].removeAttribute("readonly")
    document.getElementsByName("sobrenome")[0].removeAttribute("readonly")
    document.getElementsByName("celular")[0].removeAttribute("readonly")
    document.getElementsByName("cep")[0].removeAttribute("readonly")
    document.getElementsByName("num")[0].removeAttribute("readonly")
    document.getElementsByName("comp")[0].removeAttribute("readonly")
    document.getElementsByName("email")[0].removeAttribute("readonly")
    document.getElementsByName("conf")[0].removeAttribute("hidden")
}

function altMeuPerfil() {
    var idCli = document.getElementsByName("idCliente")[0].value
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=altMeuPerfil&idCli=${idCli}`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=altMeuPerfil&idCli=${idCli}`, true);
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
