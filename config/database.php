<?php
$host = 'localhost';
$dbname = 'diogoj03_cedup';
$username = 'diogoj03_davi'; 
$password = 'n.*if8btfRl(';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
