<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

try {
    $idAni = $_POST['idAnimal'];
    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
    $stmtAni = $conn->prepare("UPDATE Animais SET nome = ?, data_nascimento = ?, especie = ?, raca = ?, peso = ?, cor = ? WHERE pk_Animal = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtAni->bind_param("sssssss", $_POST['nome'], $_POST['dataNasc'], $_POST['espec'], $_POST['raca'], $_POST['peso'], $_POST['cor'], $idAni);
    // Executa o sql
    $stmtAni->execute();
    header("Location: ". $animaisCliRoute);
} catch (Exception $e) {
    echo $e->getMessage();
}
