<?php
$putanja = dirname($_SERVER['REQUEST_URI'], 2);
$direktorij = dirname(getcwd());
$naslov = "potvrda računa";
$h1 = "potvrda računa";
include '../headers.php';
if (isset($_GET['id']) && !empty($_GET['id'])){
    $korime = $_GET['id'];
    $veza = new Baza();
    $veza->spojiDB();
    $upit = "UPDATE korisnik SET status = 1 WHERE korisnicko_ime = '{$korime}'";
    $rezultat = $veza->selectDB($upit);
    if (!$rezultat) {
        echo "Došlo je do greške.";
    }
    else {
        $upit2 = "SELECT * FROM korisnik WHERE korisnicko_ime = '{$korime}'";
        $rezultat2 = $veza->selectDB($upit2);
        while ($red = mysqli_fetch_array($rezultat2)) {
            if ($red) {
                $autenticiran = true;
                $tip = $red["uloga_id"];
            }
        }
        if ($autenticiran) {
            setcookie('korisnicko_ime', $korime, 0, "/");
            Sesija::kreirajKorisnika($korime, $tip);
            header("Location: ../index.php");
        }
        else {
            echo "Došlo je do greške.";
        }
    }
    $veza->zatvoriDB();
}

?>