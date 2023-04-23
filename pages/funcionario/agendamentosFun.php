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
  <link rel="stylesheet" href="../css-estatico/header.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="../css-dinamico/table.css">
  <link rel="stylesheet" href="../css-dinamico/funcionario.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>

<body onresize="checaDispositivo()" onload="queryBanco('gerarTabelaAgenFun')">
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
    echo "<a href=" . $cadastradaDatasRoute . ">Cadastrar horário</a><br><br>";
    echo "<a href=" . $cadastroCliRoute . ">Cadastrar Cliente</a><br><br>";
    echo "<a href=" . $agendarParaClienteRoute . ">Agendar consulta</a><br><br>";
  } elseif ($_SESSION['tipo'] == 'admin') {
    echo "<a href=" . $cadastrarFunRoute . ">Cadastrar funcionário</a><br><br>";
    echo "<a href=" . $cadastradaDatasRoute . ">Cadastrar horário</a><br><br>";
    echo "<a href=" . $cadastroCliRoute . ">Cadastrar Cliente</a><br><br>";
    echo "<a href=" . $listarFunRoute . ">Listar Funcionários</a><br><br>";
    echo "<a href=" . $agendarParaClienteRoute . ">Agendar consulta</a><br><br>";
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

  <div class="box-superior">

    <div class="box-opcoes">
      <select name="status" id="status" onchange="queryBanco('gerarTabelaAgenFun')" required>
        <option value="" disabled selected hidden>Selecione o status</option>
        <option value="Disponivel">Disponivel</option>
        <option value="Marcado">Marcado</option>
        <option value="Concluido">Concluido</option>
        <option value="Cancelado">Cancelado</option>
      </select>
    </div>

    <div class="box-pesquisar">
      <input type="text" placeholder="Pesquise por um Funcionário" id="pesq">
      <button onclick="queryBanco('gerarTabelaAgenFun')"><i class="bi bi-search"></i></button>
    </div>

  </div>

  <div class="container box-total">
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

</body>

</html>