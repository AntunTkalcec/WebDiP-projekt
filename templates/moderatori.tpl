<h1>{$h1}</h1>
<div class='table-wrapper'>
        <table class="tablica" id='tablicaModeratori'>
            <caption style='font-size: 24px;'>Popis moderatora</caption>
            <thead>
                <tr>
                    <th>ID moderatora</th>
                    <th>Korisničko ime moderatora</th>
                    <th>ID korisnika/moderatora</th>
                    <th>Upravljane kategorije</th>
                </tr>
            </thead>
            <tbody>
                {while $red = mysqli_fetch_assoc($rezultat)}
                    <tr>
                        <td>{$red['moderator_id']}</td>
                        <td>{$red['korisnicko_ime']}</a></td>
                        <td>{$red['korisnik_id']}</td>
                        <td>{$red['kategorije']}</td>
                    </tr>
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            <form name="noviModerator" id="noviModerator" method="post" action="">
<div class="obrazac">
    <a href="{$putanja}/forms/noviModerator.php"><button type="button" value="qwe" name="dodajModeratora" class="registriraj" id="dodajModeratora">Dodaj moderatora</a></button>
</div>
            </form>
            