
<?php 
/**
 * Joan López Torrento
 */
require_once("../Model/Model.php"); // Inclou el fitxer Model.php
require_once("../Controlador/session.php"); // Requereix l'ús de la sessió

/**
 * Funció per validar les dades d'un article.
 *
 * @param string $article El número de l'article a validar.
 *
 * @return string Missatge d'error, si hi ha algun.
 */
function validarDades($article){
    $errors="";

    if(empty($article)){
        $errors.="Ompli el número de l'article <br>";
    }

    return $errors;
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $article = netejaDades($_POST["article"]); // Neteja les dades de l'article

    // Validació de dades
    $errors=validarDades($article,$idArticle=null);

    $msg_confirm="";

    if($errors==""){
        try{
            crearArticle($article); // Intenta crear l'article

            // Confirmació de l'acció
            $msg_confirm.="<br> S'ha afegit l'article correctament";

        } catch(PDOException $e){

            // Error de connexió
            $errors.="Issue de connexió";
        }
    }
}

require_once("../Vista/create.vista.php"); // Inclou el fitxer create.vista.php
?>
