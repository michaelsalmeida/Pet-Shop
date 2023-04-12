
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
</head>

<body onresize="checaDispositivo()" onload="checaDispositivo()">
    <?php
    if (!loged()) {
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgCadAnimaisCli'])) {
        echo $_SESSION['msgCadAnimaisCli'];
        unset($_SESSION['msgCadAnimaisCli']);
    }
    ?>

    <form action="<?php echo $proc_cadAnimalRoute;?>" method="post">
        <label for="nome">Tipo de Agendamento</label><br>
        <select name="" id="">
            <option value="" disabled selected hidden>Selecione o tipo de Agendamento</option>
            <option value="0">Banho</option>
            <option value="1">Tosa</option>
            <option value="2">Veterinário</option>
        </select><br><br>
    
        <label for="dataNasc">Data de Agendamento</label><br>
        <input type="date" name="dataNasc"><br><br>
    
        <table id="fazAgend">
            
        </table>

        <input type="submit" value="Cadastrar">
    </form>

    <button onclick="executeFunctions('logoff')">Logoff</button>
    <script src="<?php echo $dataHojeRoute; ?>"></script>
</body>

</html>
