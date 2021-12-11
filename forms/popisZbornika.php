<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Popis zbornika";
$h1 = "Popis zbornika";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] > 2) {
    header("Location: ../index.php");
    exit();
}
$idKorisnika;
$idModeratora;
$korime = $_COOKIE['korisnicko_ime'];
$query = "SELECT korisnik.korisnik_id from korisnik, moderator where korisnik.korisnik_id = moderator.korisnik_id and korisnik.korisnicko_ime = '{$korime}'";
$result = $veza->selectDB($query);
while ($row = mysqli_fetch_array($result)) {
    $idKorisnika = $row['korisnik_id'];
}
$queryModerator = "select * from moderator, korisnik where moderator.korisnik_id = korisnik.korisnik_id and korisnik.korisnicko_ime = '{$korime}'";
$resultModerator = $veza->selectDB($queryModerator);
while ($red = mysqli_fetch_array($resultModerator)) {
    $idModeratora = $red['moderator_id'];
}

$upit = "select zbornik.naziv as 'Naziv zbornika', zbornik.godina, zbornik.zbornik_id, zbornik.predgovor, kategorija.naziv from zbornik, kategorija, moderira, moderator where "
        . "zbornik.kategorija_id = kategorija.kategorija_id and kategorija.kategorija_id = moderira.kategorija_id "
        . "and moderira.moderator_id = moderator.moderator_id and moderator.korisnik_id = '{$idKorisnika}'";
$rezultat = $veza->selectDB($upit);

$stranica = "forms/popisZbornika.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("rezultat", $rezultat);
$smarty->display("popisZbornika.tpl");
$smarty->display("footer.tpl");
