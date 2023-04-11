<?php
include_once("../../rotas.php");
include_once($connRoute);
require_once "../../backend/funcoes/verificacao.php";
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
    ?>
    <form action="<?php echo $proc_cadAnimalRoute;?>" method="post">
        <label for="nome">Nome</label><br>
        <input type="email" name="nome"><br><br>
    
        <label for="dataNasc">Data de Nascimento </label><br>
        <input type="date" name="dataNasc"><br><br>
    
        <label for="raca">Raça</label><br>
        <input type="text" name="raca"><br><br>
    
        <label for="peso">Peso (Kg)</label><br>
        <input type="number" name="peso" step=0.01><br><br>
    
        <label for="cor">Cor</label><br>
        <input type="text" name="cor"><br><br>
    </form>

    <button onclick="executeFunctions('logoff')">sair</button>
</body>

</html>
