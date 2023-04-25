<?php
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
    <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      text-align: center;
    }

    tr:nth-child(odd) {
      background-color: #dddddd;
    }

    #container-modal {
      display: flex;
      align-items: center;
      flex-direction: column;
      padding-bottom: 30px;
      gap: 20px;
    }
  </style>  
</head>

<body>
    <a href="<?php echo $agendamentoFunRoute; ?>">Voltar</a>

    <label for="cpf">CPF DO CLIENTE: </label>
    <input type="text" id="cpf" name="cpf" pattern="[0-9]{11}" placeholder="Digite o CPF do cliente" required>
    <button onclick="queryBanco2('animais')">Verificar</button>

    
    <select name="animais" id="animais" required>
        <option value="" disabled selected hidden>Selecione um tipo de serviço</option>
    </select>

    <div>
        <select name="status" id="status" onchange="paginacao('tabelaFunAgenCli')" required style="display: none;">
            <option value="" disabled selected hidden>Selecione o status</option>
            <option value="Veterinario">Veterinário</option>
            <option value="Banho">Banho</option>
            <option value="Tosa">Tosa</option>
            <option value="Banho e Tosa">Banho e Tosa</option>
        </select>
    </div>

    <div id="divpesq" style="display: none;">
        <input type="text" placeholder="Pesquise por um Funcionário" id="pesq">
        <button onclick="paginacao('tabelaFunAgenCli')">Pesquisar</button>
    </div>

    <?php
    if(isset($_SESSION['agenCliFun'])){
        echo $_SESSION['agenCliFun'];
        unset($_SESSION['agenCliFun']);
    }
    if (isset($_GET['pagina'])) {
      echo "<p id='pag' hidden>".$_GET['pagina']."</p>";
    } else {
      echo "<p id='pag' hidden>1</p>";
    }
    ?>

    <table id="tabela"></table>
    <div id="links"></div>



    <script src="<?php echo $functionsRoute ?>"></script>
</body>

</html>
