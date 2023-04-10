<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

// Pega os valores digitados no login, pelo usuário
$cpf = htmlspecialchars($_POST['cpf']);
$senha = htmlspecialchars($_POST['senha']);
// Codifica a senha, para que possa ser comparada com a senha do banco
$hash = hash("sha512", $senha);

try {
    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
    $resultado = mysqli_query($conn, "SELECT pk_Funcionario, profissao FROM Funcionarios
    WHERE cpf = '$cpf' and senha = '$hash'");

    // Verifica se a query deu algum retorno
    if ($row = $resultado->fetch_row()) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $row[0];   // id do funcionario
        $_SESSION['tipo'] = $row[1]; // profissao do funcionario
        header("Location: " . $agendamentosRoute);
    } else {
        $_SESSION['msglogin'] = "<p>USUÁRIO OU SENHA INCORRETO(S).</p>";
        header("Location: " . $loginCliRoute);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
