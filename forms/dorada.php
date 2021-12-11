<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Slanje na doradu";
$h1 = "Slanje na doradu";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();
global $idBiografije;
global $greska;
$razlogDorade;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $idBiografije = $_GET['id'];
    $upit = "SELECT * FROM biografija WHERE biografija_id = {$idBiografije}";
    $rezultat = $veza->selectDB($upit);
    while ($red = mysqli_fetch_array($rezultat)) {
        if (empty($red['zahtjev_objave'])) {
            $greska = "Ne postoji zahtjev objave za tu biografiju.";
        } else {
            $greska = null;
        }
    }
}
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] > 2) {
    header("Location: ../index.php");
    exit();
}
if (isset($_POST['submit'])) {
    if (empty($greska)) {
        $razlogDorade = $_POST['razlogDorade'];
        $idBiografije = $_POST['identifikator'];
        $upit = "UPDATE biografija SET razlog_dorade = '{$razlogDorade}' WHERE biografija_id = {$idBiografije}";
        $rezultat = $veza->selectDB($upit);
        $veza->zatvoriDB();
        header("Location: ../index.php");
    }
}
$stranica = "forms/dorada.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("idBiografije", $idBiografije);
$smarty->assign("greska", $greska);
$smarty->display("dorada.tpl");
$smarty->display("footer.tpl");
