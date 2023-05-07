<?php
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

// Pega os valores digitados no login, pelo usuário
$senhaAtual = htmlspecialchars($_POST['senhaAtual']);
$senhaNova = htmlspecialchars($_POST['senha']);

// Codifica a senha, para que possa ser comparada com a senha do banco
$hashAtual = hash("sha512", $senhaAtual);
$hashNova = hash("sha512", $senhaNova);


try {
    // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
    $stmt = $conn->prepare("SELECT pk_Cliente, nome FROM Clientes WHERE pk_Cliente = ? AND senha = ? AND ativo = 'ativo'");
    // Substituição da string preparada pelos valores corretos
    $stmt->bind_param("ss", $_GET['id'], $hashAtual);
    // Executa o sql
    $stmt->execute();
    // Pega os resultados da query
    $resultado = $stmt->get_result();
    
    // Verifica se a query deu algum retorno
    if ($row = $resultado->fetch_row()) {
        // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
        $stmt = $conn->prepare("UPDATE Clientes SET senha = ? WHERE pk_Cliente = ? AND ativo = 'ativo'");
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("ss", $hashNova, $_GET['id']);
        // Executa o sql
        $stmt->execute();
        // Pega os resultados da query
        $resultado = $stmt->get_result();
        
        $_SESSION['msgAltCli'] = "Senha atualizada com sucesso";
        header("Location: " . $meuPerfilCliRoute);
    } else {
        $_SESSION['msgAltCli'] = "Senha atual incorreta";
        header("Location: " . $meuPerfilCliRoute);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
