<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Nova kategorija";
$h1 = "Nova kategorija";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();

if (isset($_POST['submit'])) {
    $upit = "INSERT INTO kategorija (naziv) VALUES ('{$_POST['naziv']}')";
    $rez = $veza->selectDB($upit);
    $veza->zatvoriDB();
    header("Location: kategorije.php");
}
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] != 1) {
    header("Location: ../index.php");
    exit();
}
$stranica = "forms/novaKategorija.php";
$smarty->assign("stranica", $stranica);
$smarty->display("novaKategorija.tpl");
$smarty->display("footer.tpl");