function executeFunctions(func) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", `../../backend/execute.php?function=${func}`, true);
    xhr.send();
}