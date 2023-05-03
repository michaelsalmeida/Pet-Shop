<?php
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

try {
    // Pega os valores digitados no login, pelo usuário
    $nome = htmlspecialchars($_POST['nome']);

    // Trata data que vem do front
    $dataRecebida = new DateTime($_POST['dataNasc']);
    $dataNasc = $dataRecebida->format('Y-m-d');

    $sexo = htmlspecialchars($_POST['sexo']);
    $espec = htmlspecialchars($_POST['espec']);
    $raca = htmlspecialchars($_POST['raca']);
    $peso = filter_var($_POST['peso'], FILTER_SANITIZE_NUMBER_FLOAT);
    $cor = htmlspecialchars($_POST['cor']);
    $hoje = date('Y-m-d');

    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
    // String de preparação
    $stmt = $conn->prepare("INSERT INTO Animais
    VALUES (default, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'ativo')");
    // Substituição da string preparada pelos valores corretos
    $stmt->bind_param("sssssssss", $_SESSION['idCli'], $nome, $dataNasc, $sexo, $espec, $raca, $peso, $cor, $hoje);
    // Executa o sql
    $stmt->execute();

    $_SESSION['msgCadAnimaisCli'] = "Animal Cadastrado com successo";
} catch (Exception $e) {
    $_SESSION['msgCadAnimaisCli'] = "Animal Não Cadastrado: <br>" . $_SESSION['id'] . $e->getMessage();
}
header("Location: " . $cadAnimaisCliRoute);
