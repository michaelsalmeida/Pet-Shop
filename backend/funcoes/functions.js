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

function gerarTabelaAgen() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", location.origin + `/Pet-Shop/backend/execute.php?function=gerarTabelaAgen`, true);
    // xhr.open("GET", location.origin + `/backend/execute.php?function=gerarTabelaAgen`, true);
    xhr.onload = function() {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Get the response from the server
            document.getElementById("agendamentos").innerHTML = response;
        }
    };
    xhr.send();
}
