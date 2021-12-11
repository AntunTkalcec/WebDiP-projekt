<h1>{$h1}</h1>
<form name="moderator" id="moderator" method="post" action="{$smarty.server.PHP_SELF}">
<div class="obrazac">
    <p class="info">Izaberite korisnika kojeg želite unaprijediti u moderatora i kategorije kojima će upravljati:</p>
    <hr>
    <label for="korisnik"><b>Korisnik</b></label>
    <select name="korisnik" id="korisnik" class="select" required>
        {while $redKorisnici = mysqli_fetch_array($rezKorisnici)}
            <option value="{$redKorisnici['korisnik_id']}">{$redKorisnici['korisnicko_ime']}</option>
            {/while}
    </select>
    <label for="kategorije"><b>Kategorije</b></label>
    <select multiple name="kategorije[]" id="kategorije" class="select" required>
        {while $redKategorije = mysqli_fetch_array($rezKategorije)}
            <option value="{$redKategorije['kategorija_id']}">{$redKategorije['naziv']}</option>
            {/while}
    </select>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submit">Dodaj moderatora</button>
</div>
</form>