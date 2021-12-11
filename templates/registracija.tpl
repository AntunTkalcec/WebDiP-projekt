{if isset({$potvrdenMail})}
    {$potvrdenMail}
    {/if}
<form name="registracija" id="registracija" method="post" action="{$smarty.server.PHP_SELF}">
<div class="obrazac">
    <h1>{$h1}</h1>
    <p class="info">Popunite sve dijelove obrasca kako bi se registrirali!</p>
    <hr>
    {if isset({$greskaEmail})}
        <p style="color: red; font-weight: bold;">{$greskaEmail}</p>
        {/if}
    <label for="email"><b>E-mail</b></label>
    <input type="text" placeholder="Upiši email..." name="email" id="email" required>
    {if isset({$greskaIme})}
        <p style="color: red; font-weight: bold;">{$greskaIme}</p>
        {/if}
    <label for="ime"><b>Ime</b></label>
    <input type="text" placeholder="Upiši ime..." name="ime" id="ime" required>
    {if isset({$greskaPrezime})}
        <p style="color: red; font-weight: bold;">{$greskaPrezime}</p>
        {/if}
    <label for="prezime"><b>Prezime</b></label>
    <input type="text" placeholder="Upiši prezime..." name="prezime" id="prezime">
    {if isset({$greskaKorime})}
        <p style="color: red; font-weight: bold;">{$greskaKorime}</p>
        {/if}
    <label for="korisnicko_ime"><b>Korisničko ime</b></label>
    <input type="text" placeholder="Upiši korisničko ime..." name="korisnicko_ime" id="korisnicko_ime" required onkeyup="provjeri();">
    <span id="korimeStatus" style="font-size: 16px;"></span>
    {if isset({$greskaLozinka2})}
        <p style="color: red; font-weight: bold;">{$greskaLozinka2}</p>
        {/if}
    <label for="lozinka"><b>Lozinka</b></label>
    <input type="password" placeholder="Upiši lozinku..." name="lozinka" id="lozinka" required>
    {if isset({$greskaLozinka})}
        <p style="color: red; font-weight: bold;">{$greskaLozinka}</p>
        {/if}
    <label for="lozinka_potvrda"><b>Potvrdi lozinku</b></label>
    <input type="password" placeholder="Ponovi lozinku..." name="lozinka_potvrda" id="lozinka_potvrda" required>
    <hr>
    <div class="g-recaptcha" data-sitekey="6LfBk_EaAAAAACNmV5sUN1QsskYIXwPWl5wjZt7i"></div>
    {if isset({$greskaCaptcha})}
        <h2>{$greskaCaptcha}</h2>
        {/if}
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitReg">Registriraj se</button>
</div>
</form>
    </div>
            <div id="help" class="help1">
            <div class="help1-content">
                <div class="help1-header">
                <span class="help1-close">&times;</span>
                <h2>Registracija</h2>
            </div>
                <div class="help1-body">
                    <p>Ovo je stranica za registraciju. Možete se registrirati, te tako doći do svih ostalih funkcionalnosti aplikacije. 
                        Pazite na točnost upisanih vrijednosti, ukoliko ne poštujete sva pravila, ne možete se registrirati!
                        Nakon registracije ćete morati potvrditi svoj račun klikom na link u mailu.</p>
                </div>
                <div class="help1-footer"><p>Pomoć</p></div>
        </div>