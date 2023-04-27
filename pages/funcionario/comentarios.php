<?php
include_once("../../rotas.php");
include_once($connRoute);
require_once $funcoesRoute;

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
    <link rel="stylesheet" href="../css-estatico/header.css">
    <link rel="stylesheet" href="../css-dinamico/table.css">
    <link rel="stylesheet" href="../css-dinamico/pagina-inicial-corporativo.css">
    <title>Document</title>
    <script src="<?php echo $functionsRoute; ?>"></script>
</head>
    <body onload="paginacao('tabelaComentarios')">
    <?php
    if (isset($_GET['pagina'])) {
        echo "<p id='pag' hidden>".$_GET['pagina']."</p>";
    } else {
        echo "<p id='pag' hidden>1</p>";
    }
    ?>

    <button onclick="executeFunctions('logoff', '')">Sair</button>
    <a href="<?php echo $agendamentoFunRoute; ?>">Voltar</a>


    <div>
        <input type="text" placeholder="Pesquise por palavras chaves" id="pesq">
        <button onclick="paginacao('tabelaComentarios')">Pesquisar</button>
    </div>

    <div>
        <input type="date" id="data">
        <button onclick="paginacao('tabelaComentarios')">Pesquisar</button>
    </div>


        <div id="tabela"></div>
        <div id="links"></div>
    </div>

    </body>
</html>