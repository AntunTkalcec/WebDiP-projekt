<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Registracija";
$h1 = "Registracija";
include '../headers.php';
global $greskaLozinka;
global $greskaIme;
global $greskaPrezime;
global $greskaKorime;
global $greskaEmail;
global $greskaLozinka2;
global $greskaCaptcha;
global $captcha;
$potvrdenMail ="";
$veza = new Baza();
$veza->spojiDB();
$span = "";
$smarty->assign("span", $span);
if (isset($_POST['g-recaptcha-response']) && isset($_POST['submit'])) {
    $captcha = $_POST['g-recaptcha-response'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $lozinka = $_POST['lozinka'];
    $mail = $_POST['email'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    if (!$captcha) {
        $greskaCaptcha = "Provjerite captcha! \r\n";
    }
    $secretKey = "6LfBk_EaAAAAADLQwpReAav47rSRDyFAiXM0WGAF";
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey).'&response='.urlencode($captcha);
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);
    if ($_POST['lozinka'] !== $_POST['lozinka_potvrda']) {
        $greskaLozinka .= "Lozinka i potvrda lozinke se ne podudaraju! \r\n";
    }
    if ((strpos($_POST['ime'], "/") !== false) || (strpos($_POST['ime'], "*") !== false) || (strpos($_POST['ime'], "+") !== false) 
            || (strpos($_POST['ime'], "-") !== false) || (strpos($_POST['ime'], "!") !== false)) {
        $greskaIme = "Polje imena sadrži nedozvoljene znakove. \r\n";
    }
    if (empty($_POST['prezime'])) {
        $greskaPrezime = "Polje prezime mora biti popunjeno! \r\n";
    }
    if ((strpos($_POST['prezime'], "/") !== false) || (strpos($_POST['prezime'], "*") !== false) || (strpos($_POST['prezime'], "+") !== false) 
            || (strpos($_POST['prezime'], "-") !== false) || (strpos($_POST['prezime'], "!") !== false)) {
        $greskaPrezime = "Polje prezimena sadrži nedozvoljene znakove. \r\n";
    }
    if (strlen($_POST['korisnicko_ime']) < 3) {
        $greskaKorime = "Korisničko ime mora sadržavati bar 3 znakova.";
    }
    $regexEmail = "/[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/";
    if (!preg_match($regexEmail, $_POST['email'])) {
        $greskaEmail = "Upisan e-mail je krivog formata. \r\n";
    }
    $regexLozinka = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
    if (!preg_match($regexLozinka, $_POST['lozinka'])) {
        $greskaLozinka2 = "Lozinka mora imati barem 8 znakova, sadržavati bar jedno veliko slovo, jedno malo slovo i jedan broj.";
    }
    if (isset($_POST['korisnicko_ime'])) {
        $greskaKorime = ProvjeriKorIme();
    }
    
    if ($responseKeys["success"] && empty($greskaCaptcha) && empty($greskaLozinka) && empty($greskaEmail) && empty($greskaIme) && empty($greskaPrezime) && 
            empty($greskaLozinka2) && empty($greskaKorime)) {
        $datum_reg = date("Y-m-d");
        $salt = sha1("123");
        $prihvaceniUvjeti = $_COOKIE['kolacici'];
        $kriptiranaLozinka = hash("sha256", $salt."--".$lozinka);
        $insert = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, lozinka_sha256, email, datum_registracije, uvjeti, blokiran, status, zakljucan, uloga_id) VALUES "
                . "('{$ime}', "
        . "'{$prezime}', '{$korisnicko_ime}', '{$lozinka}', '{$kriptiranaLozinka}', '{$mail}', '{$datum_reg}', "
        . "'{$prihvaceniUvjeti}', 0, 0, 'ne', 3);";
        $rezultat2 = $veza->selectDB($insert);
        if ($rezultat2) {
            $mail_to = $_POST['email'];
            $mail_from = "From: noreply@barka.foi.hr";
            $mail_subject = "Aktivacija računa";
            $mail_body = "Kopirajte link u browser kako bi potvrdili svoj račun.      "
                    . "http://barka.foi.hr/WebDiP/2020_projekti/WebDiP2020x092/forms/potvrdaMaila.php?id={$korisnicko_ime}";
            if (mail($mail_to, $mail_subject, $mail_body, $mail_from)) {
                $potvrdenMail = "<script>alert('Poslan ti je mail za aktivaciju računa.');</script>";
            }
            else {
                echo "Došlo je do greške.";
            }
        }
    } 
    else {
        echo "GREŠKA";
    } 
    $veza->zatvoriDB();
}

function ProvjeriKorIme(){
    global $veza;
    $query = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = '{$_POST['korisnicko_ime']}'";
    $result = $veza->selectDB($query);
    if (mysqli_num_rows($result) > 0) {
        $greskaKorime = "Korisničko ime je već zauzeto.";
        return $greskaKorime;
    }
    else {
        $greskaKorime = "";
        return $greskaKorime;
    }
}
$stranica = "forms/registracija.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("potvrdenMail", $potvrdenMail);
$smarty->assign("greskaLozinka", htmlspecialchars($greskaLozinka, ENT_COMPAT, 'UTF-8'));
$smarty->assign("greskaEmail", htmlspecialchars($greskaEmail, ENT_COMPAT, 'UTF-8'));
$smarty->assign("greskaIme", htmlspecialchars($greskaIme, ENT_COMPAT, 'UTF-8'));
$smarty->assign("greskaPrezime", htmlspecialchars($greskaPrezime, ENT_COMPAT, 'UTF-8'));
$smarty->assign("greskaKorime", htmlspecialchars($greskaKorime, ENT_COMPAT, 'UTF-8'));
$smarty->assign("greskaLozinka2", htmlspecialchars($greskaLozinka2, ENT_COMPAT, 'UTF-8'));
$smarty->assign("greskaCaptcha", htmlspecialchars($greskaCaptcha, ENT_COMPAT, 'UTF-8'));
$smarty->display("registracija.tpl");
$smarty->display("footer.tpl");
?>