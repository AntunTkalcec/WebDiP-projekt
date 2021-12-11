<?php

$putanja = dirname($_SERVER['REQUEST_URI']);
$direktorij = getcwd();
$naslov = "Galerija";
$h1 = "Galerija";
include 'headers.php';
$veza = new Baza();
$veza->spojiDB();

$upit = "select m.naziv from materijal m join biografija b on m.biografija_id = b.biografija_id where b.provjera_materijala = 1 and b.zbornik_id is not null";
$rezultat = $veza->selectDB($upit);
$smarty->assign("rezultat", $rezultat);

$stranica = "galerija.php";
$smarty->assign("stranica", $stranica);
$smarty->display("galerija.tpl");
$smarty->display("footer.tpl");