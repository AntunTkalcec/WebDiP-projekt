<h1>{$h1}</h1>
<form name="upravljanje" id="upravljanje" method="post" action="{$putanja}/forms/upravljanjeRacunima.php?id={$idKorisnika}">
<div class="obrazac">
    <p class="info">Podaci odabranog korisničkog računa:</p>
    <hr>
    <label for="id"><b>Identifikator</b></label>
    <input type="text" name="id" id="id" readonly value="{$idKorisnika}"
    <label for="email"><b>E-mail</b></label>
    <input type="text" name="email" id="email" readonly value="{$email}">
    <label for="ime"><b>Ime</b></label>
    <input type="text" name="ime" id="ime" readonly value="{$ime}">
    <label for="prezime"><b>Prezime</b></label>
    <input type="text" name="prezime" id="prezime" readonly value="{$prezime}">
    <label for="korisnicko_ime"><b>Korisničko ime</b></label>
    <input type="text" name="korisnicko_ime" id="korisnicko_ime" readonly value="{$korisnicko_ime}">
    <label for="lozinka"><b>Lozinka</b></label>
    <input type="text" name="lozinka" id="lozinka" readonly value="{$lozinka}">
    <label for="lozinka256"><b>Lozinka sha256</b></label>
    <input type="text" name="lozinka256" id="lozinka256" readonly value="{$lozinka256}">
    <label for="datum_registracije"><b>Datum registracije</b></label>
    <input type="text" name="datum_registracije" id="datum_registracije" readonly value="{$datum_registracije}">
    <label for="uvjeti"><b>Uvjeti</b></label>
    <input type="text" name="uvjeti" id="uvjeti" readonly value="{$uvjeti}">
    <label for="blokiran"><b>Blokiran</b></label>
    <input type="text" name="blokiran" id="blokiran" readonly value="{$blokiran}">
    <label for="status"><b>Status</b></label>
    <input type="text" name="status" id="status" readonly value="{$status}">
    <label for="zakljucan"><b>Zaključan</b></label>
    <input type="text" name="zakljucan" id="zakljucan" readonly value="{$zakljucan}">
    <label for="uloga"><b>Uloga</b></label>
    <input type="text" name="uloga" id="uloga" readonly value="{$uloga_id}">
    <hr>
    <button type="submit" name="submitBlok" class="registriraj" value="qwe" id="submitBlok">Blokiraj račun</button>
    <button type="submit" name="submitUnblock" class="registriraj" value="qwe" id="submitUnblock">Odblokiraj račun</button>
    <button type="submit" name="submitZaklj" class="registriraj" value="qwe" id="submitZaklj">Zaključaj račun</button>
    <button type="submit" name="submitOtklj" class="registriraj" value="qwe" id="submitOtklj">Otključaj račun</button>
</div>
</form>
