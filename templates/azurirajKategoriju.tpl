<h1>{$h1}</h1>
<form name="azuriranjeKategorije" id="azuriranjeKategorije" method="post" action="{$putanja}/forms/azurirajKategoriju.php?id={$idKategorije}">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi ažurirali kategoriju!</p>
    <hr>
    <label for="id"><b>ID</b></label>
    <input type="text" name="id" id="id" required value='{$idKategorije}' readonly>
    <label for='naziv'><b>Naziv</b></label>
    <input type="text" id="naziv" name="naziv" value="{$naziv}" required>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitKategoriju">Ažuriraj kategoriju</button>
</div>
</form>
    </div>