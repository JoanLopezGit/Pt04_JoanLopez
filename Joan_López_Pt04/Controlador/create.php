<?php 
require_once("../Model/Model.php");
require_once("../Controlador/session.php");

function validarDades($article){
    $errors="";
    if(empty($article)){
        $errors.="Omple el número de l'article <br>";
    }
    return $errors;
  
}
if ($_SERVER["REQUEST_METHOD"]=="POST"){
 
    $article = netejaDades($_POST["article"]);

    $errors=validarDades($article,$idArticle=null);
    $msg_confirm="";

    if($errors==""){
        
        try{crearArticle($article);
            $msg_confirm.="<br> S'ha afegit l'article correctament";}
        catch(PDOException $e){
            $errors.="Connection issue";
        }
    }
}

require_once("../Vista/create.vista.php");

?>