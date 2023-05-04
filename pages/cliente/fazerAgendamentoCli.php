<?php
include_once("../../rotas.php");
include_once($connRoute);
require_once $funcoesRoute;

if (!loged()) { // Verifica se há um usuário logado
    $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
    // Se não tiver manda ele para a página de login
    header("Location: " . $loginCliRoute);
}
if (isset($_SESSION['tipo'])) {
    // Se o usuário logado for um funcionário, ele é levado para a pág de agendamento
    header("Location: " . $agendamentoFunRoute);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais</title>


    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/table.css">
    <link rel="stylesheet" href="../css-dinamico/agendamentoCliente.css">
    <script src="<?php echo $functionsRoute; ?>"></script>
</head>

<body onload="queryBanco('checkAnimais'), activateToast(<?php echo verificarSession(['msgFazAgendamento']); ?>)">
    <?php
    if (isset($_GET['pagina'])) {
        echo "<p id='pag' hidden>" . $_GET['pagina'] . "</p>";
    } else {
        echo "<p id='pag' hidden>1</p>";
    }
    ?>
    <header>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="responsive">

            <img onmousedown="fechaMenu()" src="../img-estatico/fechar.png" class="fechaMenu" alt="fecha">
            <div class="links">
                <a href="<?php echo $homeRoute; ?>">HOME</a>
                <a href="<?php echo $blogRoute; ?>">BLOG</a>
                <a href="<?php echo $sobreRoute; ?>">SOBRE</a>
                <a href="<?php echo $contatoRoute; ?>">CONTATO</a>

            </div>

            <div class="acesso">
                <?php
                if (loged()) {
                    // Esses botões só aparecem quando o usuário estive logado
                    echo "
                    <a href='$fazAgendamentoCliRoute'>Fazer Agendamento</a>
                    <a href='$cadAnimaisCliRoute'>Cadastrar Animais</a>
                    ";
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



        <div class="perfilHambur">

            <?php
            if (loged()) {
                // Esses botões só aparecem quando o usuário estive logado
                echo "  <div class='perfil' onmousedown='menuPerfil()'>
                    <img src='../img-estatico/account_circle.svg'>
                    <p>></p>
                    </div>
                    
                    
                    <div class='menu-perfil'>
                    <p>Bem Vindo! " . $_SESSION['nomeCliente'] . "</p>
                    <a href='$meuPerfilCliRoute'><img src='../img-estatico/account_circle.svg'> Meu Perfil</a>
                    <a href='$animaisCliRoute'>Meus Animais</a>
                    <a href='$agendamentoCliRoute'>Meus Agendamentos</a>
                    <button onclick='executeFunctions(" . '"logoff" , ""' . ")'>Sair</button>
                    </div>";
            }
            ?>

            <img onmousedown="abreMenu()" src="../img-estatico/menu.png" class="menu" alt="menu">
        </div>
    </header>

    <?php
    if (isset($_SESSION['msgFazAgendamento'])) { // Verifica se há uma mensagem para mostrar
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
                <select name="tipoAgen" id="tipoAgen" onchange="paginacao('gerarTabelaFazAgenCli')">
                    <option value="" disabled selected hidden>Selecione o tipo de Agendamento</option>
                    <option value="Banho">Banho</option>
                    <option value="Tosa">Tosa</option>
                    <option value="Veterinário">Veterinário</option>
                    <option value="Banho e Tosa">Banho e Tosa</option>
                </select><br><br>
            </div>
        </fieldset>

        <fieldset class="field2">
            <div>
                <label for="dataAgen">Data de Agendamento</label><br>
                <input type="date" id="dataAgen" onchange="paginacao('gerarTabelaFazAgenCli')"><br><br>
            </div>

            <div>
                <button class="limpar" type="reset">Limpar</button>
            </div>
        </fieldset>

    </form>

    <div class="container box-total">
        <table id="fazAgend"></table>
        <div id="links"></div>
    </div>

    <script src="../script.js"></script>
    <script src="<?php echo $functionsRoute; ?>"></script>
    <script src="../../backend/funcoes/toast.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>