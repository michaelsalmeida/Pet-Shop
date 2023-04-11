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
  <link rel="stylesheet" href="cssBack/modalfechamento.css">
  <link rel="stylesheet" href="cssBack/lista.css">
  <script src="<?php echo $functionsRoute; ?>"></script>
</head>

<body onresize="checaDispositivo()" onload="checaDispositivo()">
  <?php
  if (!loged()) {
    $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
    header("Location: " . $loginCliRoute);
  }
  ?>

  

  <a href="<?php echo $fazAgendamentoCliRoute; ?>">Fazer Agendamento</a>
  <button onclick="executeFunctions('logoff')">Logoff</button>
</body>

</html>
