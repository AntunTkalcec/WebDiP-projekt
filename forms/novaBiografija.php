<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Nova biografija";
$h1 = "Nova biografija";
include '../headers.php';
$trenutniKorisnik = $_COOKIE['korisnicko_ime'];
global $idKorisnika;
global $greskaObrazovanje;
global $greskaVjestine;
global $greskaIskustvo;
global $greskaInteresi;
global $greskaTekst;
global $greskaKategorija;
global $greskaPodaci;
global $greskaNaziv;
global $greskaMaterijal;
$veza = new Baza();
$veza->spojiDB();
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] == 4) {
    header("Location: ../index.php");
    exit();
}
$upit5 = "SELECT korisnik_id from korisnik where korisnicko_ime = '{$trenutniKorisnik}'";
$rezultat5 = $veza->selectDB($upit5);
while ($red = mysqli_fetch_array($rezultat5)) {
    $idKorisnika = $red['korisnik_id'];
}
if (isset($_POST['submit'])) {
    $naziv = $_POST['naziv'];
    $podaci = $_POST['podaci'];
    $obrazovanje = $_POST['obrazovanje'];
    $vjestine = $_POST['vjestine'];
    $iskustvo = $_POST['iskustvo'];
    $interesi = $_POST['interesi'];
    $tekst = $_POST['tekst'];
    $kategorija = $_POST['kategorija'];
    $kategorija_id = 0;
    $biografija_id = 0;
    switch ($kategorija) {
        case "Znanstvenici": 
            $kategorija_id = 1;
            break;
        case "Pisci":
            $kategorija_id = 2;
            break;
        case "Redatelji":
            $kategorija_id = 3;
            break;
        case "Glumci":
            $kategorija_id = 4;
            break;
        case "Političari":
            $kategorija_id = 5;
            break;
        case "Ostale ličnosti":
            $kategorija_id = 6;
            break;
    }
    $datum_upisa = date("Y-m-d");
    if (empty($naziv)) {
        $greskaNaziv = "Naziv biografije je obavezan.";
    }
    if (empty($podaci)) {
        $greskaPodaci = "Osobni podaci o subjektu biografije su obavezni.";
    }
    if (empty($tekst)) {
        $greskaTekst = "Tekst biografije je obavezan.";
    }
    if (empty($kategorija)) {
        $greskaKategorija = "Obavezno je odabrati kategoriju.";
    }
    if (isset($_POST['naziv'])) {
        $greskaNaziv = ProvjeriNaziv();
    }
    
    if (empty($greskaObrazovanje) && empty($greskaVjestine) && empty($greskaIskustvo) && empty($greskaInteresi) && empty($greskaTekst) && empty($greskaKategorija) && empty($greskaPodaci) 
            && empty($greskaNaziv) && empty($greskaMaterijal)) {
        if (empty($_FILES['materijal']['tmp_name'])) {
            $upit = "INSERT INTO biografija (naziv, datum_upisa, provjera_materijala, osobni_podaci, obrazovanje, vjestine, radno_iskustvo, interesi, tekst_biografije, kategorija_id, "
                    . "zbornik_id, status, razlog_dorade, zahtjev_objave) VALUES ('{$naziv}', '{$datum_upisa}', 0, '{$podaci}', '{$obrazovanje}', "
                    . "'{$vjestine}', '{$iskustvo}', '{$interesi}', '{$tekst}', {$kategorija_id}, null, 'u pripremi', null, null)";
            $rezultat = $veza->selectDB($upit);
            $upit4 = "SELECT biografija_id FROM biografija WHERE biografija.naziv = '{$naziv}';";
            $rezultat4 = $veza->selectDB($upit4);
            while ($red2 = mysqli_fetch_array($rezultat4)) {
                $idBiografije = $red2['biografija_id'];
            }
            $upitObraduje = "INSERT INTO obraduje (korisnik_id, biografija_id) VALUES ('{$idKorisnika}', '{$idBiografije}')";
            $rezultatObraduje = $veza->selectDB($upitObraduje);
            $veza->zatvoriDB();
            header("Location: ../index.php");
        }
        else {
            $userfile = $_FILES['materijal']['tmp_name'];
            if (isset($userfile) && !empty($userfile)) {
                $userfile_name = $_FILES['materijal']['name'];
                $userfile_size = $_FILES['materijal']['size'];
                $userfile_type = $_FILES['materijal']['type'];
                $userfile_error = $_FILES['materijal']['error'];
                if ($userfile_error > 0) {
                    switch ($userfile_error) {
                        case 1: $greskaMaterijal = "Greška: Veličina materijala veća od " . ini_get('upload_max_filesize');
                            break;
                        case 2: $greskaMaterijal = "Greška: Veličina veća od " . $_POST['MAX_FILE_SIZE'] . "B";
                            break;
                        case 3: $greskaMaterijal = "Greška: Datoteka djelomično prenesena. ";
                            break;
                        case 4: $greskaMaterijal = "Greška: Datoteka nije prenesena.";
                            break;
                    }
                    exit;
                }
                $upfile = '../media/'.$userfile_name;
                
                if (is_uploaded_file($userfile)) {
                    if (!move_uploaded_file($userfile, $upfile)) {
                        $greskaMaterijal = "Greška: Nije moguće prenijeti datoteku na odredište.";
                        exit;
                    }
                }
                else {
                    $greskaMaterijal = "Greška: Mogući napad prijenosom. Datoteka: " .$userfile_name;
                }
            }
            if (empty($greskaMaterijal)) {
                $vrstaMaterijala = $_POST['materijalSelect'];
                $upit2 = "INSERT INTO biografija (naziv, datum_upisa, provjera_materijala, osobni_podaci, obrazovanje, vjestine, radno_iskustvo, interesi, tekst_biografije, kategorija_id, "
                    . "zbornik_id, status, razlog_dorade, zahtjev_objave) VALUES ('{$naziv}', '{$datum_upisa}', 1, '{$podaci}', '{$obrazovanje}', "
                    . "'{$vjestine}', '{$iskustvo}', '{$interesi}', '{$tekst}', {$kategorija_id}, null, 'u pripremi', null, null)";
                $rezultat2 = $veza->selectDB($upit2);
                $upit3 = "SELECT biografija_id FROM biografija WHERE biografija.naziv = '{$naziv}';";
                $rezultat3 = $veza->selectDB($upit3);
                while ($red = mysqli_fetch_array($rezultat3)) {
                    $biografija_id = $red['biografija_id'];
                }
                $upit4 = "INSERT INTO materijal (naziv, putanja , vrsta, biografija_id) VALUES ('{$userfile_name}', 'TODO', '{$vrstaMaterijala}', {$biografija_id});";
                $rezultat4 = $veza->selectDB($upit4);
                $upitObraduje2 = "INSERT INTO obraduje VALUES ('{$idKorisnika}', '{$biografija_id}');";
                $rezultatObraduje2 = $veza->selectDB($upitObraduje2);
                $veza->zatvoriDB();
                header("Location: ../index.php");
            }
        }
    }
}
function ProvjeriNaziv() {
    global $veza;
    $query = "SELECT naziv FROM biografija WHERE naziv = '{$_POST['naziv']}'";
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
$stranica = "forms/novaBiografija.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("greskaMaterijal", $greskaMaterijal);
$smarty->assign("greskaObrazovanje", $greskaObrazovanje);
$smarty->assign("greskaVjestine", $greskaVjestine);
$smarty->assign("greskaIskustvo", $greskaIskustvo);
$smarty->assign("greskaInteresi", $greskaInteresi);
$smarty->assign("greskaTekst", $greskaTekst);
$smarty->assign("greskaKategorija", $greskaKategorija);
$smarty->assign("greskaPodaci", $greskaPodaci);
$smarty->assign("greskaNaziv", $greskaNaziv);
$smarty->display("novaBiografija.tpl");
$smarty->display("footer.tpl");
?>