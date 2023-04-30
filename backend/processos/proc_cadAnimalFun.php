<?php
include_once("../../rotas.php"); // Inclui o arquivo de rotas
include_once($connRoute); // Inclui o arquivo de conexão

try {
    // Pega os valores digitados no login, pelo usuário
    $nome = htmlspecialchars($_POST['nome']);

    // Trata data que vem do front
    $data_atual = date("Y-m-d");
    $dataRecebida = new DateTime($_POST['dataNasc']);
    $date = $dataRecebida->format("Y-m-d");
    $dataNasc = $dataRecebida->format('Y-m-d');

    $espec = htmlspecialchars($_POST['espec']);
    $raca = htmlspecialchars($_POST['raca']);
    $peso = filter_var($_POST['peso'], FILTER_SANITIZE_NUMBER_FLOAT);
    $cor = htmlspecialchars($_POST['cor']);
    $hoje = date('Y-m-d');

    if (strtotime($date) > strtotime($data_atual)){
        $_SESSION['msgCadAnimalErro'] = "Data de nascimento inválida";
        header("Location: " . $cadAnimalParaClienteRoute);
    } else {
        // Faz a query no banco, utilizando a senha e o cpf, fornecidos pelo usuário
        // String de preparação
        $stmt = $conn->prepare("INSERT INTO Animais
        VALUES (default, ?, ?, ?, ?, ?, ?, ?, ?, 'ativo')");
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("ssssssss", $_SESSION['idCliente'], $nome, $dataNasc, $espec, $raca, $peso, $cor, $hoje);
        // Executa o sql
        $stmt->execute();
    
        $_SESSION['msgCadAnimaisFunParaCli'] = "Animal Cadastrado com successo";
    }

} catch (Exception $e) {
    $_SESSION['msgCadAnimaisFunParaCli'] = "Animal Não Cadastrado";
    header("Location: " . $cadAnimalParaClienteRoute);
}
header("Location: " . $cadAnimalParaClienteRoute);
