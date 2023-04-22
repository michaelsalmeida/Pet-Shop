<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexao

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
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_SESSION['msgTelaCadData'])) {
        echo $_SESSION['msgTelaCadData'];
        unset($_SESSION['msgTelaCadData']);
    }
    ?>

    <div>
        <form action="<?php echo $procCadDataRoute; ?>" method="post">
            <label for="data">DATA :</label>
            <input type="date" name="data" required>

            <label for="">HORÁRIO :</label>
            <input type="time" name="hora" required>

            <select name="servicos" id="servicos" onchange="queryBanco('profissionais')" required>
                <option value="" disabled selected hidden>Selecione o tipo de serviço</option>
                <option value="Veterinario">Veterinário</option>
                <option value="Esteticista">Banho</option>
                <option value="Esteticista">Tosa</option>
                <option value="Esteticista">Banho e Tosa</option>
            </select>

            <select name="profissionais" id="profissionais" required>
                <option value="" disabled selected hidden>Selecione um tipo de serviço</option>

            </select>

            <input type="submit" value="Cadastrar">
        </form>
        <a href="<?php echo $agendamentoFunRoute; ?>">Voltar</a>
    </div>

</body>

</html>
