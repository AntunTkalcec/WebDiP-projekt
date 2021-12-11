<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Kategorije";
$h1 = "Kategorije";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();

$upit = "SELECT * FROM kategorija";
$rezultat = $veza->selectDB($upit);
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] != 1) {
    header("Location: ../index.php");
    exit();
}
$stranica = "forms/kategorije.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("rezultat", $rezultat);
$smarty->display("kategorije.tpl");
$smarty->display("footer.tpl");
