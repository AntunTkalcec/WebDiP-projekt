<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Potvrđivanje/odbijanje zahtjeva";
$h1 = "Potvrđivanje/odbijanje zahtjeva";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();
global $idBiografije;
global $greska;
global $naziv;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $idBiografije = $_GET['id'];
    $upit = "SELECT * FROM biografija WHERE biografija_id = {$idBiografije}";
    $rez = $veza->selectDB($upit);
    while ($red = mysqli_fetch_array($rez)) {
        if ($red['provjera_materijala'] == 0) {
            $greska = "Zahtjev bez materijala se ne može prihvatiti.";
        } else {
            $greska = null;
        }
        $naziv = $red['naziv'];
    }
}
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] > 2) {
    header("Location: ../index.php");
    exit();
}
if (isset($_POST['odbij'])) {
    $idBiografije = $_POST['identifikator'];
    $upit = "UPDATE biografija SET status = 'odbijeno' WHERE biografija_id = {$idBiografije}";
    $rezultat = $veza->selectDB($upit);
    $veza->zatvoriDB();
    header("Location: ../index.php");
}

if (isset($_POST['potvrdi'])) {
    $idBiografije = $_POST['identifikator'];
    $upit = "UPDATE biografija SET status = 'potvrđeno' WHERE biografija_id = {$idBiografije}";
    $rezultat = $veza->selectDB($upit);
    $veza->zatvoriDB();
    header("Location: ../index.php");
}
$stranica = "forms/potvrdi_obij.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("idBiografije", $idBiografije);
$smarty->assign("greska", $greska);
$smarty->assign("naziv", $naziv);
$smarty->display("potvrdi_odbij.tpl");
$smarty->display("footer.tpl");