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
    <title>Agendamentos</title>
    <script src="<?php echo $functionsRoute; ?>"></script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            text-align: center;
        }

        tr:nth-child(odd) {
            background-color: #dddddd;
        }
    </style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body onload="queryBanco('gerarTabelaAgenCli')">
    <?php

    if (isset($_SESSION['tipo'])) {
        header("Location: " . $agendamentoFunRoute);
    }

    if (!loged()) {
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgAgendamentoCli'])) {
        echo "<p>" . $_SESSION['msgAgendamentoCli'] . "<?p>";
        unset($_SESSION['msgAgendamentoCli']);
    }
    ?>

    <table id="agendamentos">
    </table>

    <!-- The Modal -->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-display-topright">&times;</span>
                <p id="tipo"></p>
                <a id="conf">Sim</a>
                <button onclick="document.getElementById('id01').style.display='none'">Não</button>
            </div>
        </div>
    </div>

    <a href="<?php echo $fazAgendamentoCliRoute; ?>">Fazer Agendamento</a>
    <button onclick="executeFunctions('logoff', '')">Logoff</button>
</body>

</html>