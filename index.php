<?php

/**
 * Funció per connectar a la base de dades
 *
 * @return PDO Connexió amb la base de dades
 */
function connectarBaseDades() {
    try {
        $conn = new PDO('mysql:host=localhost;dbname=pt03_joan_lopez', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo 'Error de connexió: ' . $e->getMessage();
        die();
    }
}

/**
 * Funció per obtenir una llista d'articles
 *
 * @param PDO    $conn         Connexió amb la base de dades
 * @param int    $pagina       Num de pàgina
 * @param int    $post_per_pag Nombre de publicacions per pàgina
 *
 * @return array Llista d'articles
 */
function obtenirArticles($conn, $pagina, $post_per_pag) {
    $primer_article = ($pagina > 1) ? ($pagina - 1) * $post_per_pag : 0;
    $query = "SELECT * FROM articles LIMIT :primer_article, :num_articles";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':primer_article', $primer_article, PDO::PARAM_INT);
        $stmt->bindParam(':num_articles', $post_per_pag, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo 'Hi ha hagut un error amb la petició: ' . $e->getMessage();
        die();
    }
}

/**
 * Funció per obtenir el total d'articles
 *
 * @param PDO $conn Connexió amb la base de dades
 *
 * @return int Total d'articles
 */
function obtenirTotalArticles($conn) {
    $count_stmt = $conn->prepare("SELECT COUNT(id) AS quantitat FROM articles");
    $count_stmt->execute();
    return intval($count_stmt->fetch()['quantitat']);
}

/**
 * Funció per calcular el número màxim de pàgines
 *
 * @param int $quantitat    Total d'articles
 * @param int $post_per_pag Nombre de publicacions per pàgina
 *
 * @return int Número màxim de pàgines
 */
function calcularMaximPagines($quantitat, $post_per_pag) {
    return ceil($quantitat / $post_per_pag);
}

// Connexió a la base de dades
$conn = connectarBaseDades();

// Establir la pàgina actual
$pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
// Número de publicacions per pàgina
$post_per_pag = isset($_GET['post_x_pag']) && intval($_GET['post_x_pag']) > 0 ? intval($_GET['post_x_pag']) : 5;

// Obtenir llista d'articles
$result = obtenirArticles($conn, $pagina, $post_per_pag);

if (empty($result)) {
    header("Location: http://localhost/PractiquesPHP/joan_lopez_pt03/");
    exit();
}

// Obtenir el total d'articles
$quantitat = obtenirTotalArticles($conn);

// Calcular el número de pàgines
$maxim_pagines = calcularMaximPagines($quantitat, $post_per_pag);

require 'index.vista.php';

?>
