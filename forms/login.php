<?php

$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "Prijava";
$h1 = "Prijava";
include '../headers.php';
global $greskaLozinka;
global $greskaKorime;
$korime = "";
$veza = new Baza();
if (isset($_COOKIE['korisnik'])) {
    $korime = $_COOKIE['korisnik'];
}

if (isset($_GET['submit'])) {
    $veza->spojiDB();
    $korime = $_GET['korisnicko_ime'];
    if (isset($_COOKIE['prijava'])) {
        if ($_COOKIE['prijava'] == "3") {
            $greskaKorime = "Pokušali ste već 3 puta napraviti prijavu! Račun je zaključan! Javite se administratoru kako bi se mogao otključati.";
            $query = "UPDATE korisnik SET zakljucan = 'da' WHERE korisnicko_ime = '{$korime}'";
            $result = $veza->selectDB($query);
            setcookie('prijava', '', time() - 3600, "/");
        }
    }
    if (empty($_GET['korisnicko_ime'])) {
        $greskaKorime = "Nije popunjeno polje za korisničko ime.";
    }
    if (empty($_GET['lozinka'])) {
        $greskaLozinka = "Nije popunjeno polje za lozinku.";
    }
    if (empty($greskaKorime) && empty($greskaLozinka)) {
        if (isset($_GET['zapamtiMe'])) {
            setcookie("korisnik", $korime, time() + (86400 * 7));
        }
        $loz = $_GET['lozinka'];
        $salt = sha1("123");
        $lozinka = hash("sha256", $salt . "--" . $loz);
        $upit = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$korime}' AND lozinka_sha256 = '{$lozinka}'";
        $rezultat = $veza->selectDB($upit);
        $autenticiran = false;
        while ($red = mysqli_fetch_array($rezultat)) {
            if ($red) {
                if ($red['blokiran'] == 1) {
                    $greskaKorime = "Korisnički račun je blokiran.";
                }
                else if ($red['zakljucan'] === "ne") {
                    if ($red['status'] == 1) {
                        $autenticiran = true;
                        $tip = $red['uloga_id'];
                    } else {
                        $greskaKorime = "Prvo trebate potvrditi svoj račun linkom koji Vam je poslan na mail!";
                    }
                } else {
                    $greskaKorime = "Korisnički račun je zaključan. Javite se administratoru kako bi se mogao otključati!";
                } 
            }
        }
        if ($autenticiran) {
            $greskaKorime = "";
            if (isset($_COOKIE['prijava'])) {
                setcookie('prijava', '', time() - 3600, "/");
            }
            setcookie('korisnicko_ime', $korime, 0, "/");
            Sesija::kreirajKorisnika($korime, $tip);
            $veza->zatvoriDB();
            header("Location: ../index.php");
        } else {
            if (empty($greskaKorime)) {
                $greskaKorime = "Krivo upisano korisničko ime ili lozinka.";
            }
            if (isset($_COOKIE['prijava'])) {
                $pokusaj = $_COOKIE['prijava'] + 1;
                setcookie("prijava", $pokusaj, time() + 300, "/");
            } else {
                setcookie("prijava", 1, time() + 300, "/");
            }
        }
    }
    $veza->zatvoriDB();
}
$stranica = "forms/login.php";
$smarty->assign("stranica", $stranica);
$smarty->assign("cookie_korime", $korime);
$smarty->assign("greskaKorime", htmlspecialchars($greskaKorime, ENT_COMPAT, 'UTF-8'));
$smarty->assign("greskaLozinka", htmlspecialchars($greskaLozinka, ENT_COMPAT, 'UTF-8'));
$smarty->display("prijava.tpl");
$smarty->display("footer.tpl");
?>