<form name="prijava" id="prijava" method="get" action="{$smarty.server.PHP_SELF}"
<div class="obrazac">
    <h1>{$h1}</h1>
    <p class="info">Zaboravljena lozinka</p>
    <hr>
    {if isset({$greskaKorime})}
        <p style="color: red; font-weight: bold;">{$greskaKorime}</p>
        {/if}
    <label for="korisnicko_ime"><b>Korisničko ime</b></label>
    <input type="text" placeholder="Upiši korisničko ime..." name="korisnicko_ime" id="korisnicko_ime" required autofocus>
    <hr>
    <button type="submit" class="registriraj" name="submit">Pošalji mail</button>
</div>
</form>