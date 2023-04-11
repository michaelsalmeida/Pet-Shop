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
  <link rel="stylesheet" href="cssBack/modalfechamento.css">
  <link rel="stylesheet" href="cssBack/lista.css">
  <script src="<?php echo $functionsRoute; ?>"></script>
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
</head>

<body onresize="checaDispositivo()" onload="gerarTabela()">
  <?php
  if (!logedCli()) {
    $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
    header("Location: " . $loginCliRoute);
  }
  ?>
  
  <table id="animais">
    <tr>
      <th>Nome</th>
      <th>Data de Nascimento</th>
      <th>Raça</th>
      <th>Peso</th>
    </tr>
    <tr>
      <td>Violett</td>
      <td>02/07/2003</td>
      <td>Cadela</td>
      <td>70Kg</td>
    </tr>
    <tr>
      <td colspan=4>Não há animais cadastrados</td>
    </tr>
  </table>

  <a href="<?php echo $cadAnimaisCliRoute; ?>">Cadastrar Animal</a>
  <button onclick="executeFunctions('logoffCli')">Logoff</button>
</body>

</html>
