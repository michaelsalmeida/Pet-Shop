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
        } else {
            unset($_SESSION['loggedinCli']);
            unset($_SESSION['idCli']);
        }
    }

    function gerarTabelaAni() {
        session_start();
        include_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/rotas.php');
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
        $retornar = "<tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Raça</th>
            <th>Peso</th>
            <th></th>
        </tr>";
        
        if (mysqli_num_rows($resultado) == 0) {
            $retornar = $retornar . "
            <tr>
                <td colspan=4>Não há animais cadastrados</td>
            </tr>
            ";
        } else {
            // Pega cada linha da query e monta as linhas da tabela
            foreach($resultado->fetch_all() as $row) {
                // Formata a data
                $data = date('d/m/Y', strtotime($row[1]));
                $retornar = $retornar .
                "<tr>
                    <td>$row[0]</td>
                    <td>$data</td>
                    <td>$row[2]</td>
                    <td>$row[3] Kg</td>
                    <td><a href='http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Pet-Shop/backend/processos/proc_excAnimal.php?id="
                    . $row[4] ."'>Excluir</a></td>
                </tr>";
            }
        }
        return $retornar;
    }

    function gerarTabelaAgen() {
        session_start();
        include_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/rotas.php');
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        // String de preparação
        $stmt = $conn->prepare("SELECT nome, data_nascimento, raca, peso, pk_Animal 
        FROM Agendamentos WHERE fk_Cliente = ?");
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("s", $_SESSION['idCli']);
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        // String que será retornada na tabela
        $retornar = "<tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Raça</th>
            <th>Peso</th>
            <th></th>
        </tr>";
        
        if (mysqli_num_rows($resultado) == 0) {
            $retornar = $retornar . "
            <tr>
                <td colspan=4>Não há animais cadastrados</td>
            </tr>
            ";
        } else {
            // Pega cada linha da query e monta as linhas da tabela
            foreach($resultado->fetch_all() as $row) {
                // Formata a data
                $data = date('d/m/Y', strtotime($row[1]));
                $retornar = $retornar .
                "<tr>
                    <td>$row[0]</td>
                    <td>$data</td>
                    <td>$row[2]</td>
                    <td>$row[3] Kg</td>
                    <td><a href='http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/Pet-Shop/backend/processos/proc_excAnimal.php?id="
                    . $row[4] ."'>Excluir</a></td>
                </tr>";
            }
        }
        return $retornar;
    }

    function gerarTabelaAgenFun() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');
        
        if ($_SESSION['tipo'] == 'Veterinario' || $_SESSION['tipo'] == 'Esteticista'){

            // String de preparação
            $stmt = $conn->prepare("SELECT Funcionarios.nome, data_agendamento, horario_agendamento, Animais.nome, Clientes.nome, `status` from Agendamentos
            inner join Animais
            on Agendamentos.fk_Animal = Animais.pk_Animal
            inner join Clientes
            on Animais.fk_Cliente = Clientes.pk_Cliente
            inner join Funcionarios
            on Agendamentos.fk_Funcionario = Funcionarios.pk_Funcionario
            Where fk_Funcionario = ?");

             // Substituição da string preparada pelos valores corretos
            $stmt->bind_param("s", $_SESSION['idFun']);

        } else {
            $stmt = $conn->prepare("SELECT Funcionarios.nome, data_agendamento, horario_agendamento, Animais.nome, Clientes.nome, `status` from Agendamentos
            inner join Animais
            on Agendamentos.fk_Animal = Animais.pk_Animal
            inner join Clientes
            on Animais.fk_Cliente = Clientes.pk_Cliente
            inner join Funcionarios
            on Agendamentos.fk_Funcionario = Funcionarios.pk_Funcionario");
        }
 
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        // String que será retornada na tabela
        $retornar =
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
            $data = date('d/m/Y', strtotime($row[1]));
            $retornar = $retornar .
            "<tr>
                <td>$row[0]</td>
                <td>$data</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>Detalhes</td>
                <td>$row[5]</td>
            </tr>";
        }
        return $retornar;
    }

