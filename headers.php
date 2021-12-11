<?php

require "$direktorij/baza.class.php";
require "$direktorij/sesija.class.php";
//require "$direktorij/dnevnik.class.php";

require "$direktorij/smarty/smarty-3.1.39/libs/Smarty.class.php";

Sesija::kreirajSesiju();
$smarty = new Smarty();
$smarty->setTemplateDir("$direktorij/templates");
$smarty->setCompileDir("$direktorij/templates_c");
$smarty->setPluginsDir(SMARTY_PLUGINS_DIR);
$smarty->setCacheDir("$direktorij/cache");
$smarty->setConfigDir("$direktorij/configs");
$smarty->assign("naslov", $naslov);
$smarty->assign("h1", $h1);
$smarty->assign("putanja", $putanja);
$smarty->display("header.tpl");

/* /**
 * dodaj_zapis
 * Funkcija dodaje zapis u dnevnik.log u formatu: "d.m.y h:m:s, stranica"
 */

function dodaj_zapis() {
    global $direktorij;
    $sada = date('d.m.Y H:i:s');
    $stranica = basename($_SERVER['PHP_SELF']); // $referer = $_SERVER['HTTP_REFERER'];
    $fp = fopen("$direktorij/izvorne_datoteke/dnevnik.log", "a+");
    fwrite($fp, $sada);
    fwrite($fp, ", ");
    fwrite($fp, $stranica); // $referer
    fwrite($fp, "\n");
    fclose($fp);
}

/* /**
 * vrati_zapis
 * @param string $naziv
 * Funkcija prima naziv datoteke i vraća istu u asocijativnom polju gdje je ključ datum a tekst vrijednost
 */

function vrati_zapis($naziv) {
    $fp = fopen($naziv, "r");
    $rezultat = fread($fp, filesize($naziv));
    fclose($fp);

    $polje = explode("\n", $rezultat);

    //zbog NULL vrijednosti na početku i kraju
    for ($i = 1; $i < count($polje) - 1; $i++) {
        $kljuc = explode(", ", $polje [$i]);
        $ascPolje[$kljuc[0]] = $kljuc [1];
    }
    return $ascPolje;
}

// Zapis u dnevnik uz pomoću klase
 /*
    $dnevnik = new Dnevnik();
    $dnevnik->spremiDnevnik("Testni Text u log!");
 */
            

