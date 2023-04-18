<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

try {
    $idCli = $_POST['idCliente'];
    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
    $stmtCli = $conn->prepare("UPDATE Animais SET nome = ?, data_nascimento = ?, especie = ?, raca = ?, peso = ?, cor = ? WHERE pk_Animal = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtCli->bind_param("sssssss", $_POST['cpf'], $_POST['nome'], $_POST['sobrenome'], $_POST['celular'], $_POST['cep'], $_POST['log'], $_POST['num'], $_POST['comp'], $_POST['bairro'], $_POST['cid'], $_POST['uf'], $_POST['email'], $idCli);
    // Executa o sql
    $stmtCli->execute();
    header("Location: ". $CliRoute);
} catch (Exception $e) {
    echo $e->getMessage();
}
