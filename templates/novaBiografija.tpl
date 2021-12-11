<form name="novaBiografija" id="novaBiografija" method="post" action="{$smarty.server.PHP_SELF}" enctype="multipart/form-data">
<div class="obrazac">
    <h1>{$h1}</h1>
    <p class="info">Kreirajte novu biografiju!</p>
    <hr>
    {if isset({$greskaNaziv})}
        <p style="color: red; font-weight: bold;">{$greskaNaziv}</p>
        {/if}
    <label for="naziv"><b>Naziv</b></label>
    <input type="text" placeholder="Upiši naziv..." name="naziv" id="naziv" required onkeyup="provjeriBiografiju();">
    <span id="nazivStatus" style="font-size: 16px;"></span>
    {if isset({$greskaPodaci})}
        <p style="color: red; font-weight: bold;">{$greskaPodaci}</p>
        {/if}
    <label for="podaci"><b>Osobni podaci</b></label>
    <input type="text" placeholder="Upiši osobne podatke..." name="podaci" id="podaci" required>
    {if isset({$greskaObrazovanje})}
        <p style="color: red; font-weight: bold;">{$greskaObrazovanje}</p>
        {/if}
    <label for="obrazovanje"><b>Obrazovanje</b></label>
    <input type="text" placeholder="Upiši obrazovanje..." name="obrazovanje" id="obrazovanje">
    {if isset({$greskaVjestine})}
        <p style="color: red; font-weight: bold;">{$greskaVjestine}</p>
        {/if}
    <label for="vjestine"><b>Vještine</b></label>
    <input type="text" placeholder="Upiši vještine..." name="vjestine" id="vjestine">
    {if isset({$greskaIskustvo})}
        <p style="color: red; font-weight: bold;">{$greskaIskustvo}</p>
        {/if}
    <label for="iskustvo"><b>Radno iskustvo</b></label>
    <input type="text" placeholder="Upiši radno iskustvo..." name="iskustvo" id="iskustvo">
    {if isset({$greskaInteresi})}
        <p style="color: red; font-weight: bold;">{$greskaInteresi}</p>
        {/if}
    <label for="interesi"><b>Interesi</b></label>
    <input type="text" placeholder="Upiši interese..." name="interesi" id="interesi">
    {if isset({$greskaTekst})}
        <p style="color: red; font-weight: bold;">{$greskaTekst}</p>
        {/if}
    <label for="tekst"><b>Tekst biografije</b></label>
    <textarea id="tekst" name="tekst" placeholder="Upiši tekst biografije..." style="height: 250px;"></textarea>
    {if isset({$greskaKategorija})}
        <p style="color: red; font-weight: bold;">{$greskaKategorija}</p>
        {/if}
    <label for="kategorija"><b>Kategorija</b></label>
    <select name="kategorija" id="kategorija" class="select">
        <option value="Znanstvenici">Znanstvenici</option>
        <option value="Pisci">Pisci</option>
        <option value="Redatelji">Redatelji</option>
        <option value="Glumci">Glumci</option>
        <option value="Političari">Političari</option>
        <option value="Ostale ličnosti">Ostale ličnosti</option>
    </select>
    {if isset({$greskaMaterijal})}
        <p style="color: red; font-weight: bold;">{$greskaMaterijal}</p>
        {/if}
    <label for="materijal"><b>Materijal</b></label>
    <select name="materijalSelect" id="materijalSelect" class="select">
        <option value="slika">Slika</option>
        <option value="video">Video</option>
        <option value="audio">Audio</option>
        <option vlaue="gif">GIF</option>
    </select>
    <br>
    <input name="materijal" type="file" id="materijal"/>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitBio">Kreiraj biografiju</button>
</div>
</form>
    </div>
            <div id="help" class="help1">
            <div class="help1-content">
                <div class="help1-header">
                <span class="help1-close">&times;</span>
                <h2>Nova biografija</h2>
            </div>
                <div class="help1-body">
                    <p>Ovo je stranica za kreiranje nove biografije. Možete kreirati novu biografiju, koju će moderator morati odobriti prije nego je ona vidljiva.</p>
                </div>
                <div class="help1-footer"><p>Pomoć</p></div>
        </div>