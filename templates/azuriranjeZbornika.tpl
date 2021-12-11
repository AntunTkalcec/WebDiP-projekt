<h1>{$h1}</h1>
<form name="azuriranjeZbornika" id="azuriranjeZbornika" method="post" action="{$putanja}/forms/azuriranjeZbornika.php?id={$idZbornika}">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi ažurirali zbornik!</p>
    <hr>
    <label for="predgovor"><b>Predgovor</b></label>
    <input type="text" placeholder="Upiši predgovor..." name="predgovor" id="predgovor" required value='{$predgovor}'>
    <label for='kategorija'><b>Kategorija</b></label>
    <input type="text" id="kategorija" name="kategorija" value="{$kategorija}" required readonly>
    <label for="godina"><b>Godina</b></label>
    <input type="text" placeholder="Upiši godinu..." name="godina" id="godina" required value='{$godina}'>
    {if isset({$greskaNaziv})}
        <p style="color: red; font-weight: bold;">{$greskaNaziv}</p>
        {/if}
    <label for='naziv'><b>Naziv</b></label>
    <input type='text' placeholder="Upiši naziv..." name="naziv" id="naziv" required value="{$stariNaziv}">
    <label for="biografije"><b>Biografije</b></label>
    <select multiple name="biografije[]" id="biografije" class="select" required>
        {while $redBiografije = mysqli_fetch_array($rezultatBiografije)}
            <option value="{$redBiografije['naziv']}">{$redBiografije['naziv']}</option>
            {/while}
    </select>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitZbornik">Ažuriraj zbornik</button>
</div>
</form>
    </div>
