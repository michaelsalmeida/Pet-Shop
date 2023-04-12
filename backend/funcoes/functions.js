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

function gerarTabelaAni() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=gerarTabelaAni`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=gerarTabelaAni`, true);
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
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=gerarTabelaAgenFun`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=gerarTabelaAgenFun`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            document.getElementById("tabela").innerHTML = response;
        }
    };
    xhr.send();
}
