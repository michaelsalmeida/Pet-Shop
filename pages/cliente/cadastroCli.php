<?php
    session_start();
    include_once('../../rotas.php');
    require_once $funcoesRoute;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css-dinamico/estilo.css">
    <title>Document</title>
</head>
<body>

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
    <div id="pi">
        <form action="<?php echo $procCadCliRoute; ?>" method="post" id="pai">

            <div id="base">
                <label for="nome">NOME :</label>
                <input type="text" name="nome" placeholder="Digite o seu nome" required autofocus><br><br>

                <label for="sobrenome">SOBRENOME :</label>
                <input type="text" name="sobrenome" placeholder="Digite o seu sobrenome" required><br><br>

                <label for="cpf">CPF :</label>
                <input type="text" name="cpf" pattern="\d{3}[.]?\d{3}[.]?\d{3}[-]?\d{2}" placeholder="Digite seu email" required><br><br>

                <label for="celular">CELULAR :</label>
                <input type="text" name="celular" pattern="[0-9]{11}" placeholder="Digite seu telefone" require><br><br>

                <label for="email">EMAIL :</label>
                <input type="email" name="email" placeholder="Digite seu email para login" required><br><br>

                <label for="senha">SENHA</label>
                <input type="password" name="senha" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).{8,}$" placeholder="Digite sua senha" required><br><br>

            </div>
            

            <div id="endereco">

                <label>CEP :</label>
                <input type="text" name="cep" pattern="[0-9]{8}" id="cep" placeholder="Digite o CEP" onblur="pesquisacep(this.value)" required><br><br>

                <label>RUA :</label>
                <input type="text" name="log" id="log" placeholder="Digite sua rua" required readonly><br><br>

                <label>NÚMERO :</label>
                <input type="text" name="numero" id="numero" placeholder="Digite o número da casa" pattern="\d{1,5}" required ><br><br>

                <label>BAIRRO :</label>
                <input type="text" name="bairro" id="bairro" placeholder="Digite o bairro" required readonly><br><br>

                <label>CIDADE :</label>
                <input type="text" name="cid" id="cid" placeholder="Digite a cidade" required readonly><br><br>

                <label>UF :</label>
                <input type="text" name="uf" pattern="[a-zA-Z]{2}" id="uf" placeholder="Digite a uf" required readonly><br><br>

            </div>
        
            <input type="submit" value="Entrar">

        </form>

    </div>

    

    <script src="<?php echo $viacepRoute; ?>"></script>

</body>
</html>
