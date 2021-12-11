<?php

$putanja = dirname($_SERVER['REQUEST_URI']);
$direktorij = getcwd();
$naslov = "Home";
$h1 = "Biografije";
include 'headers.php';
$alertKriviZahtjev = 0;
$alertDobarZahtjev = 0;
if (!isset($_COOKIE["kolacici"])) {
    $uvjeti = "<script>$('.cookie-banner').delay(2000).fadeIn();</script>";
    $smarty->assign("uvjeti", $uvjeti);
    $sada = date("Y-m-d");
    setcookie("kolacici", "{$sada}", time() + (86400 * 7), "/");
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    if ($_GET['id'] === "KriviZahtjev") {
        $alertKriviZahtjev = 1;
    }
    else if ($_GET['id'] === "DobarZahtjev") {
        $alertDobarZahtjev = 1;
    }
}
$smarty->assign("alertKriviZahtjev", $alertKriviZahtjev);
$smarty->assign("alertDobarZahtjev", $alertDobarZahtjev);
$greska = "";
$poruka = "";
$veza = new Baza();
$veza->spojiDB();
$upit = "select count(*) as br, kategorija.naziv from zbornik, kategorija where zbornik.kategorija_id = kategorija.kategorija_id group by kategorija.naziv;";
$rezultat = $veza->selectDB($upit);

$upit2 = "select zbornik.naziv, godina, predgovor, kategorija.naziv as kategorija from zbornik, kategorija where zbornik.kategorija_id = kategorija.kategorija_id";
$rezultat2 = $veza->selectDB($upit2);
$smarty->assign("rezultat2", $rezultat2);
$smarty->assign("rezultat", $rezultat);

if (isset($_COOKIE['korisnicko_ime'])) {
    $upit3 = "select b.naziv, b.datum_upisa, b.status, b.razlog_dorade from biografija b, obraduje ob, korisnik k "
            . "where b.biografija_id = ob.biografija_id and k.korisnik_id = ob.korisnik_id and k.korisnicko_ime = '{$_COOKIE['korisnicko_ime']}'";
    $rezultat3 = $veza->selectDB($upit3);
    $smarty->assign("rezultat3", $rezultat3);
}

$upit4 = "SELECT * FROM biografija";
$rezultat4 = $veza->selectDB($upit4);

$upit5 = "SELECT biografija_id, naziv, zahtjev_objave, razlog_dorade, provjera_materijala from biografija where status = 'u pripremi' and zahtjev_objave is not null";
$rezultat5 = $veza->selectDB($upit5);

$smarty->assign("rezultat5", $rezultat5);
$smarty->assign("rezultat4", $rezultat4);
$stranica = "index.php";
$smarty->assign("stranica", $stranica);
$smarty->display("index.tpl");
$smarty->display('footer.tpl');
?>
