<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Ažuriranje biografije";
$h1 = "Ažuriranje biografije";
include '../headers.php';
if (!isset($_SESSION["uloga"])) {
    header("Location: login.php");
    exit();
} elseif (isset($_SESSION["uloga"]) && $_SESSION["uloga"] == 4) {
    header("Location: ../index.php");
    exit();
}
global $naziv;
global $stariNaziv;
global $datum;
global $materijal;
global $podaci;
global $obrazovanje;
global $vjestine;
global $iskustvo;
global $interesi;
global $tekst;
global $kategorija;
global $razlog_dorade;
global $idBiografije;
$veza = new Baza();
$veza->spojiDB();
global $greskaObrazovanje;
global $greskaVjestine;
global $greskaIskustvo;
global $greskaInteresi;
global $greskaTekst;
global $greskaKategorija;
global $greskaPodaci;
global $greskaNaziv;
global $greskaMaterijal;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $stariNaziv = $_GET['id'];
    $upit = "SELECT * FROM biografija WHERE naziv = '{$stariNaziv}'";
    $rezultat = $veza->selectDB($upit);
    while ($red = mysqli_fetch_array($rezultat)) {
        $idBiografije = $red['biografija_id'];
        $materijal = $red['provjera_materijala'];
        $podaci = $red['osobni_podaci'];
        $obrazovanje = $red['obrazovanje'];
        $vjestine = $red['vjestine'];
        $iskustvo = $red['radno_iskustvo'];
        $interesi = $red['interesi'];
        $tekst = $red['tekst_biografije'];
        $kategorija = $red['kategorija_id'];
        $razlog_dorade = $red['razlog_dorade'];
        if (!empty($red['zbornik_id'])) {
            $vecJeUZborniku = 1;
        }
        else {
            $vecJeUZborniku = 0;
        }
        $smarty->assign("vecJeUZborniku", $vecJeUZborniku);
    }
    $smarty->assign("naziv", $stariNaziv);
    $smarty->assign("materijal", $materijal);
    $smarty->assign("podaci", $podaci);
    $smarty->assign("obrazovanje", $obrazovanje);
    $smarty->assign("vjestine", $vjestine);
    $smarty->assign("iskustvo", $iskustvo);
    $smarty->assign("interesi", $interesi);
    $smarty->assign("tekst", $tekst);
    $smarty->assign("kategorija", $kategorija);
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
    if (isset($_POST['naziv']) && $stariNaziv !== $naziv) {
        $greskaNaziv = ProvjeriNaziv();
    }
    if (empty($greskaObrazovanje) && empty($greskaVjestine) && empty($greskaIskustvo) && empty($greskaInteresi) && empty($greskaTekst) && empty($greskaKategorija) && empty($greskaPodaci) 
            && empty($greskaNaziv) && empty($greskaRazlog)) {
        if (empty($_FILES['materijal']['tmp_name'])) {
            $upit = "UPDATE biografija SET naziv = '{$naziv}', datum_upisa = '{$datum_upisa}', provjera_materijala = 0, osobni_podaci = '{$podaci}', obrazovanje = '{$obrazovanje}', "
            . "vjestine = '{$vjestine}', radno_iskustvo = '{$iskustvo}', interesi = '{$interesi}', tekst_biografije = '{$tekst}', kategorija_id = {$kategorija_id}, "
            . "zbornik_id = null, status = 'u pripremi', zahtjev_objave = null WHERE biografija.biografija_id = {$idBiografije};";
            $rezultat = $veza->selectDB($upit);
            $upit5 = "DELETE FROM materijal WHERE materijal.biografija_id = {$idBiografije};";
            $rezultat5 = $veza->selectDB($upit5);
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
                $upit2 = "UPDATE biografija SET naziv = '{$naziv}', datum_upisa = '{$datum_upisa}', provjera_materijala = 1, osobni_podaci = '{$podaci}', obrazovanje = '{$obrazovanje}', "
                            . "vjestine = '{$vjestine}', radno_iskustvo = '{$iskustvo}', interesi = '{$interesi}', tekst_biografije = '{$tekst}', kategorija_id = '{$kategorija_id}', "
                            . "zbornik_id = null, status = 'u pripremi', zahtjev_objave = null WHERE biografija.biografija_id = {$idBiografije};"; 
                $rezultat2 = $veza->selectDB($upit2);
                if ($materijal == "1") {
                    $upit4 = "UPDATE materijal SET naziv = '{$userfile_name}', putanja = 'TODO', vrsta = '{$vrstaMaterijala}', biografija_id = {$idBiografije} "
                    . "WHERE materijal.biografija_id = {$idBiografije};";
                    $rezultat4 = $veza->selectDB($upit4);
                }
                else {
                    $upit4 = "INSERT INTO materijal (naziv, putanja, vrsta, biografija_id) VALUES ('{$userfile_name}', 'TODO', '{$vrstaMaterijala}', {$idBiografije});";
                    $rezultat4 = $veza->selectDB($upit4);
                }
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
$stranica = "forms/azuriranjeBiografije.php";
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
$smarty->display("azuriranjeBiografije.tpl");
$smarty->display("footer.tpl");
?>