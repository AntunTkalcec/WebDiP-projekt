<h1>{$naslov}</h1>
<div class='table-wrapper'>
        <div class='table-wrapper'>
        <table class="tablica" id='tablica4'>
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
                        <td><a id='nazivBiografije' href="{$putanja}/forms/azuriranjeBiografije.php?id={$red['naziv']}">{$red['naziv']}</a></td>
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