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
    <title>Document</title>
</head>
<body>

    <div>
        <form action="<?php echo $procCadDataRoute; ?>">
            <label for="data">DATA :</label>
            <input type="date" name="data">

            <label for="">HORÁRIO :</label>
            <input type="time" name="hora">

            <select name="servicos" id="servicos">
                <option value="" disabled selected hidden>Selecione o tipo de serviço</option>
                <option value="veterinario">Veterinário</option>
                <option value="banho">Banho</option>
                <option value="tosa">Tosa</option>
                <option value="banhoetosa">Banho e Tosa</option>
            </select>     
    
        </form>
    </div>
    
</body>
</html>