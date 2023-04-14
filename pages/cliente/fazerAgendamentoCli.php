<?php
include_once("../../rotas.php");
include_once($connRoute);
require_once $funcoesRoute;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais</title>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        text-align: center;
    }

    tr:nth-child(odd) {
        background-color: #dddddd;
    }
    </style>
    <script src="<?php echo $functionsRoute; ?>"></script>
</head>

<body onload="checkAnimais()">
    <?php

    if (isset($_SESSION['tipo'])){
        header("Location: " . $agendamentoFunRoute);
    }
    
    if (!loged()) {
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgFazAgendamento'])) {
        echo $_SESSION['msgFazAgendamento'];
        unset($_SESSION['msgFazAgendamento']);
    }
    ?>

    <form>
        <label for="animais">Animal a ser tratado: </label><br>
        <select name="animais" id="animais"></select><br><br>

        <label for="nome">Tipo de Agendamento</label><br>
        <select name="tipoAgen" id="tipoAgen" onchange="gerarTabelaFazAgenCli()">
            <option value="" disabled selected hidden>Selecione o tipo de Agendamento</option>
            <option value="Banho">Banho</option>
            <option value="Tosa">Tosa</option>
            <option value="Veterinário">Veterinário</option>
        </select><br><br>

        <label for="dataAgen">Data de Agendamento</label><br>
        <input type="date" id="dataAgen" onchange="gerarTabelaFazAgenCli()"><br><br>

        <table id="fazAgend"></table>
    </form>

    <button onclick="executeFunctions('logoff')">Logoff</button>
</body>

</html>