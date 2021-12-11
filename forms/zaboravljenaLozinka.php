<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Prijava";
$h1 = "Prijava";
include '../headers.php';
global $greskaKorime;
$veza = new Baza();
$veza->spojiDB();
if (isset($_GET['submit'])) {
    $query = "SELECT korisnicko_ime, email FROM korisnik WHERE korisnicko_ime = '{$_GET['korisnicko_ime']}'";
    $result = $veza->selectDB($query);
    if (mysqli_num_rows($result) == 0) {
        $greskaKorime = "Upisano korisničko ime ne postoji.";
    }
    else {
        $greskaKorime = "";
        while ($red = mysqli_fetch_array($result)) {
            if ($red) {
            $permitted_chars1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $permitted_chars2 = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $lozinka = "";
            $lozinka .= substr(str_shuffle($permitted_chars1), 0, 1);
            $lozinka .= random_int(1, 9);
            $lozinka .= substr(str_shuffle($permitted_chars2), 0, 6);
            $salt = sha1("123");
            $kriptiranaLozinka = hash("sha256", $salt."--".$lozinka);
            $mail_to = $red['email'];
            $mail_from = "From: noreply@barka.foi.hr";
            $mail_subject = "Povrat zaboravljene lozinke";
            $mail_body = "Vaša nova lozinka je: {$lozinka} .";
            if (mail($mail_to, $mail_subject, $mail_body, $mail_from)) {
                $upitLozinka = "UPDATE korisnik SET lozinka = '{$lozinka}', lozinka_sha256 = '{$kriptiranaLozinka}' WHERE korisnicko_ime = '{$_GET['korisnicko_ime']}'";
                $rezLozinka = $veza->selectDB($upitLozinka);
                $veza->zatvoriDB();
                $potvrdenMail = "<script>alert('Poslan ti je mail sa novom lozinkom.');</script>";
                header("Location: {$putanja}/forms/login.php");
            }
            else {
                $greskaKorime = "Došlo je do greške.";
            }
            }
        }
    }
    $veza->zatvoriDB();
}

$stranica = "forms/zaboravljenaLozinka.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("greskaKorime", htmlspecialchars($greskaKorime, ENT_COMPAT, 'UTF-8'));
$smarty->display("zaboravljenaLozinka.tpl");
$smarty->display("footer.tpl");
?>