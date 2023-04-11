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

    function gerarTabela() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        // String de preparação
        $stmt = $conn->prepare("SELECT nome, data_nascimento, raca, peso FROM Animais WHERE fk_Cliente = ?");
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("s", $_SESSION['id']);
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        // String que será retornada na tabela
        $retornar =
        "<tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Raça</th>
            <th>Peso</th>
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
                <td>$row[3] Kg</td>
            </tr>";
        }
        return $retornar;
    }



    function gerarTabelaFun() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');
        
        if (isset($_SESSION['tipo'])){

            $stmt = $conn->prepare("SELECT data_agendamento, horario_agendamento, Animais.nome, Clientes.nome, `status` from Agendamentos
            inner join Animais
            on Agendamentos.fk_Animal = Animais.pk_Animal
            inner join Clientes
            on Animais.fk_Cliente = Clientes.pk_Cliente");

        } else {
            $stmt = $conn->prepare("SELECT nome, data_nascimento, raca, peso FROM Animais WHERE fk_Cliente = ?");
        }
        // String de preparação
        
        // Substituição da string preparada pelos valores corretos
        $stmt->bind_param("s", $_SESSION['id']);
        // Executa o sql
        $stmt->execute();
        // Pega o resultado do banco
        $resultado = $stmt->get_result();

        // String que será retornada na tabela
        $retornar =
        "<tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Raça</th>
            <th>Peso</th>
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
                <td>$row[3] Kg</td>
            </tr>";
        }
        return $retornar;
    }
