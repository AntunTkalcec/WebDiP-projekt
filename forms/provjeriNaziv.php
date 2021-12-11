<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$h1 = "provjera";
$naslov = "provjera";
include '../headers.php';
$veza = new Baza();
if (isset($_POST['nazivBiografije'])) {
    $naziv = $_POST['nazivBiografije'];
    $veza->spojiDB();
    $upit = "SELECT naziv FROM biografija WHERE naziv = '{$naziv}'";
    $rezultat = $veza->selectDB($upit);
    if (mysqli_num_rows($rezultat) > 0) {
        echo "Naziv je već zauzet.";
    }
    else {
        echo "Naziv dostupan!";
    }
    $veza->zatvoriDB();
    exit();
}
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] != 5) {
    header("Location: ../index.php");
    exit();
}
?>