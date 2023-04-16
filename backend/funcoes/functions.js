function executeFunctions(func) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=${func}`, true);
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

function checkAnimais() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=checkAnimais`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=checkAnimais`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            document.getElementById("animais").innerHTML = response;
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

function gerarTabelaFazAgenCli() {
    var xhr = new XMLHttpRequest();
    var tipo = document.getElementById('tipoAgen').value
    var data = document.getElementById('dataAgen').value
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=gerarTabelaFazAgenCli&tipo=${tipo}&data=${data}`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=gerarTabelaFazAgenCli&tipo=${tipo}&data=${data}`, true);
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
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + 
    `/Pet-Shop/backend/execute.php?function=fazAgendamentoCli&idAgen=${idAgen}&idAni=${idAnimal}`, true);
    // xhr.open("GET", location.origin + 
    // `/backend/execute.php?function=fazAgendamentoCli&idAgen=${idAgen}&idAni=${idAnimal}`, true);

    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            location.href = response; // Log the response to the console
        }
    };
    xhr.send();
}
