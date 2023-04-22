<?php
session_start();
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

try {
    $idCli = $_POST['idCliente'];
    $cep = str_replace('-', '', $_POST['cep']);
    $cpf = str_replace('.', '', $_POST['cpf']);
    $cpf = str_replace('-', '', $cpf);
    // Altera os dados do cliente de acordo com o que o usuário alterar.
    $stmtCli = $conn->prepare("UPDATE Clientes SET cpf = ?, nome = ?, sobrenome = ?, celular = ?, cep = ?,
    logradouro = ?, numero = ?, complemento = ?, bairro = ?, municipio = ?, uf = ?, email = ? WHERE pk_Cliente = ?");
    // Substituição da string preparada pelos valores corretos
    $stmtCli->bind_param(
        "sssssssssssss", $cpf, $_POST['nome'], $_POST['sobrenome'], $_POST['celular'],
        $cep, $_POST['log'], $_POST['num'], $_POST['comp'], $_POST['bairro'], $_POST['cid'], $_POST['uf'], $_POST['email'],
        $idCli
    );
    // Executa o sql
    $stmtCli->execute();
} catch (Exception $e) {
    echo $e->getMessage();
}
header("Location: " . $meuPerfilCliRoute);
