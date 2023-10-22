<?php 
require_once("../Model/Model.php");
require_once("../Controlador/session.php");

function validarDades($nom='',$correu="",$password="",$confirm_password=""){
    $errors="";
     if (!preg_match("/^[a-zA-Z-' ]*$/", $nom)) {
        $errors .= "El nom d'usuari és incorrecte <br>";
    }
else if (!filter_var($correu, FILTER_VALIDATE_EMAIL)) {
        $errors.= "L'adreça electrònica introduida és incorrecte <br>";
      }
  else  if($password!=$confirm_password){
        $errors.="Les contrasenyes introduides no coincideixen <br>";
    }
    return $errors;

}

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $nom = netejaDades($_POST["nom"]);
    $correu = netejaDades($_POST["correu"]);
    $password = netejaDades($_POST["password"]);
    $confirm_password = netejaDades($_POST["confirm_password"]);
    $errors=validarDades($nom,$correu,$password,$confirm_password);
    $msg_confirm="";

    if($errors==""){
        $encrypt_pwd = password_hash($password,PASSWORD_BCRYPT);
        try{crearUsuari($nom,$correu,$encrypt_pwd);
            $msg_confirm.="<br> L'usuari s'ha afegit correctament";
            startSession($correu,$nom);}
        catch(PDOException $e){
            $errors.="L'usuari ja existeix";
        }    
    }
}
require_once("../Vista/register.vista.php");
?>