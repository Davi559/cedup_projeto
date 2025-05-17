<?php

require_once 'config/database.php';

$username = 'admin';
$password = 'admin';

$hashed_password = password_hash($password, PASSWORD_DEFAULT);


try {
  
    $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->execute();
    echo "Administrador inserido com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao inserir administrador: " . $e->getMessage();
}
?>
