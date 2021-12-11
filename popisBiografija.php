<?php
$putanja = dirname($_SERVER['REQUEST_URI']);
$direktorij = getcwd();
$naslov = "Popis biografija";
$h1 = "Popis biografija korisnika u odabranom zborniku";
include 'headers.php';

if (isset($_GET['id']) && $_GET['id'] != "") {
    $naziv = $_GET['id'];
    $veza = new Baza();
    $veza->spojiDB();
    $upit = "SELECT b.naziv as 'Naziv biografije', k.korisnicko_ime as 'Autor biografije' FROM biografija b JOIN zbornik z on b.zbornik_id = z.zbornik_id JOIN obraduje ob ON "
            . "ob.biografija_id = b.biografija_id JOIN korisnik k ON k.korisnik_id = ob.korisnik_id WHERE z.naziv = '{$naziv}' AND b.status = 'u zborniku';";
    $rezultat = $veza->selectDB($upit);
    $smarty->assign("rezultat", $rezultat);
    $smarty->assign("naziv", $naziv);
}
else {
    header("Location: index.php");
    exit();
}
$stranica = "popisBiografija.php";
$smarty->assign("stranica", $stranica);
$smarty->display("popis.tpl");
$smarty->display("footer.tpl");
?>