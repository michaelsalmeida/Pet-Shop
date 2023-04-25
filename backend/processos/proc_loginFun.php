<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexao

$login = htmlspecialchars($_POST['login']);
$senha = htmlspecialchars($_POST['senha']);
$hash = hash("sha512", $senha);

try {
    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo funcionário
    $stmt = $conn->prepare("SELECT pk_Funcionario, profissao, nome FROM Funcionarios WHERE cpf = ? and senha = ?");
    $stmt->bind_param("ss", $login, $hash);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica se a query deu algum retorno
    if ($row = $resultado->fetch_row()) {
        $_SESSION['loggedinFun'] = true;
        $_SESSION['idFun'] = $row[0]; // id do Funcionário
        $_SESSION['tipo'] = $row[1];
        $_SESSION['nome'] = $row[2];
        header("Location: " . $agendamentoFunRoute);
    } else {
        $_SESSION['msgloginFun'] = "<p>USUÁRIO OU SENHA INCORRETO(S).</p>";
        header("Location: " . $loginFunRoute);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
