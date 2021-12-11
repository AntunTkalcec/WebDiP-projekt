<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Ažuriranje zbornika";
$h1 = "Ažuriranje zbornika";
include '../headers.php';
$veza = new Baza();
$veza->spojiDB();
$idZbornika;
$predgovor;
$godina;
$stariNaziv = "";
$noviNaziv;
global $greskaNaziv;
$kategorija = 0;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $idZbornika = $_GET['id'];
    $upit = "SELECT * from zbornik where zbornik_id = {$idZbornika}";
    $rezultat = $veza->selectDB($upit);
    while ($red = mysqli_fetch_array($rezultat)) {
        $predgovor = $red['predgovor'];
        $godina = $red['godina'];
        $stariNaziv = $red['naziv'];
        $kategorija = $red['kategorija_id'];
    }
    $upit = "SELECT * FROM biografija WHERE YEAR(datum_upisa) = '{$godina}' and status = 'potvrđeno' ORDER BY `biografija_id` ASC";
    $rezultatBiografije = $veza->selectDB($upit);
}

if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] > 2) {
    header("Location: ../index.php");
    exit();
}
if (isset($_POST['submit'])) {
    $predgovor = $_POST['predgovor'];
    $godina = $_POST['godina'];
    $noviNaziv = $_POST['naziv'];
    $kategorija = $_POST['kategorija'];
    $biografije = array();
    foreach ($_POST['biografije'] as $biografija) {
        array_push($biografije, $biografija);
    }
    if (isset($_POST['naziv']) && $stariNaziv !== $noviNaziv) {
        $greskaNaziv = ProvjeriNaziv();
    }
    if (empty($greskaNaziv)) {
        $query = "UPDATE zbornik SET predgovor = '{$predgovor}', godina = '{$godina}', naziv = '{$noviNaziv}' WHERE zbornik_id = '{$idZbornika}'";
        $execute = $veza->selectDB($query);
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
$stranica = "forms/azuriranjeZbornika.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("idZbornika", $idZbornika);
$smarty->assign("predgovor", $predgovor);
$smarty->assign("godina", $godina);
$smarty->assign("stariNaziv", $stariNaziv);
$smarty->assign("kategorija", $kategorija);
$smarty->assign("greskaNaziv", $greskaNaziv);
$smarty->assign("rezultatBiografije", $rezultatBiografije);
$smarty->display("azuriranjeZbornika.tpl");
$smarty->display("footer.tpl");