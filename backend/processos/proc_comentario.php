<?php
    include_once("../../rotas.php"); // Inclui o arquivo de rotas
    include_once($connRoute); // Inclui o arquivo de conexão

    
    $nome = $_POST['nome'];
    $telefone = $_POST['tell'];
    $email = $_POST['email'];
    $mensagem = $_POST['msg'];

    $data = date("Y-m-d");

    $stmt = $conn->prepare("INSERT into Comentarios VALUES (default, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $nome, $telefone, $email, $mensagem, $data);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['msgComent'] = "<p style='color: green;'>COMENTÁRIO ENVIADO COM SUCESSO</p>";
        header("location: " . $contatoRoute);
    } else {
        $_SESSION['msgComent'] = "<p style='color: red;'>ERRO AO ENVIAR O COMENTÁRIO</p>";
        header("location: " . $contatoRoute);
    }
?>