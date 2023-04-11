<?php
    function loged() {
        session_start();
        return isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
    }

    function logoff() {
        session_start();
        unset($_SESSION['loggedin']);
    }

    function gerarTabela() {
        session_start();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/Pet-Shop/backend/conexao.php');
        // require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/conexao.php');

        $stmt = $conn->prepare("SELECT nome, data_nascimento, raca, peso FROM Animais WHERE fk_Cliente = ?");
        $stmt->bind_param("s", $_SESSION['id']);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $retornar =
        "<tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Raça</th>
            <th>Peso</th>
        </tr>";
        
        foreach($resultado->fetch_all() as $row) {
            $data = date('d/m/Y', strtotime($row[1]));
            $retornar = $retornar .
            "<tr>
                <td>$row[0]</td>
                <td>$data</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
            </tr>";
        }
        return $retornar;
    }
