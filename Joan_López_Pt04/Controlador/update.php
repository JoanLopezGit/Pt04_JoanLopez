<?php 
require_once("../Model/Model.php");
require_once("../Controlador/session.php");

function validarDades($article,$idArticle){
    $errors="";
    if(empty($article)){
        $errors.="Article buit <br>";
    }if(empty($idArticle)){$errors.="Omple el número de l'article <br>";
    }
    return $errors;

}
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    $article = netejaDades($_POST["article"]);
    $idArticle = netejaDades($_POST["id_article"]);


    $errors=validarDades($article,$idArticle);
    $msg_confirm="";

    if($errors==""){
        
        if(conectarArticleUser($idArticle)){
            try{updateArticle($idArticle,$article);
                $msg_confirm.="<br> L'article s'ha modificat correctament";}
            catch(PDOException $e){
                $errors.="Connection issue";
            }
        }else{
            $errors.="No tens permisos per modificar aquest article";
        }
    }

}
require_once("../Vista/update.vista.php");

?>