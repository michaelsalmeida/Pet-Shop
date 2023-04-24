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
    if ($_SESSION['tipo'] != 'Secretaria'){
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

    <a href="<?php echo $agendamentoFunRoute; ?>">Voltar</a>

    <label for="cpf">CPF DO CLIENTE: </label>
    <input type="text" id="cpf" name="cpf" pattern="[0-9]{11}" placeholder="Digite o CPF do cliente" required>
    <button onclick="queryBanco2('verificar')">Verificar</button>

    <p id="aviso" style="display:none;">NENHUM CPF ENCONTRADO</p>

    <fieldset id="animal" style="display: none;">
        <form action="<?php echo $procCadAnimalFunRoute; ?>" method="post" name="formanimal" id="formanimal">    
            
        </form>
    </fieldset>
    

    <script src="<?php echo $functionsRoute ?>"></script>
</body>
</html>