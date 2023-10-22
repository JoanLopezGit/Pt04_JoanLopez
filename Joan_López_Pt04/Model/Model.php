<?php
/**
 * Joan López Torrento
 */
require("../Controlador/env.php");

/**
 * Actualitza un article en la base de dades.
 *
 * @param int $idArticle L'ID de l'article a actualitzar.
 * @param string $article El contingut actualitzat de l'article.
 */
function updateArticle($idArticle, $article) {
    $connection = obrirBDD();
    $sentencia = "UPDATE articles SET article = :article WHERE id = :id;";
    $array = array(':article' => $article, ':id' => $idArticle);
    $result = executarSentencia($sentencia, $array, $connection);
    $connection = tancarBDD($connection);
}

/**
 * Elimina un article de la base de dades.
 *
 * @param int $idArticle L'ID de l'article a eliminar.
 */
function deleteArticle($idArticle) {
    $connection = obrirBDD();
    $sentencia = "DELETE FROM articles WHERE id=:id";
    $array = array(':id' => $idArticle);
    $result = executarSentencia($sentencia, $array, $connection);
    $connection = tancarBDD($connection);
}

/**
 * Comprova si l'usuari té permisos per accedir a l'article especificat.
 *
 * @param int $idArticle L'ID de l'article.
 *
 * @return bool True si l'usuari té permisos, False altrament.
 */
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

/**
 * Crea un nou article a la base de dades.
 *
 * @param string $article El contingut de l'article a crear.
 */
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

/**
 * Executa una consulta a la base de dades amb paràmetres.
 *
 * @param string $query La consulta SQL.
 * @param array $params Paràmetres per a la consulta.
 * @param PDO $connection Connexió a la base de dades.
 *
 * @return PDOStatement El resultat de la consulta.
 */
function executeQuery($query, $params, $connection) {
    $statement = $connection->prepare($query);
    $statement->execute($params);
    return $statement;
}

/**
 * Tanca la connexió a la base de dades.
 *
 * @param PDO $connexio La connexió a tancar.
 *
 * @return PDO|null La connexió tancada o null si no es va proporcionar una connexió.
 */
function tancarBDD($connexio) {
    $connexio = null;
    return $connexio;
}

/**
 * Comprova si la contrasenya d'un usuari és vàlida.
 *
 * @param string $usuari L'usuari.
 * @param string $password La contrasenya.
 *
 * @throws Exception Si la contrasenya no coincideix.
 *
 * @return bool True si la contrasenya és vàlida, False altrament.
 */
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

/**
 * Comprova si un usuari existeix a la base de dades.
 *
 * @param string $correu El correu electrònic de l'usuari.
 *
 * @throws Exception Si l'usuari no existeix.
 *
 * @return string El nom de l'usuari si existeix.
 */
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

/**
 * Crea un nou usuari a la base de dades.
 *
 * @param string $nom El nom de l'usuari.
 * @param string $correu El correu electrònic de l'usuari.
 * @param string $password La contrasenya de l'usuari (ja encriptada).
 */
function crearUsuari($nom, $correu, $password) {
    $connection = obrirBDD();
    if(!is_null($connection)){
        $sentencia = "INSERT INTO usuaris (nom, correu, contrasenya) VALUES (:nom, :correu, :password)";
        $array = array(':nom' => $nom, ':correu' => $correu, ':password' => $password);

        $result = executarSentencia($sentencia, $array, $connection);

        $connection = tancarBDD($connection);
    }
}

/**
 * Executa una sentència a la base de dades amb paràmetres.
 *
 * @param string $sentencia La sentència SQL.
 * @param array $array Paràmetres per a la sentència.
 * @param PDO $connexio Connexió a la base de dades.
 *
 * @return array Resultat de la consulta.
 */
function executarSentencia($sentencia, $array, $connexio) {
    $statement = $connexio->prepare($sentencia);
    $statement->execute($array);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Obre una connexió a la base de dades.
 *
 * @return PDO|null La connexió establerta o null si hi ha hagut un error.
 */
function obrirBDD() : ?PDO {
    try {
        $connexio = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
        return $connexio;
    } catch(PDOException $e){
        return null;
    }   
}
