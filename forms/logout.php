<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
include '../headers.php';
Sesija::obrisiSesiju();
if (!isset($_SESSION["uloga"])) {
    header("Location: {$putanja}/forms/login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] > 2) {
    header("Location: {$putanja}/index.php");
    exit();
}
Sesija::obrisiSesiju();
header("Location: {$putanja}/obrasci/login.php");
exit();
?>

