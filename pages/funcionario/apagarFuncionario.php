<?php
session_start();
include_once("../../rotas.php");
include_once($connRoute);
require_once $funcoesRoute;

if(!isset($_SESSION['tipo'])){
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
<body onload="queryBanco('gerarTabelaDeleteFun')">


    <button onclick="executeFunctions('logoff', '')">Sair</button>

  <div>
    <input type="text" placeholder="Pesquise por um Funcionário" id="pesq">
    <button onclick="queryBanco('gerarTabelaDeleteFun')">Pesquisar</button>
  </div>
  
  <div>
    <select name="situacoes" id="situacoes" onchange="queryBanco('gerarTabelaDeleteFun')" required>
        <option value="" disabled selected hidden>Selecione o tipo de serviço</option>
        <option value="ativo">Ativo</option>
        <option value="demitido">Demitido</option>
    </select>
  </div>
  
  

  <table id="tabela">

  </table>


    
</body>
</html>