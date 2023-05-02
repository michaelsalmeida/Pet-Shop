<?php
include_once("../../rotas.php");
include_once($connRoute);
require_once $funcoesRoute;

if (isset($_SESSION['tipo'])) { // Verifica se o usuário logado é um funcionário
    header("Location: " . $agendamentoFunRoute);
}
if (!loged()) { // Verifica se há um usuário logado
    $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
    // Se não tiver manda ele para a página de login
    header("Location: " . $loginCliRoute);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animais</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">


    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/cadAnimais.css">
</head>

<body onload="altAnimal()">

    <header>
        <a href="<?php echo $homeRoute; ?>" class="logo">
            <img src="../img-estatico/logo.svg" alt="">
        </a>

        <div class="responsive">

            <img onmousedown="fechaMenu()" src="../img-estatico/fechar.png" class="fechaMenu" alt="fecha">
            <div class="links">
                <a href="<?php echo $blogRoute; ?>">BLOG</a>
                <a href="<?php echo $sobreRoute; ?>">SOBRE NÓS</a>
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
                    <p>Bem Vindo! ".$_SESSION['nomeCliente']."</p>
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
    if (isset($_SESSION['msgAltAnimaisCli'])) { // Verifica se há uma mensagem para mostrar
        unset($_SESSION['msgAltAnimaisCli']);
    }
    ?>

    <form action="<?php echo $proc_altAnimalCliRoute; ?>" method="post">
        <img class="iconCachorro" src="../img-estatico/altAnimal.svg" alt="">

        <h1>EDITE AS INFORMAÇÕES DO SEU PET!</h1>

        <input type="hidden" name="idAnimal" value="<?php echo $_GET['id']; ?>">

        <fieldset>
            <div>
                <label for="nome">Nome</label><br>
                <input type="text" name="nome"><br><br>

            </div>

            <div>
                <label for="dataNasc">Data de Nascimento </label><br>
                <input type="date" name="dataNasc"><br><br>

            </div>

            <div>

                <label for="espec">Espécie</label><br>
                <input type="text" name="espec"><br><br>
            </div>

            <div>

                <label for="raca">Raça</label><br>
                <input type="text" name="raca"><br><br>
            </div>

            <div>

                <label for="peso">Peso (Kg)</label><br>
                <input type="number" name="peso" step=0.01 pattern="[0-9]*"><br><br>
            </div>

            <div>

                <label for="cor">Cor</label><br>
                <input type="text" name="cor"><br><br>
            </div>
        </fieldset>

        <button type="submit" value="Alterar">Alterar</button>
        <a href="<?php echo $homeRoute; ?>">Voltar</a>

    </form>

    <script src="../script.js"></script>
    <script src="<?php echo $dataHojeRoute; ?>"></script>
    <script src="<?php echo $functionsRoute; ?>"></script>
</body>

</html>