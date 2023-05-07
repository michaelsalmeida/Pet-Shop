<?php
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

// variáveis pegando os valores do front
$nome = $_POST['nome'];
$telefone = $_POST['tell'];
$email = $_POST['email'];
$mensagem = $_POST['msg'];

// pega a data em que o comentário foi enviado
$data = date("Y-m-d");

// prepara o comando sql de inserção
$stmt = $conn->prepare("INSERT into Comentarios VALUES (default, ?, ?, ?, ?, ?)");

// Adiciona as variáveis dentro do comando sql
$stmt->bind_param("sssss", $nome, $telefone, $email, $mensagem, $data);

// executa a query 
$stmt->execute();

if ($stmt->affected_rows > 0) {// se a inserção for bem sucedida
    // envia um aviso de que a inserção foi inserida
    $_SESSION['msgComent'] = "Comentário enviado com sucesso";
    header("location: " . $contatoRoute);
} else { // se não
    // mostra um aviso de que o comentário não foi salvo
    $_SESSION['msgComent'] = "Erro ao enviar o comentário";
    header("location: " . $contatoRoute);
}
