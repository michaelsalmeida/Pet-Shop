<?php
$host = "hatunabatata.mysql.database.azure.com";
$user = "admin1";
$pass = 'S#nai@115';
$dbname = "petshop";

// Criar a conexao com o Banco de Dados
try {
    $conn = mysqli_connect($host, $user, $pass, $dbname);
} catch (Exception $e) {
    // Handle exception
    echo 'Caught exception: ', $e->getMessage(), "<br>";
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}
