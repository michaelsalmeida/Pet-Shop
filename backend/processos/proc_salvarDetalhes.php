<?php
include_once("../../rotas.php");
include_once($connRoute);

$desc = $_POST['descricao'];
$id = $_POST['ide'];

$stmt = $conn->prepare("UPDATE Agendamentos
        set descricao = ?
        where pk_Agendamento = ?");

$stmt->bind_param("ss", $desc, $id);

$stmt->execute();

if (mysqli_affected_rows($conn) > 0) {
  $_SESSION['msgDesc'] = 'Descrição adicionada com sucesso';
  // header('location: ' . $agendamentoFunRoute);
} else {
  $_SESSION['msgDesc'] = 'Erro ao adicionar a descrição';
  // header('location: ' . $agendamentoFunRoute);
}
