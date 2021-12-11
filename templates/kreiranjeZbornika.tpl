<h1>{$h1}</h1>
{if $biranjeGodine == 1}
<form name="kreiranjeZbornika" id="kreiranjeZbornika" method="post" action="{$putanja}/forms/kreiranjeZbornika.php?id=2">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi kreirali zbornik!</p>
    <hr>
    <label for="predgovor"><b>Predgovor</b></label>
    <input type="text" placeholder="Upiši predgovor..." name="predgovor" id="predgovor" required>
    <label for='kategorija'><b>Kategorija</b></label>
    <select name="kategorija" id="kategorija" class="select">
        {while $redKategorije = mysqli_fetch_array($rezultatKategorije)}
            <option value="{$redKategorije['naziv']}">{$redKategorije['naziv']}</option>
            {/while}
    </select>
    <label for="godina"><b>Godina</b></label>
    <input type="text" placeholder="Upiši godinu..." name="godina" id="godina" required>
    {if isset({$greskaNaziv})}
        <p style="color: red; font-weight: bold;">{$greskaNaziv}</p>
        {/if}
    <label for='naziv'><b>Naziv</b></label>
    <input type='text' placeholder="Upiši naziv..." name="naziv" id="naziv" required>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitZbornik">Dohvati popis biografija</button>
</div>
</form>
    </div>
    {/if}
    {if $biranjeGodine == 0 && $biranjeBiografija == 1}
        <form name="kreiranjeZbornika" id="kreiranjeZbornika" method="post" action="{$smarty.server.PHP_SELF}">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi kreirali zbornik!</p>
    <hr>
    <label for="predgovor"><b>Predgovor</b></label>
    <input type="text" placeholder="Upiši predgovor..." name="predgovor" id="predgovor" required value='{$predgovor}'>
    <label for='kategorija'><b>Kategorija</b></label>
    <select name="kategorija" id="kategorija" class="select">
        <option value='{$kategorija}'>{$kategorija}</option>
    </select>
    <label for="godina"><b>Godina</b></label>
    <input type="text" placeholder="Upiši godinu..." name="godina" id="godina" required value='{$odabranaGodina}'>
    {if isset({$greskaNaziv})}
        <p style="color: red; font-weight: bold;">{$greskaNaziv}</p>
        {/if}
    <label for='naziv'><b>Naziv</b></label>
    <input type='text' placeholder="Upiši naziv..." name="naziv" id="naziv" required value="{$naziv}">
    <label for="biografije"><b>Biografije</b></label>
    <select multiple name="biografije[]" id="biografije" class="select" required>
        {while $redBiografije = mysqli_fetch_array($rezultatBiografije)}
            <option value="{$redBiografije['naziv']}">{$redBiografije['naziv']}</option>
            {/while}
    </select>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitZbornik">Kreiraj zbornik</button>
</div>
</form>
    </div>
        {/if}