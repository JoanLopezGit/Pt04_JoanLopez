<?php

require 'index.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar l'usuari a la base de dades
    $stmt = $conn->prepare("SELECT * FROM usuaris WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Iniciar sessió si les credencials són correctes
        session_start();
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
    } else {
        echo "Credencials incorrectes. Torna a intentar-ho.";
    }
}

?>
