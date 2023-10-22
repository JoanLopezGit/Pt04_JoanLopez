<?php
require("../Controlador/env.php");

function updateArticle($idArticle, $article) {
    $connection = obrirBDD();
    $sentencia = "UPDATE articles SET article = :article WHERE id = :id;";
    $array = array(':article' => $article, ':id' => $idArticle);
    $result = executarSentencia($sentencia, $array, $connection);
    $connection = tancarBDD($connection);
}

function deleteArticle($idArticle) {
    $connection = obrirBDD();
    $sentencia = "DELETE FROM articles WHERE id=:id";
    $array = array(':id' => $idArticle);
    $result = executarSentencia($sentencia, $array, $connection);
    $connection = tancarBDD($connection);
}

function conectarArticleUser($idArticle) {
    $connection = obrirBDD();
    session_start();
    $_SESSION['newsession'];
    if(!is_null($connection)){
        $sentencia1 = "SELECT id FROM usuaris WHERE correu=:correu";
        $array1 = array(':correu' => $_SESSION['newsession']);
        $result1 = executarSentencia($sentencia1, $array1, $connection);

        $sentencia2 = "SELECT COUNT(*) FROM articles WHERE id_usuari=:id_usuari AND id=:id ";
        $array2 = array(':id_usuari' => $result1[0]["id"], ':id' => $idArticle);
        $result2 = executarSentencia($sentencia2, $array2, $connection);

        $connection = tancarBDD($connection);

        if(($result2[0]['COUNT(*)']) == 0){
            return false;
        }

        return true;
    }
}

function crearArticle($article) {
    $connection = obrirBDD();
    session_start();
    $_SESSION['newsession'];
    if(!is_null($connection)){
        $sentencia1 = "SELECT id FROM usuaris WHERE correu=:correu";
        $array1 = array(':correu' => $_SESSION['newsession']);
        $result1 = executarSentencia($sentencia1, $array1, $connection);

        $sentencia2 = "INSERT INTO articles (article, id_usuari) VALUES (:article, :id)";
        $array2 = array(':article' => $article, ':id' => $result1[0]["id"]);

        $result2 = executarSentencia($sentencia2, $array2, $connection);
        $connection = tancarBDD($connection);
    }
}

function executeQuery($query, $params, $connection) {
    $statement = $connection->prepare($query);
    $statement->execute($params);
    return $statement;
}

function tancarBDD($connexio) {
    $connexio = null;
    return $connexio;
}

function comprovarContrasenya($usuari, $password) {
    $connection = obrirBDD();
    if(!is_null($connection)){
        $sentencia = "SELECT contrasenya FROM `usuaris` WHERE correu=:correu;";
        $array = array(':correu' => $usuari);

        $result = executarSentencia($sentencia, $array, $connection);

        if(empty($result)){
            throw new Exception("La contrasenya no es la mateixa");
        }

        if(password_verify($password, $result[0]["contrasenya"])){
            return true;
        }

        $connection = tancarBDD($connection);
    }
}

function userExists($correu) {
    $connection = obrirBDD();
    if(!is_null($connection)){
        $sentencia = "SELECT COUNT(*) FROM `usuaris` WHERE correu = :correu;";
        $array = array(':correu' => $correu);

        $result = executarSentencia($sentencia, $array, $connection);

        if(($result[0]['COUNT(*)']) == 0){
            throw new Exception("L'usuari no existeix a la base de dades.");
        }

        $sentencia = "SELECT nom FROM `usuaris` WHERE correu = :correu;";
        $array = array(':correu' => $correu);

        $result = executarSentencia($sentencia, $array, $connection);

        $connection = tancarBDD($connection);
        return $result[0]['nom'];
    }
}

function crearUsuari($nom, $correu, $password) {
    $connection = obrirBDD();
    if(!is_null($connection)){
        $sentencia = "INSERT INTO usuaris (nom, correu, contrasenya) VALUES (:nom, :correu, :password)";
        $array = array(':nom' => $nom, ':correu' => $correu, ':password' => $password);

        $result = executarSentencia($sentencia, $array, $connection);

        $connection = tancarBDD($connection);
    }
}

function executarSentencia($sentencia, $array, $connexio) {
    $statement = $connexio->prepare($sentencia);
    $statement->execute($array);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function obrirBDD() : ?PDO {
    try {
        $connexio = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
        return $connexio;
    } catch(PDOException $e){
        return null;
    }   
}
?>
