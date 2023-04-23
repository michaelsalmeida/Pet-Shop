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

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/table.css">
</head>

<body onload="queryBanco('gerarTabelaAgenCli')">
    <?php
    if (isset($_SESSION['tipo'])) { // Verifica se o usuário logado é um funcionário
        header("Location: " . $agendamentoFunRoute);
    }

    if (!loged()) { // Verifica se há um usuário logado
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        // Se não tiver manda ele para a página de login
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgAgendamentoCli'])) { // Verifica se há uma mensagem para mostrar
        echo "<p>" . $_SESSION['msgAgendamentoCli'] . "<?p>";
        unset($_SESSION['msgAgendamentoCli']);
    }
    ?>


    <header>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="responsive">
            <img src="../img-estatico/fechar.png" class="fechaMenu" alt="fecha">
            <div class="links">
                <a href="<?php echo $blogRoute; ?>">BLOG</a>
                <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
                <a href="<?php echo $contatoRoute; ?>">CONTATO</a>
            </div>

            <div class="acesso">
                <?php
                if (loged()) {
                    if (isset($_SESSION['tipo'])) {
                        // Se o usuário logado for um funcionário, ele é levado para a pág de agendamento
                        header("Location: " . $agendamentoFunRoute);
                    } else {
                        // Esses botões só aparecem quando o usuário estive logado
                        echo "
                        <a href='$fazAgendamentoCliRoute'>Fazer Agendamento</a>
                        <a href='$cadAnimaisCliRoute'>Cadastrar Animais</a>
                        <a href='$meuPerfilCliRoute'>Meu Perfil</a>
                        <a href='$animaisCliRoute'>Meus Animais</a>
                        <a href='$agendamentoCliRoute'>Meus Agendamentos</a>
                        <button onclick='executeFunctions(" . '"logoff" , ""' . ")'>Sair</button>";
                    }
                } else {
                    // Esses botões aparecem se o usuário não estiver logado
                    echo "<a href='$loginCliRoute'><img src='pages/img-estatico/login.svg' alt=''> Login</a>";
                    echo "<a href='$cadastroCliRoute'>Cadastro</a>";
                }
                // if (isset($_SESSION['msgRotaProibidaCli'])){
                //   echo $_SESSION['msgRotaProibidaCli'];
                //   unset($_SESSION['msgRotaProibidaCli']);
                // }

                ?>
            </div>
        </div>

        <img src="../img-estatico/menu.png" class="menu" alt="menu">
    </header>

    <div class="container box-total">

        <h1>Veja suas consultas cadastradas na plataforma!</h1>

        <table id="agendamentos">
        </table>

    </div>


    <!-- The Modal -->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container" id="container-modal">
            </div>
        </div>
    </div>
    <script src="../script.js"></script>
</body>

</html>