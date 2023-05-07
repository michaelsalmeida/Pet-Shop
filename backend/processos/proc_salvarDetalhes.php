<?php
include_once("../../rotas.php");
include_once($connRoute);

// descrição inserida
$desc = $_POST['descricao'];

// ID do agendamento
$id = $_POST['ide'];

// comando sql para dar update no agendamento para inserir a descrição 
$stmt = $conn->prepare("UPDATE Agendamentos
        set descricao = ?
        where pk_Agendamento = ?");

// adicionando as variáveis ao comando sql
$stmt->bind_param("ss", $desc, $id);

// executando o comando sql
$stmt->execute();


if (mysqli_affected_rows($conn) > 0) { // caso o update der certo, exibe um aviso na tela sobre o sucesso da inserção
  $_SESSION['msgDesc'] = 'Descrição adicionada com sucesso';
  header('location: ' . $agendamentoFunRoute);
} else { // caso der errado, exibe um aviso de que deu errado a inserçã oda descrição
  $_SESSION['msgDesc'] = 'Erro ao adicionar a descrição';
  header('location: ' . $agendamentoFunRoute);
}
