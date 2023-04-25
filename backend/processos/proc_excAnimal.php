<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

// Pega os valores digitados no login, pelo usuário
$idAni = $_GET['id'];

try {
    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
    $stmtAgen = $conn->prepare("UPDATE Agendamentos SET ativo = 'inativo' WHERE fk_Animal = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtAgen->bind_param("s", $idAni);
    // Executa o sql
    $stmtAgen->execute();

    $stmtAni = $conn->prepare("UPDATE Animais SET ativo = 'inativo' WHERE pk_Animal = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtAni->bind_param("s", $idAni);
    // Executa o sql
    $stmtAni->execute();

    $_SESSION['msgExcAnimal'] = "Animal Excluído com Sucesso.";
} catch (Exception $e) {
    $_SESSION['msgExcAnimal'] = "Animal Não Excluído.";
    echo $e->getMessage();
}
header("Location: " . $animaisCliRoute);
