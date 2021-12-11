<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Ažuriranje kategorije";
$h1 = "Ažuriranje kategorije";
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
$idKategorije;
$naziv;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $idKategorije = $_GET['id'];
    $upit = "SELECT * FROM kategorija WHERE kategorija_id = {$idKategorije}";
    $rez = $veza->selectDB($upit);
    while ($red = mysqli_fetch_array($rez)) {
        $naziv = $red['naziv'];
    }
}

if (isset($_POST['submit'])) {
    $idKategorije = $_POST['id'];
    $naziv = $_POST['naziv'];
    
    $query = "UPDATE kategorija SET naziv = '{$naziv}' WHERE kategorija_id = {$idKategorije}";
    $rezultat = $veza->selectDB($query);
    $veza->zatvoriDB();
    header("Location: kategorije.php");
}

$stranica = "forms/azurirajKategoriju.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("naziv", $naziv);
$smarty->assign("idKategorije", $idKategorije);
$smarty->display("azurirajKategoriju.tpl");
$smarty->display("footer.tpl");