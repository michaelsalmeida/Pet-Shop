function executeFunctions(func, idAgen) {

    extra = ""
    if (idAgen != "") {
        var idAnimal = document.getElementById('animais').value
        extra = `&idAgen=${idAgen}&idAni=${idAnimal}`
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=${func}`, true);
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
