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


    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/agendamentoCliente.css">

    <script src="<?php echo $functionsRoute; ?>"></script>
</head>

<body onload="queryBanco('checkAnimais')">
    <header>
        <a href="../../index.php" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="responsive">
            <img src="pages/img-estatico/fechar.png" class="fechaMenu" alt="fecha">
            <div class="links">
                <a href="<?php echo $blogRoute; ?>">BLOG</a>
                <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
                <a href="<?php echo $contatoRoute; ?>">CONTATO</a>
            </div>

            <div class="acesso">
                <button onclick="executeFunctions('logoff', '')">Sair</button>
            </div>
        </div>

        <img src="../img-estatico/menu.png" class="menu" alt="menu">
    </header>

    <?php

    if (isset($_SESSION['tipo'])) { // Verifica se o usuário logado é um funcionário
        header("Location: " . $agendamentoFunRoute);
    }
    if (!loged()) { // Verifica se há um usuário logado
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        // Se não tiver manda ele para a página de login
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgFazAgendamento'])) { // Verifica se há uma mensagem para mostrar
        echo $_SESSION['msgFazAgendamento'];
        unset($_SESSION['msgFazAgendamento']);
    }
    ?>

    <form>
        <img class="iconAgenda" src="../img-estatico/iconAgenda.svg" alt="">

        <h1>FAÇA O AGENDAMENTO DA CONSULTA DO SEU PET!</h1>

        <fieldset class="field1">
            <div>
                <label for="animais">Animal a ser tratado: </label><br>
                <select name="animais" id="animais" required></select><br><br>
            </div>

            <div>
                <label for="nome">Tipo de Agendamento</label><br>
                <select name="tipoAgen" id="tipoAgen" onchange="queryBanco('gerarTabelaFazAgenCli')">
                    <option value="" disabled selected hidden>Selecione o tipo de Agendamento</option>
                    <option value="Banho">Banho</option>
                    <option value="Tosa">Tosa</option>
                    <option value="Veterinário">Veterinário</option>
                </select><br><br>
            </div>
        </fieldset>

        <fieldset class="field2">
            <div>
                <label for="dataAgen">Data de Agendamento</label><br>
                <input type="date" id="dataAgen" onchange="queryBanco('gerarTabelaFazAgenCli')"><br><br>
            </div>

            <div>
                <button class="btnReset" type="reset">
                    <img src="../img-estatico/lixo.svg" alt="">
                </button>
            </div>
        </fieldset>

        <table id="fazAgend"></table>
    </form>

    <footer>
        <a href="#" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="links">
            <a href="<?php echo $blogRoute; ?>">BLOG</a>
            <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
            <a href="<?php echo $contatoRoute; ?>">CONTATO</a>
        </div>

        <div class="redes">
            <img src="../img-estatico/facebook.svg" alt="">
            <img src="../img-estatico/youtube.svg" alt="">
            <img src="../img-estatico/twitter.svg" alt="">
            <img src="../img-estatico/github.svg" alt="">
        </div>

        <p>© Hamtaro Petshop todos direitos reservados</p>
    </footer>

    <script src="../script.js"></script>
</body>

</html>
