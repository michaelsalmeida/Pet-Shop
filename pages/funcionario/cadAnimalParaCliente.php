<?php
include_once("../../rotas.php");
include_once($connRoute);
require_once $funcoesRoute;


if (!loged()) {
    $_SESSION['msgloginFun'] = "Por favor, faça o login primeiro";
    header("Location: " . $loginFunRoute);
}

if (!isset($_SESSION['tipo'])) {
    // $_SESSION['msgRotaProibidaCli'] = "Você Não possui permissão para entrar nessa página";
    header("Location: " . $homeRoute);
} else {
    if ($_SESSION['tipo'] != 'Secretaria') {
        $_SESSION['msgRotaProibida'] = "Você Não possui permissão para entrar nessa página";
        header("Location: " . $agendamentoFunRoute);
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css-dinamico/cadAnimais.css">
    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/cadastrar-animal-para-cliente.css">
    <link rel="icon" href="../img-dinamico/dog-icon.png">
    <title>Document</title>

</head>

<body onload="activateToast(<?php echo verificarSession(['msgCadAnimaisFunParaCli', 'msgCadAnimalErro']); ?>)">
    <?php
    if (isset($_SESSION['cli'])) {
        echo $_SESSION['cli'];
        unset($_SESSION['cli']);
    }
    if (isset($_SESSION['msgCadAnimaisFunParaCli'])) {
        unset($_SESSION['msgCadAnimaisFunParaCli']);
    }

    if (isset($_SESSION['msgCadAnimalErro'])) {
        unset($_SESSION['msgCadAnimalErro']);
    }

    ?>

    <div class="box-total-cadastro">
        <div class="informacoes-superior-2">
            <img class="iconCachorro" src="../img-estatico/iconCachorro.svg" alt="">

            <h1>CADASTRE SEU PET EM NOSSO SISTEMA!</h1>
        </div>


        <div class="box-input-cpf">

            <div class="box-cpf-cliente">

                <input class='input-cpf' type="text" id="cpf" name="cpf" pattern="[0-9]{11}" placeholder="Digite o CPF do cliente" required>
                <button class='botao-verificar' onclick="queryBanco2('verificar')">Verificar</button>

            </div>

        </div>



        <fieldset id="animal" style="display: none;">
            <form action="<?php echo $procCadAnimalFunRoute; ?>" method="post" name="formanimal" id="formAltAnimal">
            </form>
        </fieldset>
    </div>


    <div class="voltar">
        <a class='voltar' href="<?php echo $agendamentoFunRoute; ?>  ">Voltar</a>
    </div>

    <script src="<?php echo $functionsRoute ?>"></script>
    <script src="<?php echo $dataHojeRoute; ?>"></script>
    <script src="../../backend/funcoes/toast.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>