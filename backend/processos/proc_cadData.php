<?php
session_start();
include_once('../../rotas.php');
include_once($connRoute);

$data = $_POST['data'];
$hora = $_POST['hora'];

$servico = $_POST['servicos'];
$profissional = $_POST['profissionais'];

$stmt1 = $conn->prepare("SELECT pk_Funcionario from Funcionarios where nome = ?");

$stmt1->bind_param("s", $profissional);

$stmt1->execute();
$result = $stmt1->get_result();

$idFun = $result->fetch_row();

$stmt = $conn->prepare("INSERT into Agendamentos (pk_Agendamento, fk_Funcionario, data_agendamento, horario_agendamento, tipo) VALUES (default, ?, ?, ?, ?)");
$stmt->bind_param("ssss", $idFun[0], $data, $hora, $servico);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $_SESSION['msgCadData'] = "<p style='color: green;'>DATA CADASTRADA COM SUCESSO</p>";
    header("location: " . $agendamentoFunRoute);
} else {
    $_SESSION['msgTelaCadData'] = "<p style='color: red;'>DATA NÃO CADASTRADA</p>";
    header("location: " . $cadastradaDatasRoute);
}
