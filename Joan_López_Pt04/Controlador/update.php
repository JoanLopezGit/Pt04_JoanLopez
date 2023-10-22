<?php 
/**
 * Joan López Torrento
 */

require_once("../Model/Model.php"); // Inclou el fitxer Model.php
require_once("../Controlador/session.php"); // Requereix l'ús de la sessió

/**
 * Funció per validar les dades d'un article i l'ID de l'article.
 *
 * @param string $article El número de l'article a validar.
 * @param int $idArticle L'ID de l'article a validar.
 *
 * @return string Missatge d'error, si hi ha algun.
 */
function validarDades($article,$idArticle){
    $errors="";

    if(empty($article)){
        $errors.="Article buit <br>";
    }

    if(empty($idArticle)){
        $errors.="Omple el número de l'article <br>";
    }

    return $errors;
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $article = netejaDades($_POST["article"]); // Neteja les dades de l'article
    $idArticle = netejaDades($_POST["id_article"]); // Neteja les dades de l'ID de l'article

    // Validació de dades
    $errors=validarDades($article,$idArticle);
    $msg_confirm=""; 

    if($errors==""){
        
        if(conectarArticleUser($idArticle)){ // Intenta connectar l'article amb l'usuari
            try{
                updateArticle($idArticle,$article); // Intenta actualitzar l'article
                $msg_confirm.="<br> L'article s'ha modificat correctament"; // Missatge de confirmació

            } catch(PDOException $e){

                // Error de connexió
                $errors.="Connection issue";
            }
        }else{
            $errors.="No tens permisos per modificar aquest article"; // Error si no es tenen permisos
        }
    }
}

require_once("../Vista/update.vista.php"); // Inclou el fitxer update.vista.php
?>
