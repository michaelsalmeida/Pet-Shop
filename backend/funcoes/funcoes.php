<?php
    function loged() {
        session_start();
        // Verifica se o usuário está logado
        if (isset($_SESSION['tipo'])) {
            return isset($_SESSION['loggedinFun']) && $_SESSION['loggedinFun'];
        } else {
            return isset($_SESSION['loggedinCli']) && $_SESSION['loggedinCli'];
        }
    }

    function logoff() {
        session_start();
        // Desloga o usuário
        if (isset($_SESSION['tipo'])) {
            unset($_SESSION['loggedinFun']);
            unset($_SESSION['idFun']);
            unset($_SESSION['nome']);
            unset($_SESSION['tipo']);
        } else {
            unset($_SESSION['loggedinCli']);
            unset($_SESSION['idCli']);
        }
    }

    function gerarTabelaAni() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        // String de preparação
        $stmt = $conn->prepare("SELECT nome, data_nascimento, raca, peso, pk_Animal FROM Animais WHERE fk_Cliente = ?");
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("s", $_SESSION['idCli']);
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        // String que será retornada na tabela
        $tabela = "<tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Raça</th>
            <th>Peso</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>";
        
        if (mysqli_num_rows($resultado) == 0) {
            $tabela = $tabela . "
            <tr>
                <td colspan=4>Não há animais cadastrados</td>
            </tr>
            ";
        } else {
            // Pega cada linha da query e monta as linhas da tabela
            foreach($resultado->fetch_all() as $row) {
                // Formata a data
                $data = date('d/m/Y', strtotime($row[1]));
                $tabela = $tabela .
                "<tr>
                    <td>$row[0]</td>
                    <td>$data</td>
                    <td>$row[2]</td>
                    <td>$row[3] Kg</td>
                    <td><a href='http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Pet-Shop/pages/cliente/altAnimal.php?id="
                    . $row[4] ."'>Alterar</a></td>
                    <td><a href='http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Pet-Shop/backend/processos/proc_excAnimal.php?id="
                    . $row[4] ."'>Excluir</a></td>
                </tr>";
            }
        }

        $retornar = array('animais', $tabela);
        return json_encode($retornar);
    }

    function altAnimal() {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');
        // String de preparação
        $stmt = $conn->prepare("SELECT nome, data_nascimento, especie, raca, peso, cor FROM Animais WHERE pk_Animal = ?");
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("s", $_GET['idAni']);
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();
        $data = $resultado->fetch_all()[0];

        header('Content-Type: application/json');
        return json_encode($data);
    }

    function gerarTabelaAgenCli() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        // String de preparação
        $stmt = $conn->prepare("SELECT Funcionarios.nome, data_agendamento,
        horario_agendamento, Animais.nome, Agendamentos.tipo, `status`, pk_Agendamento from Agendamentos
            inner join Animais
            on Agendamentos.fk_Animal = Animais.pk_Animal
            inner join Clientes
            on Animais.fk_Cliente = Clientes.pk_Cliente
            inner join Funcionarios
            on Agendamentos.fk_Funcionario = Funcionarios.pk_Funcionario
            Where pk_Cliente = ?");
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("s", $_SESSION['idCli']);
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        // String que será retornada na tabela
        $tabela = "<tr>
            <th>Profissional</th>
            <th>Data Agendamento</th>
            <th>Horário do agendamento</th>
            <th>Nome do animal</th>
            <th>Tipo</th>
            <th>Detalhes</th>
            <th>Status</th>
        </tr>";
        
        if (mysqli_num_rows($resultado) == 0) {
            $tabela = $tabela . "
            <tr>
                <td colspan=7>Não há agendamentos cadastrados</td>
            </tr>
            ";
        } else {
            // Pega cada linha da query e monta as linhas da tabela
            foreach($resultado->fetch_all() as $row) {
                // Formata a data
                $data = date('d/m/Y', strtotime($row[1]));
                $botao = "";

                if ($row[5] == "Marcado") {
                    $botao = "<button onclick='activeModal($row[6],". '"Cancelar"'.")'>Cancelar</button>";
                } elseif ($row[5] == "Concluido") {
                    $botao = "<button onclick='activeModal($row[6],". '"Detalhes"'.")'>Detalhes</button>";
                }

                $tabela = $tabela .
                "<tr>
                    <td>$row[0]</td>
                    <td>$data</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                    <td>$botao</td>
                    <td>$row[5]</td>
                </tr>";
            }
        }

        $retornar = array("agendamentos", $tabela);
        return json_encode($retornar);
    }

    function checkAnimais() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        $stmt = $conn->prepare("Select pk_Animal, nome from Animais where fk_Cliente = ?");
        $stmt->bind_param("s", $_SESSION['idCli']);
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        $tabela = "<option value='0' disabled selected hidden>Selecione um animal</option>";

        foreach($resultado->fetch_all() as $row){
            $tabela = $tabela . "<option value='$row[0]'>$row[1]</option>";
        }

        $retornar = array("animais", $tabela);
        return json_encode($retornar);
    }

    function gerarTabelaFazAgenCli() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        // String de preparação
        $stmt = $conn->prepare("SELECT Funcionarios.nome, data_agendamento,
        horario_agendamento, pk_Agendamento from Agendamentos
            inner join Funcionarios
            on Agendamentos.fk_Funcionario = Funcionarios.pk_Funcionario
            Where `status` = 'Disponivel' AND data_agendamento = ? AND tipo = ?");
        
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("ss", $_GET['data'], $_GET['tipo']);
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        // String que será retornada na tabela
        $tabela = "<tr>
            <th>Profissional</th>
            <th>Data Agendamento</th>
            <th>Horário do agendamento</th>
            <th>Agendar</th>
        </tr>";
        
        if (mysqli_num_rows($resultado) == 0) {
            $tabela = $tabela . "
            <tr>
                <td colspan=7>Não há agendamentos cadastrados</td>
            </tr>
            ";
        } else {
            // Pega cada linha da query e monta as linhas da tabela
            foreach($resultado->fetch_all() as $row) {
                // Formata a data
                $data = date('d/m/Y', strtotime($row[1]));
                $tabela = $tabela .
                "<tr>
                    <td>$row[0]</td>
                    <td>$data</td>
                    <td>$row[2]</td>
                    <td><button type='button' onclick='executeFunctions(". '"fazAgendamentoCli",' . $row[3] . ")'>Agendar</button></td>
                </tr>";
            }
        }

        $retornar = array("fazAgend", $tabela);
        return json_encode($retornar);
    }

    function fazAgendamentoCli() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');
        
        if ($_GET['idAni'] != 0) {
            try {
                $stmt = $conn->prepare("UPDATE Agendamentos SET fk_Animal = ?, `status` = 'Marcado' WHERE pk_Agendamento = ?");
                $stmt->bind_param("ss", $_GET['idAni'], $_GET['idAgen']);
                // Executa o sql
                $stmt->execute();
    
                $_SESSION['msgAgendamentoCli'] = "Agendamento Realizado";
                return "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Pet-Shop/pages/cliente/agendamentosCli.php";
                // return "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/pages/cliente/agendamentosCli.php";
            } catch (Exception $e) {
                $_SESSION['msgFazAgendamento'] = "Error: ". $e->getMessage();
                return "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Pet-Shop/pages/cliente/fazerAgendamentoCli.php";
                // return "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/pages/cliente/fazerAgendamentoCli.php";
            }
        } else {
            $_SESSION['msgFazAgendamento'] = "Selecione um animal!";
            return "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Pet-Shop/pages/cliente/fazerAgendamentoCli.php";
            // return "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/pages/cliente/fazerAgendamentoCli.php";
        }
    }

    function gerarTabelaAgenFun() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        if ($_SESSION['tipo'] == 'Veterinario' || $_SESSION['tipo'] == 'Esteticista'){

            // String de preparação
            $stmt = $conn->prepare("SELECT Funcionarios.nome, data_agendamento, horario_agendamento, Animais.nome, Clientes.nome, `status`, pk_Agendamento from Agendamentos
            left join Animais
            on Agendamentos.fk_Animal = Animais.pk_Animal
            left join Clientes
            on Animais.fk_Cliente = Clientes.pk_Cliente
            inner join Funcionarios
            on Agendamentos.fk_Funcionario = Funcionarios.pk_Funcionario
            Where fk_Funcionario = ?
            and Funcionarios.nome like ?");

            $pesquisar = "%" . $_GET['pesq'] . "%";
             // Substituição da string preparada pelos valores corretos
            $stmt->bind_param("ss", $_SESSION['idFun'], $pesquisar);

        } else {
            $stmt = $conn->prepare("SELECT Funcionarios.nome, data_agendamento, horario_agendamento, Animais.nome, Clientes.nome, `status`, pk_Agendamento from Agendamentos
            left join Animais
            on Agendamentos.fk_Animal = Animais.pk_Animal
            left join Clientes
            on Animais.fk_Cliente = Clientes.pk_Cliente
            inner join Funcionarios
            on Agendamentos.fk_Funcionario = Funcionarios.pk_Funcionario
            where Funcionarios.nome like ?");

            $pesquisar = "%" . $_GET['pesq'] . "%";
            $stmt->bind_param("s", $pesquisar);
        }
 
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        // String que será retornada na tabela
        $tabela =
        "<tr>
            <th>Profissional</th>
            <th>Data Agendamento</th>
            <th>Horário do agendamento</th>
            <th>Nome do animal</th>
            <th>Nome do dono</th>
            <th>Detalhes</th>
            <th>Status</th>
        </tr>";
        
        // Pega cada linha da query e monta as linhas da tabela
        foreach($resultado->fetch_all() as $row) {
            // Formata a data
            $det = "<button onclick='finalizarConsulta(finalizarConsul, $row[6])'>Finalizar</button>";
            
            if ($row[5] == "Concluido"){
                $det = "<button onclick='activeModalDetalhesFun($row[6], $row[3], $row[4])'>Detalhes</button>";
            }

            $data = date('d/m/Y', strtotime($row[1]));
            $tabela = $tabela .
            "<tr>
                <td>$row[0]</td>
                <td>$data</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$det</td>
                <td>$row[5]</td>
            </tr>";
        }

        $retornar = array('tabela', $tabela);
        return json_encode($retornar);
    }
    
    function profissionais(){
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        $prof = $_GET['servico'];

        $stmt = $conn->prepare("Select nome, pk_Funcionario from Funcionarios where profissao = ?");

        $stmt->bind_param("s", $prof);

        // Executa o sql
        $stmt->execute();

        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        $tabela = "<option value='' disabled selected hidden>Selecione um funcionário</option>";

        foreach($resultado->fetch_all() as $row){
            $tabela = $tabela . "<option value='$row[0]'>$row[0]</option>";
        }

        $retornar = array('profissionais', $tabela);
        return json_encode($retornar);
    }

    function getDesc() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        $id = $_GET['id'];
        $stmt = $conn->prepare("Select descricao from Agendamentos where pk_Agendamento = ?");
        $stmt->bind_param("s", $id);
        // Executa o sql
        $stmt->execute();

        $retornar = $stmt->get_result();
        return $retornar->fetch_all()[0][0];
    }


    function gerarTabelaDeleteFun() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        // String de preparação
        $stmt = $conn->prepare("SELECT nome, cpf, profissao from Funcionarios
        where nome like ?
        and profissao != 'admin'");

        $pesquisar = "%" . $_GET['pesq'] . "%";

        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("s", $pesquisar);
 
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        // String que será retornada na tabela
        $tabela =
        "<tr>
            <th>Nome</th>
            <th>Cpf</th>
            <th>Profissão</th>
            <th>Excluir</th>
        </tr>";

        $cont = 1;
        
        // Pega cada linha da query e monta as linhas da tabela
        foreach($resultado->fetch_all() as $row) {
            $tabela = $tabela .
            "<tr>
                <td id='nome$cont'>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td><button onclick='apagarFun(`apagarFun`, `$row[0]`)'>Excluir</td>
            </tr>";
            
            $cont += 1;
        }

        $retornar = array('tabela', $tabela);
        return json_encode($retornar);
    }

    function apagarFuncionario(){
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');

        $nome = $_GET['nome'];
        
        $stmt = $conn->prepare("DELETE from Funcionarios where nome = ?");

        $stmt->bind_param("s", $nome);

        $stmt->execute();


    }
    
    function finalizarConsul(){

    }