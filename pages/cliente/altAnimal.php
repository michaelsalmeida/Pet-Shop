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
</head>

<body onload="altAnimal()">
    <?php

    if (isset($_SESSION['tipo'])){ // Verifica se o usuário logado é um funcionário
        header("Location: " . $agendamentoFunRoute);
    }
    if (!loged()) { // Verifica se há um usuário logado
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        // Se não tiver manda ele para a página de login
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgAltAnimaisCli'])) { // Verifica se há uma mensagem para mostrar
        echo $_SESSION['msgAltAnimaisCli'];
        unset($_SESSION['msgAltAnimaisCli']);
    }
    ?>

    <form action="<?php echo $proc_altAnimalCliRoute;?>" method="post">
        <input type="hidden" name="idAnimal" value="<?php echo $_GET['id']; ?>">
        
        <label for="nome">Nome</label><br>
        <input type="text" name="nome"><br><br>
    
        <label for="dataNasc">Data de Nascimento </label><br>
        <input type="date" name="dataNasc"><br><br>
    
        <label for="espec">Espécie</label><br>
        <input type="text" name="espec"><br><br>

        <label for="raca">Raça</label><br>
        <input type="text" name="raca"><br><br>
    
        <label for="peso">Peso (Kg)</label><br>
        <input type="number" name="peso" step=0.01  pattern="[0-9]*"><br><br>
    
        <label for="cor">Cor</label><br>
        <input type="text" name="cor"><br><br>

        <input type="submit" value="Alterar">
    </form>

    <button onclick="executeFunctions('logoff', '')">Sair</button>
    <script src="<?php echo $dataHojeRoute; ?>"></script>
    <script src="<?php echo $functionsRoute; ?>"></script>
</body>

</html>
