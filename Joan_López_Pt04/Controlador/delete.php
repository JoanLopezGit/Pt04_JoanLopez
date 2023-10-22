<?php 
require_once("../Model/Model.php");
require_once("../Controlador/session.php");

function validarDades($idArticle){
    $errors="";
    if(empty($idArticle)){
        $errors.="Omple el número de l'article <br>";
    }
    return $errors;
}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $idArticle = netejaDades($_POST["id_article"]);

    $errors=validarDades($idArticle,$article=null);
    $msg_confirm="";

    if($errors==""){
       
        if(conectarArticleUser($idArticle)){
            try{deleteArticle($idArticle);
                $msg_confirm.="<br> Article Esborrat";}
            catch(PDOException $e){
                $errors.="Connection issue";
            }
        }else{
            $errors.="No es pot accedir al article.";
        }
    }
}

require_once("../Vista/delete.vista.php");

?>