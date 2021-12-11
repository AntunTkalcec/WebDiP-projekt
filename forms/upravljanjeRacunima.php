<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Upravljanje računom";
$h1 = "Upravljanje računom";
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
$idKorisnika;
$ime;
$prezime;
$korisnicko_ime;
$lozinka;
$lozinka256;
$email;
$datum_registracije;
$uvjeti;
$blokiran;
$status;
$zakljucan;
$uloga_id;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $idKorisnika = $_GET['id'];
    $upit = "SELECT * FROM korisnik WHERE korisnik_id = {$idKorisnika}";
    $rezultat = $veza->selectDB($upit);
    while ($red = mysqli_fetch_array($rezultat)) {
        $ime = $red['ime'];
        $prezime = $red['prezime'];
        $korisnicko_ime = $red['korisnicko_ime'];
        $lozinka = $red['lozinka'];
        $lozinka256 = $red['lozinka_sha256'];
        $email = $red['email'];
        $datum_registracije = $red['datum_registracije'];
        $uvjeti = $red['uvjeti'];
        $blokiran = $red['blokiran'];
        $status = $red['status'];
        $zakljucan = $red['zakljucan'];
        $uloga_id = $red['uloga_id'];
    }
}

if (isset($_POST['submitBlok'])) {
    $upit = "UPDATE korisnik SET blokiran = 1 WHERE korisnik_id = {$idKorisnika}";
    $rez = $veza->selectDB($upit);
    $veza->zatvoriDB();
    header("Location: racuni.php");
}

if (isset($_POST['submitZaklj'])) {
    $upit = "UPDATE korisnik SET zakljucan = 'da' WHERE korisnik_id = {$idKorisnika}";
    $rez = $veza->selectDB($upit);
    $veza->zatvoriDB();
    header("Location: racuni.php");
}

if (isset($_POST['submitOtklj'])) {
    $upit = "UPDATE korisnik SET zakljucan = 'ne' WHERE korisnik_id = {$idKorisnika}";
    $rez = $veza->selectDB($upit);
    $veza->zatvoriDB();
    header("Location: racuni.php");
}

if (isset($_POST['submitUnblock'])) {
    $upit = "UPDATE korisnik SET blokiran = 0 WHERE korisnik_id = {$idKorisnika}";
    $rez = $veza->selectDB($upit);
    $veza->zatvoriDB();
    header("Location: racuni.php");
}

$stranica = "forms/upravljanjeRacunima.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("idKorisnika", $idKorisnika);
$smarty->assign("ime", $ime);
$smarty->assign("prezime", $prezime);
$smarty->assign("korisnicko_ime", $korisnicko_ime);
$smarty->assign("lozinka", $lozinka);
$smarty->assign("lozinka256", $lozinka256);
$smarty->assign("email", $email);
$smarty->assign("datum_registracije", $datum_registracije);
$smarty->assign("uvjeti", $uvjeti);
$smarty->assign("blokiran", $blokiran);
$smarty->assign("status", $status);
$smarty->assign("zakljucan", $zakljucan);
$smarty->assign("uloga_id", $uloga_id);
$smarty->display("upravljanjeRacunima.tpl");
$smarty->display("footer.tpl");