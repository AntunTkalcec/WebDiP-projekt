<h1>{$naslov}</h1>
<div class="cookie-banner" style="display:none">
    <p>Korištenjem ove stranice, prihvaćate korištenje kolačića.</p>
    <button class="close-cookie-banner">OK</button>
    {if isset($uvjeti)}
        {$uvjeti}
        {/if}
        </div>
        {if isset($smarty.session.uloga) && $smarty.session.uloga < 3}
            <div class='table-wrapper'>
        <table class="tablica" id='tablica5'>
            <caption style='font-size: 24px;'>Popis zahtjeva za objavu biografije</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv biografije</th>
                    <th>Zahtjev objave</th>
                    <th>Razlog dorade</th>
                    <th>Provjera materijala</th>
                </tr>
            </thead>
            <tbody>
                {while $red = mysqli_fetch_assoc($rezultat5)}
                    {if !empty($red['razlog_dorade']) && $red['provjera_materijala'] === 1}
                    <tr style="font-weight: bold; color: red;">
                        <td><a style="font-weight: bold;" href="{$putanja}/forms/potvrdi_odbij.php?id={$red['biografija_id']}">{$red['biografija_id']}</a></td>
                        <td>{$red['naziv']}</a></td>
                        <td>{$red['zahtjev_objave']}</td>
                        <td>{$red['razlog_dorade']}</td>
                        <td>{$red['provjera_materijala']}</td>
                    </tr>
                    {else}
                        <tr>
                        <td><a style="font-weight: bold;" href="{$putanja}/forms/potvrdi_odbij.php?id={$red['biografija_id']}">{$red['biografija_id']}</a></td>
                        <td>{$red['naziv']}</a></td>
                        <td>{$red['zahtjev_objave']}</td>
                        <td>{$red['razlog_dorade']}</td>
                        <td>{$red['provjera_materijala']}</td>
                    </tr>
                    {/if}
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            
            <div class='table-wrapper'>
        <table class="tablica" id='tablica4'>
            <caption style='font-size: 24px;'>Sve biografije</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv biografije</th>
                    <th>Datum kreiranja</th>
                    <th>Sadržaj</th>
                    <th>Status</th>
                    <th>Zahtjev objave</th>
                    <th>Razlog dorade</th>
                </tr>
            </thead>
            <tbody>
                {while $red = mysqli_fetch_assoc($rezultat4)}
                    <tr>
                        <td><a style="font-weight: bold;" id="dorada" href="{$putanja}/forms/dorada.php?id={$red['biografija_id']}">{$red['biografija_id']}</a></td>
                        <td>{$red['naziv']}</a></td>
                        <td>{$red['datum_upisa']}</td>
                        <td>{$red['tekst_biografije']}</td>
                        <td>{$red['status']}</td>
                        {if empty($red['zahtjev_objave'])}
                            <td>-</td>
                            {else}
                        <td>{$red['zahtjev_objave']}</td>
                        {/if}
                        {if empty($red['razlog_dorade'])}
                            <td>-</td>
                            {else}
                        <td>{$red['razlog_dorade']}</td>
                        {/if}
                    </tr>
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            {/if}
        {if isset($smarty.session.uloga) && $smarty.session.uloga !== 4}
            <div class='table-wrapper'>
        <table class="tablica" id='tablica3'>
            <caption style='font-size: 24px;'>Moje biografije</caption>
            <thead>
                <tr>
                    <th>Naziv biografije</th>
                    <th>Datum kreiranja</th>
                    <th>Status</th>
                    <th>Razlog dorade</th>
                </tr>
            </thead>
            <tbody>
                {while $red = mysqli_fetch_assoc($rezultat3)}
                    <tr>
                        <td><a style="font-weight: bold;" id='zahtjev' href="{$putanja}/forms/posaljiZahtjev.php?id={$red['naziv']}">{$red['naziv']}</a></td>
                        <td>{$red['datum_upisa']}</td>
                        <td>{$red['status']}</td>
                        {if empty($red['razlog_dorade'])}
                            <td>-</td>
                            {else}
                        <td>{$red['razlog_dorade']}</td>
                        {/if}
                    </tr>
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            {/if}
        <div class='table-wrapper'>
        <table class="tablica" id='tablica1'>
            <caption style='font-size: 18px;'>Statistika broja zbornika po kategoriji biografija</caption>
            <thead>
                <tr>
                    <th>Broj zbornika</th>
                    <th>Kategorija biografije</th>
                </tr>
            </thead>
            <tbody>
                {while $red = mysqli_fetch_assoc($rezultat)}
                    <tr>
                        <td>{$red['br']}</td>
                        <td>{$red['naziv']}</td>
                    </tr>
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            
            <div class='table-wrapper'>
        <table class="tablica" id='tablica2'>
            <caption style='font-size: 18px;'>Popis zbornika grupiran po kategorijama</caption>
            <thead>
                <tr>
                    <th>Naziv zbornika</th>
                    <th>Godina</th>
                    <th>Predgovor</th>
                    <th>Kategorija</th>
                </tr>
            </thead>
            <tbody>
                {while $red2 = mysqli_fetch_assoc($rezultat2)}
                    <tr>
                        <td><a style="font-weight: bold;" id='nazivZbornika' href='{$putanja}/popisBiografija.php?id={$red2['naziv']}'>{$red2['naziv']}</a></td>
                        <td>{$red2['godina']}</td>
                        <td>{$red2['predgovor']}</td>
                        <td>{$red2['kategorija']}</td>
                    </tr>
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            <div id="help" class="help1">
            <div class="help1-content">
                <div class="help1-header">
                <span class="help1-close">&times;</span>
                <h2>Home</h2>
            </div>
                <div class="help1-body">
                    <p>Ovo je početna stranica. Možete vidjeti tablice koje prikazuju razne statistike i popise. Ako odaberete jedan od zbornika, 
                        vidjet ćete popis biografija i korisnika u tom zborniku. Ukoliko ste prijavljeni i kreirali ste neku biografiju,
                        možete na nju kliknuti kako bi poslali zahtjev za njenu objavu.</p>
                </div>
                <div class="help1-footer"><p>Pomoć</p></div>
        </div>
                {if {$alertKriviZahtjev} == 1}
                    <script>alert("Zahtjev objave za tu biografiju je već poslan u zadnjih godinu dana.");</script>
                    {/if}
                {if {$alertDobarZahtjev} == 1}
                    <script>alert("Zahtjev za objavu vaše biografije je poslan.");</script>
                    {/if}