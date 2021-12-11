<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Korisnički računi";
$h1 = "Korisnički računi";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();
if (!isset($_SESSION["uloga"])) {
    header("Location: forms/login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] != 1) {
    header("Location: ../index.php");
    exit();
}
$upit = "SELECT korisnik_id, korisnicko_ime, zakljucan, blokiran from korisnik";
$rezultat = $veza->selectDB($upit);

$stranica = "forms/racuni.php";
$smarty->assign("rezultat", $rezultat);
$smarty->assign("stranica", $stranica);
$smarty->display("racuni.tpl");
$smarty->display("footer.tpl");