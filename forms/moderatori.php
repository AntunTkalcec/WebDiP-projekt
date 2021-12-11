<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Moderatori";
$h1 = "Moderatori";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] != 1) {
    header("Location: ../index.php");
    exit();
}

$upit = "SELECT moderator.moderator_id, korisnik.korisnik_id, korisnik.korisnicko_ime, GROUP_CONCAT(DISTINCT kategorija.naziv SEPARATOR ',') AS kategorije FROM "
        . "moderator, moderira, korisnik, kategorija WHERE moderator.moderator_id = moderira.moderator_id and moderator.korisnik_id = korisnik.korisnik_id and "
        . "moderira.kategorija_id = kategorija.kategorija_id GROUP BY moderator.moderator_id";
$rezultat = $veza->selectDB($upit);

$stranica = "forms/moderatori.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("rezultat", $rezultat);
$smarty->display("moderatori.tpl");
$smarty->display("footer.tpl");