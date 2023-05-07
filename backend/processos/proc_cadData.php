<?php
include_once('../../rotas.php');
include_once($connRoute);

$_SESSION['msgCadDataErro'] = false;

// data atual do sistema.
$data_atual = date("Y-m-d");

// data que o funcionário escolheu.
$data = $_POST['data'];

// hora atual do sistema.
$hora_atual = date("H:i");

// hora que o funcionário escolhe.
$hora = $_POST['hora'];

// serviço selecionado pelo funcionário.
$servico = $_POST['servicos'];

// profissional escolhido pelo
$profissional = $_POST['profissionais'];

// comando sql
$stmt1 = $conn->prepare("SELECT pk_Funcionario from Funcionarios where nome = ?");

$stmt1->bind_param("s", $profissional);

$stmt1->execute();

$result = $stmt1->get_result();

$idFun = $result->fetch_row();


if (strtotime($data) < strtotime($data_atual)){ // verifica se a data escolhida está disponível para ser usada
    $_SESSION['msgCadDataErro'] = "Data Indisponível";
    header("location: " . $cadastradaDatasRoute);
} elseif (strtotime($data) == strtotime($data_atual)){ // se a data for a mesma da atual aqui verifica se a hora ainda não passou
    if (strtotime($hora) < strtotime($hora_atual)){
        
        $_SESSION['msgCadDataErro'] = "Horário Indisponível";
        header("location: " . $cadastradaDatasRoute);

    } elseif (strtotime($hora) < strtotime('08:00:00') || strtotime($hora) > strtotime('20:00:00')) {
        $_SESSION['msgCadDataErro'] = "Fora do horário comercial";
        header("location: " . $cadastradaDatasRoute);

    } else { 
        // formata a hora para ser inserida no banco
        $hora_formatada = date("H:i:s", strtotime($hora));
        // comando de inserção ao banco
        $stmt2 = $conn -> prepare ("SELECT pk_Funcionario, data_agendamento, horario_agendamento
        from Funcionarios 
        inner join Agendamentos
        on Funcionarios.pk_Funcionario = Agendamentos.fk_Funcionario
        where nome = ? ");

        $stmt2 -> bind_param("s", $profissional);

        $stmt2 -> execute();

        $result2 = $stmt2 -> get_result();

        // variável para verificar se a hora escolhida já foi cadastrada para o funcionário anteriormente [0 = não / 1 = sim]
        $correto = 0;

        foreach ($result2->fetch_all() as $row){ // loop para verificar se o médico ja tem consulta marcada para aquela data e horário escolhido
            if($row[0] == $idFun[0] && $row[1] == $data && $row[2] == $hora_formatada){
                $correto = 1;
            }
        }

        if ($correto == 1){ // se a data  e horário já estiver disponível, um aviso é acionado ao usuário
            $_SESSION['msgCadDataErro'] = "Data já cadastrada";
            header("location: " . $cadastradaDatasRoute);
        } else { // se não, a iserção será realizada no banco

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
} else { // se a data nao tiver passado ou nao for igual a de hoje
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
    if ($correto == 1){// se a data  e horário já estiver disponível, um aviso é acionado ao usuário

        $_SESSION['msgCadDataErro'] = "Data já cadastrada";
        header("location: " . $cadastradaDatasRoute);

    } elseif(strtotime($hora) < strtotime('08:00:00') || strtotime($hora) > strtotime('20:00:00')){
        echo strtotime($hora);
        $_SESSION['msgCadDataErro'] = "Fora do horário comercial";
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
