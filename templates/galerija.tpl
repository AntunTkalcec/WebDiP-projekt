<h1>{$naslov}</h1>
{while $red = mysqli_fetch_array($rezultat)}
    <figure class="galerija">
        <img style="width:100%;" src="{$putanja}/media/{$red['naziv']}" alt='slika' title='{$red['naziv']}'/>
    </figure>
    <hr>
    {/while}