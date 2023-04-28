<?php
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

// Pega os valores digitados no login, pelo usuário
$idAgen = $_GET['id'];

try {
    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
    $stmtAni = $conn->prepare("UPDATE Agendamentos SET `status` = 'Cancelado' WHERE pk_Agendamento = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtAni->bind_param("s", $idAgen);
    // Executa o sql
    $stmtAni->execute();

    $_SESSION['msgCanAgen'] = "Agendamento Cancelado.";
    header("Location: " . $agendamentoCliRoute);
} catch (Exception $e) {
    $_SESSION['msgCanAgen'] = "Agendamento Não Cancelado.";
    echo $e->getMessage();
}
