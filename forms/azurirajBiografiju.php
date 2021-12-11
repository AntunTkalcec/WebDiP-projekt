<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Ažuriranje biografije";
$h1 = "Ažuriranje biografije";
include '../headers.php';
global $greskaObrazovanje;
global $greskaVjestine;
global $greskaIskustvo;
global $greskaInteresi;
global $greskaTekst;
global $greskaKategorija;
global $greskaPodaci;
global $greskaNaziv;
global $greskaMaterijal;
$veza = new Baza();
$veza->spojiDB();

if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] == 4) {
    header("Location: ../index.php");
    exit();
}
$upit3 = "select b.naziv, b.datum_upisa, b.status, b.razlog_dorade from biografija b, obraduje ob, korisnik k "
            . "where b.biografija_id = ob.biografija_id and k.korisnik_id = ob.korisnik_id and k.korisnicko_ime = '{$_COOKIE['korisnicko_ime']}' and b.status != 'potvrđeno' and b.status != "
            . "'odbijeno'";
$rezultat3 = $veza->selectDB($upit3);
$smarty->assign("rezultat3", $rezultat3);
$stranica = "forms/azurirajBiografiju.php";
$smarty->assign("stranica", $stranica);
$smarty->display("azurirajBiografiju.tpl");
$smarty->display("footer.tpl");
?>