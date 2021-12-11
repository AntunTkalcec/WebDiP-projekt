<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title>{$naslov}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Biografije"/>
        <meta name="naslov" content="Biografije">
        <meta name="autor" content="Antun Tkalčec">
        <meta name="opis" content ="Datum kreiranja: 25.05.2021.">
        <meta name="kljucne_rijeci" content="biografija, podaci, znanje">
        <link rel="stylesheet" type="text/css" href="{$putanja}/css/atkalcec.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="{$putanja}/javascript/atkalcec_jquery.js"></script>
    </head>
    <body>
        <header>
            <ul class="nav">
        {if !isset($smarty.session.uloga)}
            <li><a href="{$putanja}/index.php">Home</a></li>
            <li><a href="{$putanja}/forms/login.php">Prijava</a></li>
            <li><a href="{$putanja}/forms/registracija.php">Registracija</a></li>
            <li><a href="{$putanja}/autor.html">O autoru</a></li>
            <li><a href="javascript:helper()">Pomoć</a></li>
            <li><a href="{$putanja}/dokumentacija.html">Dokumentacija</a></li>
        {/if}
        {if isset($smarty.session.uloga) && $smarty.session.uloga == 3}
        <li><a href="{$putanja}/index.php">Home</a></li>
        <li><a href="{$putanja}/forms/novaBiografija.php">Kreiraj biografiju</a></li>
        <li><a href="{$putanja}/forms/azurirajBiografiju.php">Ažuriraj biografiju</a></li>
        <li><a href="{$putanja}/galerija.php">Galerija</a></li>
        <li><a href="{$putanja}/autor.html">O autoru</a></li>
        <li><a href="{$putanja}/forms/logout.php">Odjava</a></li>
        <li><a href="javascript:helper()">Pomoć</a></li>
        <li><a href="{$putanja}/dokumentacija.html">Dokumentacija</a></li>
        {/if}
        {if isset($smarty.session.uloga) && $smarty.session.uloga == 2}
        <li><a href="{$putanja}/index.php">Home</a></li>
        <li><a href="{$putanja}/forms/novaBiografija.php">Kreiraj biografiju</a></li>
        <li><a href="{$putanja}/forms/azurirajBiografiju.php">Ažuriraj biografiju</a></li>
        <li><a href="{$putanja}/galerija.php">Galerija</a></li>
        <li><a href="{$putanja}/forms/popisZbornika.php">Zbornici</a></li>
        <li><a href="{$putanja}/autor.html">O autoru</a></li>
        <li><a href="{$putanja}/forms/logout.php">Odjava</a></li>
        <li><a href="javascript:helper()">Pomoć</a></li>
        <li><a href="{$putanja}/dokumentacija.html">Dokumentacija</a></li>
        {/if}
        {if isset($smarty.session.uloga) && $smarty.session.uloga == 1}
        <li><a href="{$putanja}/index.php">Home</a></li>
        <li><a href="{$putanja}/forms/novaBiografija.php">Kreiraj biografiju</a></li>
        <li><a href="{$putanja}/forms/azurirajBiografiju.php">Ažuriraj biografiju</a></li>
        <li><a href="{$putanja}/galerija.php">Galerija</a></li>
        <li><a href="{$putanja}/forms/popisZbornika.php">Zbornici</a></li>
        <li><a href="{$putanja}/forms/racuni.php">Korisnički računi</a></li>
        <li><a href="{$putanja}/forms/moderatori.php">Moderatori</a></li>
        <li><a href='{$putanja}/forms/kategorije.php'>Kategorije</a></li>
        <li><a href="{$putanja}/autor.html">O autoru</a></li>
        <li><a href="{$putanja}/forms/logout.php">Odjava</a></li>
        <li><a href="javascript:helper()">Pomoć</a></li>
        <li><a href="{$putanja}/dokumentacija.html">Dokumentacija</a></li>
        {/if}
        </ul>
        <a href='javascript:pristupacnost()'><img src="{$putanja}/media/accessibility_icon.png" width="45" height="45" alt="accessibility"/></a>
        <a href="{$putanja}/rss.php"><img src="{$putanja}/media/rss.jpg" width="35" height="35" alt="RSS" style="margin-left:20px; margin-right: 20px; "/></a>
        </header>
        <section id='sadrzaj'>