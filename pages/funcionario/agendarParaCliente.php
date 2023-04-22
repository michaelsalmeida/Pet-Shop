<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexao
require_once $funcoesRoute;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <label for="cpf">CPF DO CLIENTE: </label>
    <input type="text" id="cpf" name="cpf" pattern="[0-9]{11}" placeholder="Digite o CPF do cliente" required>
    <button onclick="queryBanco('animais')">Verificar</button>


    <select name="animais" id="animais" required>
        <option value="" disabled selected hidden>Selecione um tipo de serviço</option>
    </select>

</body>

</html>
