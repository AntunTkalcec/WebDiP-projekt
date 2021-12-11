<?php
$putanja = dirname($_SERVER['REQUEST_URI']);
$direktorij = getcwd();
require "$direktorij/baza.class.php";
$veza = new Baza();
$veza->spojiDB();
$upit = "SELECT * FROM biografija WHERE status = 'potvrđeno' or status = 'u zborniku' ORDER BY biografija_id ASC LIMIT 10;";
$rezultat = $veza->selectDB($upit);
header("Content-type: text/xml");
echo "
<rss version='2.0'>
<channel>
<title>RSS</title>
<link>/</link>
<description>RSS</description>
<language>en-us</language>";
while ($red = mysqli_fetch_array($rezultat)) {
    $title = $red['naziv'];
    $link = "barka.foi.hr/WebDiP/2020/zadaca_04/atkalcec/obrasci/obrazac.php?id={$red['biografija_id']}";
    $description = $red['tekst_biografije'];

    echo "<item>
    <title>{$title}</title>
    <link>{$link}</link>
    <description>{$description}</description>
    </item>";
}
echo "</channel>"
. "</rss>";
?>