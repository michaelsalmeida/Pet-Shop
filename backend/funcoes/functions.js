function executeFunctions(func) {
    var xhr = new XMLHttpRequest();
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}`, true);
    xhr.open("GET", location.origin + `/backend/execute.php?function=${func}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            location.href = response; // Log the response to the console
        }
    };
    xhr.send();
}

function gerarTabelaAni() {
    var xhr = new XMLHttpRequest();
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=gerarTabelaAni`, true);
    xhr.open("GET", location.origin + `/backend/execute.php?function=gerarTabelaAni`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            document.getElementById("animais").innerHTML = response;
        }
    };
    xhr.send();
}

function gerarTabelaAgenFun() {
    var xhr = new XMLHttpRequest();
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=gerarTabelaAgenFun`, true);
    xhr.open("GET", location.origin + `/backend/execute.php?function=gerarTabelaAgenFun`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            document.getElementById("tabela").innerHTML = response;
        }
    };
    xhr.send();
}

function gerarTabelaAgenCli() {
    var xhr = new XMLHttpRequest();
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=gerarTabelaAgenCli`, true);
    xhr.open("GET", location.origin + `/backend/execute.php?function=gerarTabelaAgenCli`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            document.getElementById("agendamentos").innerHTML = response;
        }
    };
    xhr.send();
}

function checkAnimais() {
    var xhr = new XMLHttpRequest();
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=checkAnimais`, true);
    xhr.open("GET", location.origin + `/backend/execute.php?function=checkAnimais`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            document.getElementById("animais").innerHTML = response;
        }
    };
    xhr.send();
}

function gerarTabelaFazAgenCli() {
    var xhr = new XMLHttpRequest();
    var tipo = document.getElementById('tipoAgen').value
    var data = document.getElementById('dataAgen').value
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=gerarTabelaFazAgenCli&tipo=${tipo}&data=${data}`, true);
    xhr.open("GET", location.origin + `/backend/execute.php?function=gerarTabelaFazAgenCli&tipo=${tipo}&data=${data}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            document.getElementById("fazAgend").innerHTML = response;
        }
    };
    xhr.send();
}

function fazAgendamentoCli(idAgen) {
    var idAnimal = document.getElementById('animais').value
    console.log(idAnimal)
    var xhr = new XMLHttpRequest();
    // xhr.open("GET", location.origin + 
    // `/Pet-Shop/backend/execute.php?function=fazAgendamentoCli&idAgen=${idAgen}$idAni=${idAnimal}`, true);
    xhr.open("GET", location.origin + 
    `/backend/execute.php?function=fazAgendamentoCli&idAgen=${idAgen}&idAni=${idAnimal}`, true);

    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            location.href = response; // Log the response to the console
        }
    };
    xhr.send();
}

function gerarAgendamentoFun() {
    var xhr = new XMLHttpRequest();
    var servico = document.getElementById('servicos').value;
    // xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=cadastrarAgendamentos&servico=${servico}`, true);
    xhr.open("GET", location.origin + `/backend/execute.php?function=cadastrarAgendamentos&servico=${servico}`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            document.getElementById("profissionais").innerHTML = response;
        }
    };
    xhr.send();
}
