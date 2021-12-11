<h1>{$h1}</h1>
<div class='table-wrapper'>
        <table class="tablica" id='tablicaZbornici'>
            <caption style='font-size: 18px;'>Popis zbornika</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv</th>
                    <th>Godina</th>
                    <th>Predgovor</th>
                    <th>Kategorija</th>
                </tr>
            </thead>
            <tbody>
                {while $red = mysqli_fetch_assoc($rezultat)}
                    <tr>
                        <td><a href='{$putanja}/forms/azuriranjeZbornika.php?id={$red['zbornik_id']}'>{$red['zbornik_id']}</a></td>
                        <td>{$red['Naziv zbornika']}</td>
                        <td>{$red['godina']}</td>
                        <td>{$red['predgovor']}</td>
                        <td>{$red['naziv']}</td>
                    </tr>
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            <hr>
            <a href="{$putanja}/forms/kreiranjeZbornika.php"><button type="button" name="button" class="registriraj" value="qwe" id="buttonZbornik">Kreiraj zbornik</button></a>