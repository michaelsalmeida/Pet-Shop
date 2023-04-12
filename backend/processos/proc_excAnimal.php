<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

// Pega os valores digitados no login, pelo usuário
$idAni = $_GET['id'];

try {
    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
    $stmtAgen = $conn->prepare("DELETE FROM Agendamentos WHERE fk_Animal = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtAgen->bind_param("s", $idAni);
    // Executa o sql
    $stmtAgen->execute();

    $stmtAni = $conn->prepare("DELETE FROM Animais WHERE pk_Animal = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtAni->bind_param("s", $idAni);
    // Executa o sql
    $stmtAni->execute();
    header("Location: ". $animaisCliRoute);
} catch (Exception $e) {
    echo $e->getMessage();
}
