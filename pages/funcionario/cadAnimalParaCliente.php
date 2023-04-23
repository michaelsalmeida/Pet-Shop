<?php
    include_once("../../rotas.php");
    include_once($connRoute);
    require_once $funcoesRoute;


    if (!loged()) {
        $_SESSION['msgloginFun'] = "Por favor, faça o login primeiro.";
        header("Location: " . $loginFunRoute);
    }

  if (!isset($_SESSION['tipo'])) {
    // $_SESSION['msgRotaProibidaCli'] = "Você Não possui permissão para entrar nessa página";
    header("Location: " . $homeRoute);
  } else {
    if ($_SESSION['tipo'] != 'admin'){
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
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['cli'])){
            echo $_SESSION['cli'];
            unset($_SESSION['cli']);
        }
            if(isset($_SESSION['msgCadAnimaisFunParaCli']))
            echo $_SESSION['msgCadAnimaisFunParaCli'];
            unset($_SESSION['msgCadAnimaisFunParaCli']);

    ?>
    <label for="cpf">CPF DO CLIENTE: </label>
    <input type="text" id="cpf" name="cpf" pattern="[0-9]{11}" placeholder="Digite o CPF do cliente" required>
    <button onclick="queryBanco2('verificar')">Verificar</button>

    <p id="aviso" style="display:none;">NENHUM CPF ENCONTRADO</p>

    <fieldset id="animal" style="display: none;">
        <form action="" method="post" name="formanimal" id="formanimal">
            <div>
                <label for="nome">Nome</label><br>
                <input type="text" name="nome">
            </div>

            <div>
                <label for="dataNasc">Data de Nascimento </label><br>
                <input type="date" name="dataNasc">
            </div>

            <div>
                <label for="espec">Espécie</label><br>
                <input type="text" name="espec">
            </div>

            <div>
                <label for="raca">Raça</label><br>
                <input type="text" name="raca">
            </div>

            <div>
                <label for="peso">Peso (Kg)</label><br>
                <input type="number" name="peso" step=0.01 pattern="[0-9]*">
            </div>

            <div>
                <label for="cor">Cor</label><br>
                <input type="text" name="cor">
            </div>
            <input type="submit" value="Cadastrar">
            
        </form>
    </fieldset>
    

    <script src="<?php echo $functionsRoute ?>"></script>
</body>
</html>