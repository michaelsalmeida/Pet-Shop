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
    <title>Meu Perfil</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5998/5998796.png">
</head>

<body onload="meuPerfil()">
    <?php
    if (isset($_SESSION['tipo'])){
        header("Location: " . $agendamentoFunRoute);
    }
    if (!loged()) {
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgMeuPerfil'])) {
        echo $_SESSION['msgMeuPerfil'];
        unset($_SESSION['msgMeuPerfil']);
    }
    ?>

    <form action="" method="post">
        <input type="hidden" name="idCliente" value="<?php echo $_SESSION['idCli']; ?>">
        
        <label for="cpf">CPF</label><br>
        <input type="text" name="cpf" readonly><br><br>

        <label for="nome">Nome</label><br>
        <input type="text" name="nome" readonly><br><br>

        <label for="sobrenome">Sobrenome</label><br>
        <input type="text" name="sobrenome" readonly><br><br>
    
        <label for="celular">Celular</label><br>
        <input type="text" name="celular" readonly><br><br>

        <label for="cep">CEP</label><br>
        <input type="text" name="cep" readonly><br><br>
    
        <label for="log">Logradouro</label><br>
        <input type="number" name="log" step=0.01  pattern="[0-9]*" readonly><br><br>
    
        <label for="num">Número</label><br>
        <input type="text" name="num" readonly><br><br>

        <label for="comp">Complemento</label><br>
        <input type="text" name="comp" readonly><br><br>

        <label for="bair">Bairro</label><br>
        <input type="text" name="bair" readonly><br><br>

        <label for="mun">Munícipio</label><br>
        <input type="text" name="mun" readonly><br><br>

        <label for="uf">UF</label><br>
        <input type="text" name="uf" readonly><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" readonly><br><br>

        <input type="submit" value="Confirmar" hidden>
    </form>

    <script src="<?php echo $dataHojeRoute; ?>"></script>
    <script src="<?php echo $functionsRoute; ?>"></script>
    <button onclick="altPerfil()">Alterar</button>
    <a href="<?php echo $homeRoute;?>">Voltar</a>
    <button onclick="executeFunctions('logoff', '')">Sair</button>
</body>

</html>
