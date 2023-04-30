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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../css-estatico/header.css">
  <link rel="stylesheet" href="../css-dinamico/animais-cliente.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css-dinamico/table.css">



  <script src="<?php echo $functionsRoute; ?>"></script>

</head>

<body onload="paginacao('gerarTabelaAni'), activateToast(<?php echo verificarSession(['msgAltAnimaisCli', 'msgExcAnimal']); ?>)">


  <?php

  if (isset($_SESSION['tipo'])) { // Verifica se o usuário logado é um funcionário
    header("Location: " . $agendamentoFunRoute);
  }
  if (!loged()) { // Verifica se há um usuário logado
    $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
    // Se não tiver manda ele para a página de login
    header("Location: " . $loginCliRoute);
  }

  if (isset($_SESSION['msgAltAnimaisCli'])) { // Verifica se há uma mensagem para mostrar
    unset($_SESSION['msgAltAnimaisCli']);
} 
  if (isset($_SESSION['msgExcAnimal'])) { // Verifica se há uma mensagem para mostrar
    unset($_SESSION['msgExcAnimal']);
  }


  if (isset($_GET['pagina'])) {
    echo "<p id='pag' hidden>".$_GET['pagina']."</p>";
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
                        ";
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



        <div class="perfilHambur">

            <?php
            if (loged()) {
                if (isset($_SESSION['tipo'])) {
                    // Se o usuário logado for um funcionário, ele é levado para a pág de agendamento
                    header("Location: " . $agendamentoFunRoute);
                } else {
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
            }
            ?>

            <img onmousedown="abreMenu()" src="../img-estatico/menu.png" class="menu" alt="menu">
        </div>
  </header>



  <div class="container box-total">
    <h1>Veja seus animais cadastrados na plataforma</h1>

    <table id="animais"></table>
    <div id="links"></div>
  </div>

  <script src="../script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="<?php echo $functionsRoute; ?>"></script>
  <script src="../../backend/funcoes/toast.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>