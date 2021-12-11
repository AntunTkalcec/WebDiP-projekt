<h1>{$h1}</h1>
<div class='table-wrapper'>
        <table class="tablica" id='tablicaRacuni'>
            <caption style='font-size: 24px;'>Popis korisničkih računa</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Korisničko ime</th>
                    <th>Zaključan</th>
                    <th>Blokiran</th>
                </tr>
            </thead>
            <tbody>
                {while $red = mysqli_fetch_assoc($rezultat)}
                    <tr>
                        <td><a style="font-weight: bold;" href="{$putanja}/forms/upravljanjeRacunima.php?id={$red['korisnik_id']}">{$red['korisnik_id']}</a></td>
                        <td>{$red['korisnicko_ime']}</a></td>
                        <td>{$red['zakljucan']}</td>
                        <td>{$red['blokiran']}</td>
                    </tr>
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
