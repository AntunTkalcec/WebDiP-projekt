<?php
/* Smarty version 3.1.39, created on 2021-10-22 20:41:08
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_617305c4cd5967_35179736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26cf8d079c370e849bcc5348cb8ce9c30c51d58a' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\header.tpl',
      1 => 1623089828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_617305c4cd5967_35179736 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Biografije"/>
        <meta name="naslov" content="Biografije">
        <meta name="autor" content="Antun Tkalčec">
        <meta name="opis" content ="Datum kreiranja: 25.05.2021.">
        <meta name="kljucne_rijeci" content="biografija, podaci, znanje">
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/css/atkalcec.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js" async defer><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/javascript/atkalcec_jquery.js"><?php echo '</script'; ?>
>
    </head>
    <body>
        <header>
            <ul class="nav">
        <?php if (!(isset($_SESSION['uloga']))) {?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Home</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/login.php">Prijava</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/registracija.php">Registracija</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/autor.html">O autoru</a></li>
            <li><a href="javascript:helper()">Pomoć</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/dokumentacija.html">Dokumentacija</a></li>
        <?php }?>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] == 3) {?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Home</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/novaBiografija.php">Kreiraj biografiju</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/azurirajBiografiju.php">Ažuriraj biografiju</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/galerija.php">Galerija</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/autor.html">O autoru</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/logout.php">Odjava</a></li>
        <li><a href="javascript:helper()">Pomoć</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/dokumentacija.html">Dokumentacija</a></li>
        <?php }?>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] == 2) {?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Home</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/novaBiografija.php">Kreiraj biografiju</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/azurirajBiografiju.php">Ažuriraj biografiju</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/galerija.php">Galerija</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/popisZbornika.php">Zbornici</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/autor.html">O autoru</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/logout.php">Odjava</a></li>
        <li><a href="javascript:helper()">Pomoć</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/dokumentacija.html">Dokumentacija</a></li>
        <?php }?>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] == 1) {?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Home</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/novaBiografija.php">Kreiraj biografiju</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/azurirajBiografiju.php">Ažuriraj biografiju</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/galerija.php">Galerija</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/popisZbornika.php">Zbornici</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/racuni.php">Korisnički računi</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/moderatori.php">Moderatori</a></li>
        <li><a href='<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/kategorije.php'>Kategorije</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/autor.html">O autoru</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/logout.php">Odjava</a></li>
        <li><a href="javascript:helper()">Pomoć</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/dokumentacija.html">Dokumentacija</a></li>
        <?php }?>
        </ul>
        <a href='javascript:pristupacnost()'><img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/media/accessibility_icon.png" width="45" height="45" alt="accessibility"/></a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/rss.php"><img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/media/rss.jpg" width="35" height="35" alt="RSS" style="margin-left:20px; margin-right: 20px; "/></a>
        </header>
        <section id='sadrzaj'><?php }
}
