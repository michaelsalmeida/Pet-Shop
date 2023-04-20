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
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">
    <script src="<?php echo $functionsRoute; ?>"></script>

    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/cadAnimais.css">
</head>

<body>
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

    if (isset($_SESSION['tipo'])){ // Verifica se o usuário logado é um funcionário
        header("Location: " . $agendamentoFunRoute);
    }
    if (!loged()) { // Verifica se há um usuário logado
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        // Se não tiver manda ele para a página de login
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgCadAnimaisCli'])) { // Verifica se há uma mensagem para mostrar
        echo $_SESSION['msgCadAnimaisCli'];
        unset($_SESSION['msgCadAnimaisCli']);
    }
    ?>
    <form action="<?php echo $proc_cadAnimalRoute; ?>" method="post">
        <h1>CADASTRO DE ANIMAIS</h1>

        <label for="nome">Nome</label><br>
        <input type="text" name="nome">

        <label for="dataNasc">Data de Nascimento </label><br>
        <input type="date" name="dataNasc">

        <label for="espec">Espécie</label><br>
        <input type="text" name="espec">

        <label for="raca">Raça</label><br>
        <input type="text" name="raca">

        <label for="peso">Peso (Kg)</label><br>
        <input type="number" name="peso" step=0.01 pattern="[0-9]*">

        <label for="cor">Cor</label><br>
        <input type="text" name="cor">

        <input type="submit" value="Cadastrar">
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

    <script src="<?php echo $dataHojeRoute; ?>"></script>
    <script src="../script.js"></script>
</body>

</html>