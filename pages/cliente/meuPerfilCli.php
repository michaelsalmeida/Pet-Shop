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

<body onload="altMeuPerfilCli()">
    <?php
    if (isset($_SESSION['tipo'])){ // Verifica se o usuário logado é um funcionário
        header("Location: " . $agendamentoFunRoute);
    }
    if (!loged()) { // Verifica se há um usuário logado
        $_SESSION['msglogin'] = "Por favor, faça o login primeiro.";
        // Se não tiver manda ele para a página de login
        header("Location: " . $loginCliRoute);
    }
    if (isset($_SESSION['msgMeuPerfilCli'])) { // Verifica se há uma mensagem para mostrar
        echo $_SESSION['msgMeuPerfilCli'];
        unset($_SESSION['msgMeuPerfilCli']);
    }
    ?>

    <form action="<?php echo $proc_altCliRoute;?>" method="post">
        <input type="hidden" name="idCliente" value="<?php echo $_SESSION['idCli']; ?>">
        
        <label for="cpf">CPF</label><br>
        <input type="text" name="cpf" readonly required><br><br>

        <label for="nome">Nome</label><br>
        <input type="text" name="nome" readonly required><br><br>

        <label for="sobrenome">Sobrenome</label><br>
        <input type="text" name="sobrenome" readonly required><br><br>
    
        <label for="celular">Celular</label><br>
        <input type="text" name="celular" pattern="[0-9]{11}"
        readonly required><br><br>

        <label for="cep">CEP</label><br>
        <input type="text" name="cep" onblur="pesquisacep(this.value)"
        readonly required><br><br>
    
        <label for="log">Logradouro</label><br>
        <input type="text" name="log" readonly required><br><br>
    
        <label for="num">Número</label><br>
        <input type="text" name="num" pattern="\d{1,5}"
        readonly required><br><br>

        <label for="comp">Complemento</label><br>
        <input type="text" name="comp" readonly><br><br>

        <label for="bairro">Bairro</label><br>
        <input type="text" name="bairro" readonly required><br><br>

        <label for="cid">Munícipio</label><br>
        <input type="text" name="cid" readonly required><br><br>

        <label for="uf">UF</label><br>
        <input type="text" name="uf" readonly required><br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" readonly required><br><br>

        <input type="submit" value="Confirmar" name="conf" hidden>
    </form>

    
    <button onclick="meuPerfilCli()">Alterar</button>
    <a href="<?php echo $homeRoute;?>">Voltar</a>
    <button onclick="executeFunctions('logoff', '')">Sair</button>
    <a href="<?php echo $procExcCliRoute . "?id=" . $_SESSION["idCli"];?>">Apagar Conta</a>


    <script src="<?php echo $dataHojeRoute; ?>"></script>
    <script src="<?php echo $functionsRoute; ?>"></script>
    <script src="<?php echo $viacepRoute; ?>"></script>
</body>

</html>
