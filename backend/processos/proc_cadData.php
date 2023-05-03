<?php
include_once('../../rotas.php');
include_once($connRoute);

$_SESSION['msgCadDataErro'] = false;

$data_atual = date("Y-m-d");
$data = $_POST['data'];

$hora_atual = date("H:i");
$hora = $_POST['hora'];

$servico = $_POST['servicos'];
$profissional = $_POST['profissionais'];

$stmt1 = $conn->prepare("SELECT pk_Funcionario from Funcionarios where nome = ?");

$stmt1->bind_param("s", $profissional);

$stmt1->execute();

$result = $stmt1->get_result();

$idFun = $result->fetch_row();

if (strtotime($data) < strtotime($data_atual)){
    $_SESSION['msgCadDataErro'] = "Data Indisponível";
    header("location: " . $cadastradaDatasRoute);
} elseif (strtotime($data) == strtotime($data_atual)){
    if (strtotime($hora) < strtotime($hora_atual)){
        $_SESSION['msgCadDataErro'] = "Horário Indisponível";
        $_SESSION['tela'] = 'msgCadDataErro';
    header("location: " . $cadastradaDatasRoute);
    } else {
        $hora_formatada = date("H:i:s", strtotime($hora));
        $stmt2 = $conn -> prepare ("SELECT pk_Funcionario, data_agendamento, horario_agendamento
        from Funcionarios 
        inner join Agendamentos
        on Funcionarios.pk_Funcionario = Agendamentos.fk_Funcionario
        where nome = ? ");

        $stmt2 -> bind_param("s", $profissional);

        $stmt2 -> execute();

        $result2 = $stmt2 -> get_result();

        $correto = 0;

        foreach ($result2->fetch_all() as $row){
            if($row[0] == $idFun[0] && $row[1] == $data && $row[2] == $hora_formatada){
                $correto = 1;
            }
        }

        if ($correto == 1){
            $_SESSION['msgCadDataErro'] = "Data já cadastrada";
            header("location: " . $cadastradaDatasRoute);
        } else {

            $stmt = $conn->prepare("INSERT into Agendamentos (pk_Agendamento, fk_Funcionario, data_agendamento, horario_agendamento, tipo) VALUES (default, ?, ?, ?, ?)");
            $stmt->bind_param("ssss", $idFun[0], $data, $hora, $servico);
            $stmt->execute();
            
            if ($stmt->affected_rows > 0) {
                $_SESSION['msgCadData'] = "Data cadastrada com sucesso";
                header("location: " . $agendamentoFunRoute);
            } else {
                $_SESSION['msgCadDataErro'] = "Data não cadastrada";
                header("location: " . $cadastradaDatasRoute);
            }
        }
    }
} else {
    $hora_formatada = date("H:i:s", strtotime($hora));
    $stmt2 = $conn -> prepare ("SELECT pk_Funcionario, data_agendamento, horario_agendamento
    from Funcionarios 
    inner join Agendamentos
    on Funcionarios.pk_Funcionario = Agendamentos.fk_Funcionario
    where nome = ? ");

    $stmt2 -> bind_param("s", $profissional);

    $stmt2 -> execute();

    $result2 = $stmt2 -> get_result();

    $correto = 0;

    foreach ($result2->fetch_all() as $row){
        if($row[0] == $idFun[0] && $row[1] == $data && $row[2] == $hora_formatada){
            $correto = 1;
            break;
        }
    }
    if ($correto == 1){
        $_SESSION['msgCadDataErro'] = "Data já cadastrada";
        header("location: " . $cadastradaDatasRoute);
    } else {
        $stmt = $conn->prepare("INSERT into Agendamentos (pk_Agendamento, fk_Funcionario, data_agendamento, horario_agendamento, tipo) VALUES (default, ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $idFun[0], $data, $hora, $servico);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $_SESSION['msgCadData'] = "Data cadastrada com sucesso";
            header("location: " . $agendamentoFunRoute);
        } else {
            $_SESSION['msgCadDataErro'] = "Data não cadastrada";
            header("location: " . $cadastradaDatasRoute);
        }
    }
}
