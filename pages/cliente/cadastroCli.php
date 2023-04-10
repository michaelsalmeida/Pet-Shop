<?php
    session_start();
    include_once('../../rotas.php');
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

    <form action="<?php echo $procCadCliRoute; ?>" method="post">

        <label>NOME :</label>
        <input type="text" name="nome" placeholder="Digite o nome completo" required autofocus><br><br>

        <label>CNPJ :</label>
        <input type="text" name="cnpj" pattern="[0-9]{14}" placeholder="Digite seu email"><br><br>

        <div>

            <label>CEP :</label>
            <input name="cep" pattern="[0-9]{8}" id="cep" placeholder="Digite o CEP" onblur="pesquisacep(this.value)"><br><br>

            <label>RUA :</label>
            <input type="text" name="log" id="log" placeholder="Digite sua rua"><br><br>

            <label>BAIRRO :</label>
            <input type="text" name="bairro" id="bairro" placeholder="Digite o bairro"><br><br>

            <label>CIDADE :</label>
            <input type="text" name="cid" id="cid" placeholder="Digite a cidade" ><br><br>

            <label>UF :</label>
            <input type="text" name="uf" pattern="[a-zA-Z]{2}" id="uf" placeholder="Digite a uf" ><br><br>

        </div>
        

        <label>SENHA :</label>
        <input type="password" name="senha" id="senha" placeholder="Digite a senha" ><br><br>

        <input type="submit" value="Entrar">

    </form>

    <script src="<?php echo $viacepRoute; ?>"></script>

</body>
</html>
