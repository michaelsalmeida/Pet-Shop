<?php
    session_start();
    include_once("../../rotas.php"); // Inclui o arquivo de rotas
    include_once($connRoute); // Inclui o arquivo de conexao
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

    <div>
        <form action="<?php echo $procCadDataRoute; ?>" >
            <label for="data">DATA :</label>
            <input type="date" name="data">

            <label for="">HORÁRIO :</label>
            <input type="time" name="hora">

            <select name="servicos" id="servicos" onchange="gerarAgendamentoFun()">
                <option value="" disabled selected hidden>Selecione o tipo de serviço</option>
                <option value="Veterinario">Veterinário</option>
                <option value="Banho">Banho</option>
                <option value="Tosa">Tosa</option>
                <option value="Banho e tosa">Banho e Tosa</option>
            </select>    
            
            <select name="profissionais" id="profissionais">
                <option value="" disabled selected hidden>Selecione um tipo de serviço</option>

            </select>
    
        </form>
    </div>
    
</body>
</html>