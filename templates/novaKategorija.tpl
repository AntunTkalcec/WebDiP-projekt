<h1>{$h1}</h1>
<form name="novaKategorija" id="novaKategorija" method="post" action="{$smarty.server.PHP_SELF}">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi stvorili kategoriju!</p>
    <hr>
    <label for='naziv'><b>Naziv</b></label>
    <input type="text" id="naziv" name="naziv" required>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitKat">Stvori kategoriju</button>
</div>
</form>
    </div>