<?php 
require_once("../Model/Model.php"); // Inclou el fitxer Model.php
require_once("../Controlador/session.php"); // Requereix l'ús de la sessió

/**
 * Funció per validar l'ID de l'article.
 *
 * @param int $idArticle L'ID de l'article a validar.
 *
 * @return string Missatge d'error, si hi ha algun.
 */
function validarDades($idArticle){
    $errors="";
    if(empty($idArticle)){
        $errors.="Omple el número de l'article <br>";
    }
    return $errors;
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $idArticle = netejaDades($_POST["id_article"]); // Neteja les dades de l'ID de l'article

    // Validació de dades
    $errors=validarDades($idArticle,$article=null);

    $msg_confirm=""; 

    if($errors==""){
       
        if(conectarArticleUser($idArticle)){ // Intenta connectar l'article amb l'usuari
            try{
                deleteArticle($idArticle); // Intenta esborrar l'article
                $msg_confirm.="<br> Article Esborrat"; // Missatge de confirmació

            } catch(PDOException $e){

                // Error de connexió
                $errors.="Connection issue";
            }
        }else{
            $errors.="No es pot accedir al article."; // Error si no es pot accedir a l'article
        }
    }
}

require_once("../Vista/delete.vista.php"); // Inclou el fitxer delete.vista.php
?>
