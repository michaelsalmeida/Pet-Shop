<?php
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

try {
    $idCli = $_POST['idCliente'];
    $cep = str_replace('-', '', $_POST['cep']);
    $cpf = str_replace('.', '', $_POST['cpf']);
    $cpf = str_replace('-', '', $cpf);
    $celular = $_POST['celular'];
    $celular = str_replace(['(', ')', '-'], '', $celular);
    // Altera os dados do cliente de acordo com o que o usuário alterar.
    $stmtCli = $conn->prepare("UPDATE Clientes SET cpf = ?, nome = ?, sobrenome = ?, celular = ?, cep = ?, logradouro = ?,
    numero = ?, complemento = ?, bairro = ?, municipio = ?, uf = ?, email = ? WHERE pk_Cliente = ? AND ativo = 'ativo'");
    // Substituição da string preparada pelos valores corretos
    $stmtCli->bind_param(
        "sssssssssssss", $cpf, $_POST['nome'], $_POST['sobrenome'], $celular,
        $cep, $_POST['log'], $_POST['num'], $_POST['comp'], $_POST['bairro'], $_POST['cid'], $_POST['uf'], $_POST['email'],
        $idCli
    );
    // Executa o sql
    $stmtCli->execute();
    $_SESSION['msgAltCli'] = "Alteração feita com sucesso" ;
} catch (Exception $e) {
    if ($e->getCode() === 1062) {
        $_SESSION['msgAltCli'] = "Erro ao alterar usuário";
    }
}
header("Location: " . $meuPerfilCliRoute);
