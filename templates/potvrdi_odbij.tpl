<h1>{$h1}</h1>
{if !empty($greska)}
    <p style="color: red; margin-left: auto; margin-right: auto;">{$greska}</p>
    
    <form name="odbij" id="odbij" method="post" action="{$smarty.server.PHP_SELF}">
    <div class="obrazac">
        <p class="info">Prihvatite ili odbijte biografiju!</p>
        <hr>
        <label for="identifikator"><b>Identifikator</b></label>
        <input type="text" name="identifikator" id="identifikator" required readonly value="{$idBiografije}">
        <label for='naziv'><b>Naziv</b></label>
        <input type='text' name="naziv" id="naziv" required value="{$naziv}" readonly>
        <hr>
        <button type="submit" name="odbij" class="registriraj" value="qwe" id="odbij">Odbij biografiju</button>
</div>
</form>
    </div>
    {/if}
{if empty($greska)}
<form name="potvrdi/odbij" id="potvrdi/odbij" method="post" action="{$smarty.server.PHP_SELF}">
<div class="obrazac">
    <p class="info">Prihvatite ili odbijte biografiju!</p>
    <hr>
    <label for="identifikator"><b>Identifikator</b></label>
    <input type="text" name="identifikator" id="identifikator" required readonly value="{$idBiografije}">
    <label for='naziv'><b>Naziv</b></label>
    <input type='text' name="naziv" id="naziv" required value="{$naziv}" readonly>
    <hr>
    <button type="submit" name="potvrdi" class="registriraj" value="qwe" id="potvrdi">Prihvati biografiju</button>
    <button type="submit" name="odbij" class="registriraj" value="qwe" id="odbij">Odbij biografiju</button>
</div>
</form>
    </div>
    {/if}
