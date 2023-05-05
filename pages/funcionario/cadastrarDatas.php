<?php
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexao
require_once $funcoesRoute;
if (!isset($_SESSION['msgCadDataErro'])){
    $_SESSION['msgCadDataErro'] = false;
}

if ($_SESSION['tipo'] != "admin" && $_SESSION['tipo'] != "Secretaria") {
    $_SESSION['msgRotaProibida'] = "Você Não possui permissão para entrar nessa página";
    header("Location: " . $agendamentoFunRoute);
}
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
    <script src="<?php echo $functionsRoute; ?>"></script>
    <title>Cadastrar Horário</title>

    <link rel="stylesheet" href="../css-dinamico/meu-perfil.css">
    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/">
    <link rel="stylesheet" href="../css-dinamico/cadastrar-funcionario.css">
    <link rel="icon" href="../img-dinamico/dog-icon.png">


</head>

<body onload="activateToast(<?php echo verificarSession(['msgCadDataErro']); ?>)">
    <?php
    if (isset($_SESSION['msgCadDataErro'])) {
        unset($_SESSION['msgCadDataErro']);
    }
    ?>

    <div>

        <div class="informacoes-superior">
            <img src="../img-dinamico/icone-relogio.svg" alt="ícone do meu perfil">
            <h1>CADASTRE UM HORÁRIO NA PLATAFORMA!</h1>
        </div>

        <form action="<?php echo $procCadDataRoute; ?>" method="post">

            <div class="box-maior-input">

                <div class="box-input">

                    <label for="data">DATA</label>
                    <input type="date" name="data" required>

                </div>

                <div class="box-input">

                    <label for="">HORÁRIO</label>
                    <input type="time" name="hora" required>

                </div>

            </div>

            <div class="box-maior-input">

                <div class="box-input">

                    <label for="">Selecione o tipo de serviço</label>
                    <select name="servicos" id="servicos" onchange="queryBanco('profissionais')" required style="width: 300px;">
                        <option value="" disabled selected hidden>Selecione o tipo de serviço</option>
                        <option value="Veterinario">Veterinário</option>
                        <option value="Banho">Banho</option>
                        <option value="Tosa">Tosa</option>
                        <option value="Banho e Tosa">Banho e Tosa</option>
                    </select>

                </div>

                <div class="box-input">

                    <label for="">Selecione o profissional</label>

                    <select name="profissionais" id="profissionais" required style="width: 300px;">
                        <option value="" disabled selected hidden>Selecione um serviço primeiro</option>

                    </select>

                </div>

            </div>

            <div class="box-inferior-botoes">

                <input type="submit" value="Cadastrar">
                <a href="<?php echo $agendamentoFunRoute; ?>">Voltar</a>
            </div>
        </form>
    </div>
    <script src="../../backend/funcoes/toast.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>