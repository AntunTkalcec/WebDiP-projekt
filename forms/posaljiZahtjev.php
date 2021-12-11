<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Slanje zahtjeva";
$h1 = "Slanje zahtjeva";
include '../headers.php';
global $idBiografije;
global $naziv;
$zahtjev = date("Y-m-d");
$veza = new Baza();
$veza->spojiDB();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $naziv = $_GET['id'];
    $upit = "SELECT * FROM biografija WHERE zahtjev_objave < NOW() - INTERVAL 1 YEAR OR zahtjev_objave IS NULL and naziv = '{$naziv}'";
    $rezultat = $veza->selectDB($upit);
    if (mysqli_num_rows($rezultat) < 1) {
        $veza->zatvoriDB();
        header("Location: ../index.php?id=KriviZahtjev");
    } 
    else {
        while ($red = mysqli_fetch_array($rezultat)) {
            $idBiografije = $red['biografija_id'];
        }
        $updateQuery = "UPDATE biografija SET zahtjev_objave = '{$zahtjev}' WHERE biografija_id = {$idBiografije}";
        $updateResult = $veza->selectDB($updateQuery);
        $veza->zatvoriDB();
        header("Location: ../index.php?id=DobarZahtjev");
    }
}
else {
    header("Location: ../index.php");
}
?>