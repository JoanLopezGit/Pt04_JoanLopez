<?php

function startSession($usuari,$nom){
    session_start();
    $_SESSION["newsession"]=$usuari;
    $_SESSION["nom"]=$nom;
    header("Location: ../Vista/index.vista.php");
                exit();

}
function netejaDades($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>