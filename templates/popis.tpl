<h1>{$h1}</h1>
<div class='table-wrapper'>
        <table class="tablica" id='tablica2'>
            <caption style='font-size: 24px;'>Popis biografija</caption>
            <thead>
                <tr>
                    <th>Naziv biografije</th>
                    <th>Autor biografije</th>
                </tr>
            </thead>
            <tbody>
                {while $red = mysqli_fetch_assoc($rezultat)}
                    <tr>
                        <td>{$red['Naziv biografije']}</td>
                        <td>{$red['Autor biografije']}</td>
                    </tr>
                    {/while}
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>