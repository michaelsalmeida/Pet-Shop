<?php
$host = "pet-shop-server.mysql.database.azure.com";
$user = "xjijfzgthm";
$pass = '8FS407WK3W416425$';
$dbname = "pet-shop-database";

// Criar a conexao com o Banco de Dados
try {
    $conn = mysqli_connect($host, $user, $pass, $dbname);
} catch (Exception $e) {
    // Handle exception
    echo 'Caught exception: ', $e->getMessage(), "<br>";
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}
