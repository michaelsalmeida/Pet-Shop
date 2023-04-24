<?php
$host = "teste1232-server.mysql.database.azure.com";
$user = "tgtrcuwqye";
$pass = '571W5M4O7S23FJA0$';
$dbname = "teste1232-database";

// Criar a conexao com o Banco de Dados
try {
    $conn = mysqli_connect($host, $user, $pass, $dbname);
} catch (Exception $e) {
    // Handle exception
    echo 'Caught exception: ', $e->getMessage(), "<br>";
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}
