<?php
require_once("../Model/Model.php");
require_once("../Controlador/session.php");

function validarDades($correu, $password){
    $errors = "";

    if (!filter_var($correu, FILTER_VALIDATE_EMAIL)) {
        $errors .= "L'adreça electrònica proporcionada és incorrecte <br>";
    }
    if (empty($password)) {
        $errors .= "La contrasenya és buida.<br>";
    }
    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correu = netejaDades($_POST["correu"]);
    $password = netejaDades($_POST["password"]);
    $errors = validarDades($correu, $password);
    $msg_confirm = "";

    if (empty($errors)) {
        try {
            $nom = userExists($correu);

            try {
                if (comprovarContrasenya($correu, $password)) {
                    startSession($correu, $nom);
                } else {
                    $errors .= "La contrasenya no és correcte.<br>";
                }
            } catch (Exception $e) {
                $errors .= "La contrasenya no és correcte.<br>";
            }
        } catch (Exception $e) {
            $errors .= "Hi ha hagut un problema! No hem pogut trobar un compte amb aquesta adreça electrònica.<br>";
        }
    }
}

require_once("../Vista/login.vista.php");
?>