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
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">


  <script src="<?php echo $functionsRoute; ?>"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css-dinamico/table.css">
  <link rel="stylesheet" href="../css-dinamico/header-corporativo.css">
  <link rel="stylesheet" href="../css-dinamico/pagina-inicial-corporativo.css">

</head>

<body onload="queryBanco('gerarTabelaAgenFun')">

  <header class="header-corporativo">
    <div class="box-logo-barra-de-pesquisa-perfil">

      <a href="<?php echo $homeRoute; ?>"><img src="../img-dinamico/logo-corporativo.svg" alt="logo hamtaro petshop corporativo"></a>

      <div class="box-pesquisar">
        <input type="text" placeholder="Pesquise por um Funcionário" id="pesq">
        <button onclick="queryBanco('gerarTabelaAgenFun')"><i class="bi bi-search"></i></button>
      </div>

      <!-- <div class="perfil-corpotativo" onclick="menuPerfil()">
        <i class="bi bi-person-square"></i>
        <p>></p>
      </div> -->

      <div class='perfil-corpotativo' onmousedown='menuPerfil()'>
        <img src='../img-estatico/account_circle.svg'>
        <p>></p>
      </div>

      <img src="../img-estatico/menu.png" class="menu" alt="menu">

    </div>

    <nav class="responsive menu-perfil">


      <img src="../img-estatico/fechar.png" class="fechaMenu" alt="fecha">

      <?php
      if (!loged()) {
        $_SESSION['msgloginFun'] = "Por favor, faça o login primeiro.";
        header("Location: " . $loginFunRoute);
      }

      if (!isset($_SESSION['tipo'])) {
        // $_SESSION['msgRotaProibidaCli'] = "Você Não possui permissão para entrar nessa página";
        header("Location: " . $homeRoute);
      }

      if ($_SESSION['tipo'] == 'Secretaria') {
        echo "<a href=" . $cadastradaDatasRoute . ">Cadastrar horário</a>";
        echo "<a href=" . $cadastroCliRoute . ">Cadastrar Cliente</a>";
        echo "<a href=" . $agendarParaClienteRoute . ">Agendar consulta</a>";
        echo "<a href=" . $cadAnimalParaClienteRoute . ">Cadastrar animal</a>";
      } elseif ($_SESSION['tipo'] == 'admin') {
        echo "<a href=" . $cadastrarFunRoute . ">Cadastrar funcionário</a>";
        echo "<a href=" . $cadastradaDatasRoute . ">Cadastrar horário</a>";
        echo "<a href=" . $cadastroCliRoute . ">Cadastrar Cliente</a>";
        echo "<a href=" . $listarFunRoute . ">Listar Funcionários</a>";
        echo "<a href=" . $agendarParaClienteRoute . ">Agendar consulta</a>";
      }


      if (isset($_SESSION['msgCadData'])) {
        echo $_SESSION['msgCadData'];
        unset($_SESSION['msgCadData']);
      }

      if (isset($_SESSION['msgCadFun'])) {
        echo $_SESSION['msgCadFun'];
        unset($_SESSION['msgCadFun']);
      }

      if (isset($_SESSION['msgRotaProibida'])) {
        echo $_SESSION['msgRotaProibida'];
        unset($_SESSION['msgRotaProibida']);
      }


      ?>
      <button onclick="executeFunctions('logoff', '')">Sair</button>


    </nav>

  </header>



  <h1 class="titulo-agendamento">Agendamentos Marcados</h1>





  <div class="container box-total">


    <div class="box-opcoes">
      <select name="status" id="status" onchange="queryBanco('gerarTabelaAgenFun')" required>
        <option value="" disabled selected hidden>Selecione o status</option>
        <option value="Disponivel">Disponivel</option>
        <option value="Marcado">Marcado</option>
        <option value="Concluido">Concluido</option>
        <option value="Cancelado">Cancelado</option>
      </select>
    </div>


    <table id="tabela">
    </table>
  </div>

  <!-- The Modal -->
  <form action="<?php echo $procSalvarDetalhesRoute; ?>" method="post">
    <div id="id01" class="w3-modal">
      <div class="w3-modal-content">
        <div class="w3-container" id="container-modal">

        </div>
      </div>
    </div>
  </form>


  <script src="../script.js"></script>
</body>

</html>