<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$h1 = "provjera";
$naslov = "provjera";
include '../headers.php';
$veza = new Baza();
if (isset($_POST['user_name'])) {
    $username = $_POST['user_name'];
    $veza->spojiDB();
    $upit = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = '{$username}'";
    $rezultat = $veza->selectDB($upit);
    if (mysqli_num_rows($rezultat) > 0) {
        echo "Korisničko ime je već zauzeto.";
    }
    else {
        echo "Korisničko ime je dostupno.";
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