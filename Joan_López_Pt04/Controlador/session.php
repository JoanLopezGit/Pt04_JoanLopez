<?php

/**
 * Inicia una nova sessió.
 *
 * @param string $usuari L'usuari de la sessió.
 * @param string $nom El nom associat a l'usuari.
 */
function startSession($usuari,$nom){
    session_start();
    $_SESSION["newsession"]=$usuari;
    $_SESSION["nom"]=$nom;
    header("Location: ../Vista/index.vista.php"); // Redirigeix a la pàgina d'inici
    exit();
}

/**
 * Neteja les dades de possibles caràcters especials.
 *
 * @param string $data Les dades a netejar.
 *
 * @return string Les dades netejades.
 */
function netejaDades($data) {
    $data = trim($data); // Elimina espais en blanc al principi i final
    $data = stripslashes($data); // Elimina les barres invertides
    $data = htmlspecialchars($data); // Converteix caràcters especials en entitats HTML
    return $data; // Retorna les dades netejades
}

?>
