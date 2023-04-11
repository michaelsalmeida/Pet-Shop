<?php
    include_once("rotas.php");
    require_once $funcoesRoute;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="<?php echo $functionsRoute; ?>"></script>
</head>
<body>
    <a href="<?php echo $loginCliRoute; ?>">Login do cliente</a>
    <a href="<?php echo $cadastroCliRoute; ?>">Cadastro do cliente</a>
    <a href="<?php echo $agendamentoCliRoute;?>">Agendamento</a>

    <?php
        if (logedCli()) {
            echo "
            <a href='$fazAgendamentoCliRoute'>Fazer Agendamento</a>
            <a href='$cadAnimaisCliRoute'>Cadastrar Animais</a>
            <button onclick=executeFunctions('logoffCli')>Logoff</button>
            ";
        }
    ?>
</body>
</html>
