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

<body onresize="checaDispositivo()" onload="queryBanco('gerarTabelaAgenFun')">
  <?php
  if (!loged()) {
    $_SESSION['msgloginFun'] = "Por favor, faça o login primeiro.";
    header("Location: " . $loginFunRoute);
  }

  if ($_SESSION['tipo'] == 'Secretaria'){
    echo "<a href=" . $cadastradaDatasRoute . ">Cadastrar horário</a><br><br>";
    echo "<a href=" . $cadastroCliRoute . ">Cadastrar Cliente</a><br><br>";
  } elseif ($_SESSION['tipo'] == 'admin') {
    echo "<a href=" . $cadastrarFunRoute . ">Cadastrar funcionário</a><br><br>";
    echo "<a href=" . $cadastradaDatasRoute . ">Cadastrar horário</a><br><br>";
    echo "<a href=" . $cadastroCliRoute . ">Cadastrar Cliente</a><br><br>";
  }
  

  if (isset($_SESSION['msgCadData'])){
    echo $_SESSION['msgCadData'];
    unset($_SESSION['msgCadData']);
  }
  
  if (isset($_SESSION['msgCadFun'])){
    echo $_SESSION['msgCadFun'];
    unset($_SESSION['msgCadFun']);
  }

  if (isset($_SESSION['msgRotaProibida'])){
    echo $_SESSION['msgRotaProibida'];
    unset($_SESSION['msgRotaProibida']);
}   


  ?>

  <div>
    <input type="text" placeholder="Pesquise por um cliente" id="pesq">
    <button onclick="queryBanco('gerarTabelaAgenFun')">Pesquisar</button>
  </div>

  
  <button onclick="executeFunctions('logoff', '')">Logoff</button>

  <table id="tabela">

  </table>
  
  
  
</body>

</html>
