<h1>{$h1}</h1>
{if !empty($greska)}
    <p style="color: red; font-weight: bold; margin-left: auto; margin-right: auto;">{$greska}</p>
    {/if}
{if empty($greska)}
<form name="dorada" id="dorada" method="post" action="{$smarty.server.PHP_SELF}">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi poslali biografiju na doradu!</p>
    <hr>
    <label for="identifikator"><b>Identifikator</b></label>
    <input type="text" name="identifikator" id="identifikator" required readonly value="{$idBiografije}">
    <label for='razlogDorade'><b>Razlog dorade</b></label>
    <input type='text' placeholder="Upiši razlog dorade..." name="razlogDorade" id="razlogDorade" required>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitDoradu">Pošalji zahtjev za doradu</button>
</div>
</form>
    </div>
    {/if}
