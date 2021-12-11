<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Novi moderator";
$h1 = "Novi moderator";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();

$upitKorisnici = "SELECT korisnik_id, korisnicko_ime FROM korisnik WHERE uloga_id = 3";
$rezKorisnici = $veza->selectDB($upitKorisnici);

$upitKategorije = "SELECT kategorija_id, naziv FROM kategorija";
$rezKategorije = $veza->selectDB($upitKategorije);
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] != 1) {
    header("Location: ../index.php");
    exit();
}
if (isset($_POST['submit'])) {
    $kategorije = array();
    $idKorisnika = $_POST['korisnik'];
    $idModeratora;
    foreach($_POST['kategorije'] as $kategorija) {
        array_push($kategorije, $kategorija);
    }
    $query = "INSERT INTO moderator (korisnik_id) VALUES ({$idKorisnika})";
    $rezModerator = $veza->selectDB($query);
    
    $queryFindModID = "SELECT * FROM moderator WHERE korisnik_id = {$idKorisnika}";
    $rezModID = $veza->selectDB($queryFindModID);
    while ($red = mysqli_fetch_array($rezModID)) {
        $idModeratora = $red['moderator_id'];
    }
    foreach ($kategorije as $kat) {
        $staviUModerira = "INSERT INTO moderira (moderator_id, kategorija_id) VALUES ({$idModeratora}, {$kat})";
        $rezStavi = $veza->selectDB($staviUModerira);
    }
    $queryPromoviraj = "UPDATE korisnik SET uloga_id = 2 WHERE korisnik_id = {$idKorisnika}";
    $rezPromoviraj = $veza->selectDB($queryPromoviraj);
    $veza->zatvoriDB();
    header("Location: moderatori.php");
}

$stranica = "forms/noviModerator.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("rezKorisnici", $rezKorisnici);
$smarty->assign("rezKategorije", $rezKategorije);
$smarty->display("noviModerator.tpl");
$smarty->display("footer.tpl");
