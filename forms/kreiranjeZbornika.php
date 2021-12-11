<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Kreiranje zbornika";
$h1 = "Kreiranje zbornika";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();
$korime = $_COOKIE['korisnicko_ime'];
$rezultatKategorije = null;
$rezultatBiografije = null;
$biranjeGodine;
$biranjeBiografija;
$predgovor = null;
$kategorija = null;
$odabranaGodina = null;
$naziv = null;
$greskaNaziv = null;
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $upitKategorije = "select kategorija.naziv from kategorija, moderator, moderira, korisnik where korisnik.korisnicko_ime = '{$korime}' "
            . "and korisnik.korisnik_id = moderator.korisnik_id "
            . "and moderator.moderator_id = moderira.moderator_id and moderira.kategorija_id = kategorija.kategorija_id";
    $rezultatKategorije = $veza->selectDB($upitKategorije);
    $biranjeGodine = 1;
    $biranjeBiografija = 0;
}
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] > 2) {
    header("Location: ../index.php");
    exit();
}
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $biranjeGodine = 0;
    $biranjeBiografija = 1;
    $odabranaGodina = $_POST['godina'];
    $predgovor = $_POST['predgovor'];
    $kategorija = $_POST['kategorija'];
    switch ($kategorija) {
        case "Znanstvenici":
            $idKategorije = 1;
            break;
        case "Pisci":
            $idKategorije = 2;
            break;
        case "Redatelji":
            $idKategorije = 3;
            break;
        case "Glumci":
            $idKategorije = 4;
            break;
        case "Političari":
            $idKategorije = 5;
            break;
        case "Ostale ličnosti":
            $idKategorije = 6;
            break;
    }
    $naziv = $_POST['naziv'];
    $upit = "SELECT * FROM biografija WHERE YEAR(datum_upisa) = '{$odabranaGodina}' and status = 'potvrđeno' and kategorija_id = {$idKategorije} ORDER BY `biografija_id` ASC";
    $rezultatBiografije = $veza->selectDB($upit);
}

if (!isset($_GET['id']) && isset($_POST['submit'])) {
    if (isset($_POST['naziv'])) {
        $greskaNaziv = ProvjeriNaziv();
    }
    if (empty($greskaNaziv)) {
        $predgovor = $_POST['predgovor'];
        $kategorija = $_POST['kategorija'];
        $odabranaGodina = $_POST['godina'];
        $naziv = $_POST['naziv'];
        $biografije = array();
        foreach ($_POST['biografije'] as $biografija) {
            array_push($biografije, $biografija);
        }
        switch ($kategorija) {
            case "Znanstvenici":
                $idKategorije = 1;
                break;
            case "Pisci":
                $idKategorije = 2;
                break;
            case "Redatelji":
                $idKategorije = 3;
                break;
            case "Glumci":
                $idKategorije = 4;
                break;
            case "Političari":
                $idKategorije = 5;
                break;
            case "Ostale ličnosti":
                $idKategorije = 6;
                break;
        }
        $stvoriZbornik = "INSERT INTO zbornik (godina, naziv, predgovor, kategorija_id) VALUES ('{$odabranaGodina}', '{$naziv}', '{$predgovor}', {$idKategorije})";
        $rezultatStvoriZbornik = $veza->selectDB($stvoriZbornik);
        $dohvatiZbornik = "SELECT zbornik_id from zbornik where naziv = '{$naziv}'";
        $rezultatDohvatiZbornik = $veza->selectDB($dohvatiZbornik);
        while ($red = mysqli_fetch_array($rezultatDohvatiZbornik)) {
            $idZbornika = $red['zbornik_id'];
        }
        foreach ($biografije as $bio) {
            $staviUZbornik = "UPDATE biografija SET zbornik_id = {$idZbornika}, status = 'u zborniku' WHERE biografija.naziv = '{$bio}'";
            $rezultatStaviUZbornik = $veza->selectDB($staviUZbornik);
        }
        $veza->zatvoriDB();
        header("Location: ../index.php");
    }
}

function ProvjeriNaziv() {
    global $veza;
    $query = "SELECT naziv FROM zbornik WHERE naziv = '{$_POST['naziv']}'";
    $result = $veza->selectDB($query);
    if (mysqli_num_rows($result) > 0) {
        $greskaNaziv = "Naziv je već zauzet.";
        return $greskaNaziv;
    }
    else {
        $greskaNaziv = "";
        return $greskaNaziv;
    }
}
$stranica = "forms/kreiranjeZbornika.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("greskaNaziv", $greskaNaziv);
$smarty->assign("naziv", $naziv);
$smarty->assign("predgovor", $predgovor);
$smarty->assign("kategorija", $kategorija);
$smarty->assign("odabranaGodina", $odabranaGodina);
$smarty->assign("biranjeGodine", $biranjeGodine);
$smarty->assign("biranjeBiografija", $biranjeBiografija);
$smarty->assign("rezultatKategorije", $rezultatKategorije);
$smarty->assign("rezultatBiografije", $rezultatBiografije);
$smarty->display("kreiranjeZbornika.tpl");
$smarty->display("footer.tpl");
