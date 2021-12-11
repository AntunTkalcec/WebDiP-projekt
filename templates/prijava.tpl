<form name="prijava" id="prijava" method="get" action="{$smarty.server.PHP_SELF}"
<div class="obrazac">
    <h1>{$h1}</h1>
    <p class="info">Prijava u sustav</p>
    <hr>
    {if isset({$greskaKorime})}
        <p style="color: red; font-weight: bold;">{$greskaKorime}</p>
        {/if}
    <label for="korisnicko_ime"><b>Korisničko ime</b></label>
    {if isset({$cookie_korime})}
        <input type="text" placeholder="Upiši korisničko ime..." name="korisnicko_ime" id="korisnicko_ime" required autofocus value="{$cookie_korime}">
    {else}
    <input type="text" placeholder="Upiši korisničko ime..." name="korisnicko_ime" id="korisnicko_ime" required autofocus>
    {/if}
    {if isset({$greskaLozinka})}
        <p style="color: red; font-weight: bold;">{$greskaLozinka}</p>
        {/if}
    <label for="lozinka"><b>Lozinka</b></label>
    <input type="password" placeholder="Upiši lozinku..." name="lozinka" id="lozinka" required>
    <label for="zapamtiMe"><b>Zapamti me</b></label>
    <input type="checkbox" name="zapamtiMe" id="zapamtiMe">
    <hr>
    <button type="submit" class="registriraj" name="submit">Prijavi se</button>
</div>
<div style="font-weight:bold; text-align: center; margin-top: 10px;"><a href="{$putanja}/forms/zaboravljenaLozinka.php">Zaboravili ste lozinku?</a></div>
</form>
</div>
            <div id="help" class="help1">
            <div class="help1-content">
                <div class="help1-header">
                <span class="help1-close">&times;</span>
                <h2>Prijava</h2>
            </div>
                <div class="help1-body">
                    <p>Ovo je stranica za prijavu. Možete se prijaviti u svoj prethodno stvoreni i aktivirani račun. Pazite na upis vrijednosti, jer nakon 3 neuspjela pokušaja 
                        prijave vaš račun biva zaključan te ga može otključati samo admin aplikacije! </p>
                </div>
                <div class="help1-footer"><p>Pomoć</p></div>
        </div>