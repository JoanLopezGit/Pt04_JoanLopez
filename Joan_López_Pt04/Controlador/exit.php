<?php
/**
 * Joan López Torrento
 */
session_start();
unset($_SESSION["newsession"]);
header("Location: ../Vista/index.vista.php");
exit();
?>