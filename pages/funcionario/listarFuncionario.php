<?php

include_once("../../rotas.php");
include_once($connRoute);
require_once $funcoesRoute;

if (!isset($_SESSION['tipo'])) {
  // $_SESSION['msgRotaProibidaCli'] = "Você Não possui permissão para entrar nessa página";
  header("Location: " . $homeRoute);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css-estatico/header.css">
  <link rel="stylesheet" href="../css-dinamico/table.css">
  <link rel="stylesheet" href="../css-dinamico/pagina-inicial-corporativo.css">


  <script src="<?php echo $functionsRoute; ?>"></script>
</head>

<body onload="queryBanco('gerarTabelaDeleteFun')">


  <button onclick="executeFunctions('logoff', '')">Sair</button>
  <a href="<?php echo $agendamentoFunRoute; ?>">Voltar</a>

  <div>
    <input type="text" placeholder="Pesquise por um Funcionário" id="pesq">
    <button onclick="queryBanco('gerarTabelaDeleteFun')">Pesquisar</button>
  </div>



  <div class="container box-total">

    <div class="box-opcoes">
      <select name="situacoes" id="situacoes" onchange="queryBanco('gerarTabelaDeleteFun')" required>
        <option value="" disabled selected hidden>Selecione a situação</option>
        <option value="ativo">Ativo</option>
        <option value="demitido">Demitido</option>
      </select>
    </div>

    <table id="tabela"></table>
  </div>

</body>

</html>