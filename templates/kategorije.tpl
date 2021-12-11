<h1>{$h1}</h1>
<div class='table-wrapper'>
        <table class="tablica" id='tablicaRacuni'>
            <caption style='font-size: 24px;'>Popis kategorija</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv</th>
                </tr>
            </thead>
            <tbody>
                {while $red = mysqli_fetch_assoc($rezultat)}
                    <tr>
                        <td><a style="font-weight: bold;" href="{$putanja}/forms/azurirajKategoriju.php?id={$red['kategorija_id']}">{$red['kategorija_id']}</a></td>
                        <td>{$red['naziv']}</a></td>
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            <form name="novaKategorija" id="novaKategorija" method="post" action="">
<div class="obrazac">
    <a href="{$putanja}/forms/novaKategorija.php"><button type="button" value="qwe" name="dodajKategoriju" class="registriraj" id="dodajKategoriju">Dodaj kategoriju</a></button>
</div>
            </form>
