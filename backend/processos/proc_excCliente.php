<?php
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão
require_once($funcoesRoute);

// Pega os valores digitados no login, pelo usuário
$idCli = $_GET['id'];

try {
    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
    $stmtAgen = $conn->prepare("UPDATE Agendamentos
    INNER JOIN `Animais`
    ON Agendamentos.`fk_Animal` = Animais.`pk_Animal`
    SET Agendamentos.ativo = 'inativo'
    WHERE fk_Cliente = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtAgen->bind_param("s", $idCli);
    // Executa o sql
    $stmtAgen->execute();

    $stmtAni = $conn->prepare("UPDATE Animais SET ativo = 'inativo' WHERE fk_Cliente = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtAni->bind_param("s", $idCli);
    // Executa o sql
    $stmtAni->execute();

    $stmtCli = $conn->prepare("UPDATE Clientes SET ativo = 'inativo', email = '' WHERE pk_Cliente = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtCli->bind_param("s", $idCli);
    // Executa o sql
    $stmtCli->execute();

    $_SESSION['msgIndex'] = "Conta excluida com sucesso";
    logoff();
    header("Location: " . $homeRoute);
} catch (Exception $e) {
    $_SESSION['msgMeuPerfilCli'] = "Perfil não foi excluído.";
    echo $e->getMessage();
}
