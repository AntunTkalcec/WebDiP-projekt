<?php
/* Smarty version 3.1.39, created on 2021-06-03 17:30:46
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b8f5a60f2a56_93658856',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd72f19da4b7b9d18bcfc8684ef6729e931fb57c3' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\index.tpl',
      1 => 1622734239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b8f5a60f2a56_93658856 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</h1>
<div class="cookie-banner" style="display:none">
    <p>Korištenjem ove stranice, prihvaćate korištenje kolačića.</p>
    <button class="close-cookie-banner">OK</button>
    <?php if ((isset($_smarty_tpl->tpl_vars['uvjeti']->value))) {?>
        <?php echo $_smarty_tpl->tpl_vars['uvjeti']->value;?>

        <?php }?>
        </div>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 3) {?>
            <div class='table-wrapper'>
        <table class="tablica" id='tablica5'>
            <caption style='font-size: 24px;'>Popis zahtjeva za objavu biografije</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv biografije</th>
                    <th>Zahtjev objave</th>
                    <th>Razlog dorade</th>
                    <th>Provjera materijala</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($_prefixVariable1 = mysqli_fetch_assoc($_smarty_tpl->tpl_vars['rezultat5']->value)) {
$_smarty_tpl->_assignInScope('red', $_prefixVariable1);?>
                    <?php if (!empty($_smarty_tpl->tpl_vars['red']->value['razlog_dorade']) && $_smarty_tpl->tpl_vars['red']->value['provjera_materijala'] === 1) {?>
                    <tr style="font-weight: bold; color: red;">
                        <td><a style="font-weight: bold;" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/potvrdi_odbij.php?id=<?php echo $_smarty_tpl->tpl_vars['red']->value['biografija_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['red']->value['biografija_id'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['zahtjev_objave'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['razlog_dorade'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['provjera_materijala'];?>
</td>
                    </tr>
                    <?php } else { ?>
                        <tr>
                        <td><a style="font-weight: bold;" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/potvrdi_odbij.php?id=<?php echo $_smarty_tpl->tpl_vars['red']->value['biografija_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['red']->value['biografija_id'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['zahtjev_objave'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['razlog_dorade'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['provjera_materijala'];?>
</td>
                    </tr>
                    <?php }?>
                    <?php }?>

            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            
            <div class='table-wrapper'>
        <table class="tablica" id='tablica4'>
            <caption style='font-size: 24px;'>Sve biografije</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv biografije</th>
                    <th>Datum kreiranja</th>
                    <th>Sadržaj</th>
                    <th>Status</th>
                    <th>Zahtjev objave</th>
                    <th>Razlog dorade</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($_prefixVariable2 = mysqli_fetch_assoc($_smarty_tpl->tpl_vars['rezultat4']->value)) {
$_smarty_tpl->_assignInScope('red', $_prefixVariable2);?>
                    <tr>
                        <td><a style="font-weight: bold;" id="dorada" href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/dorada.php?id=<?php echo $_smarty_tpl->tpl_vars['red']->value['biografija_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['red']->value['biografija_id'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['datum_upisa'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['tekst_biografije'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['status'];?>
</td>
                        <?php if (empty($_smarty_tpl->tpl_vars['red']->value['zahtjev_objave'])) {?>
                            <td>-</td>
                            <?php } else { ?>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['zahtjev_objave'];?>
</td>
                        <?php }?>
                        <?php if (empty($_smarty_tpl->tpl_vars['red']->value['razlog_dorade'])) {?>
                            <td>-</td>
                            <?php } else { ?>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['razlog_dorade'];?>
</td>
                        <?php }?>
                    </tr>
                    <?php }?>

            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            <?php }?>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] !== 4) {?>
            <div class='table-wrapper'>
        <table class="tablica" id='tablica3'>
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
                <?php while ($_prefixVariable3 = mysqli_fetch_assoc($_smarty_tpl->tpl_vars['rezultat3']->value)) {
$_smarty_tpl->_assignInScope('red', $_prefixVariable3);?>
                    <tr>
                        <td><a style="font-weight: bold;" id='zahtjev' href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/posaljiZahtjev.php?id=<?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
"><?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['datum_upisa'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['status'];?>
</td>
                        <?php if (empty($_smarty_tpl->tpl_vars['red']->value['razlog_dorade'])) {?>
                            <td>-</td>
                            <?php } else { ?>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['razlog_dorade'];?>
</td>
                        <?php }?>
                    </tr>
                    <?php }?>

            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            <?php }?>
        <div class='table-wrapper'>
        <table class="tablica" id='tablica1'>
            <caption style='font-size: 18px;'>Statistika broja zbornika po kategoriji biografija</caption>
            <thead>
                <tr>
                    <th>Broj zbornika</th>
                    <th>Kategorija biografije</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($_prefixVariable4 = mysqli_fetch_assoc($_smarty_tpl->tpl_vars['rezultat']->value)) {
$_smarty_tpl->_assignInScope('red', $_prefixVariable4);?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['br'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
</td>
                    </tr>
                    <?php }?>

            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            
            <div class='table-wrapper'>
        <table class="tablica" id='tablica2'>
            <caption style='font-size: 18px;'>Popis zbornika grupiran po kategorijama</caption>
            <thead>
                <tr>
                    <th>Naziv zbornika</th>
                    <th>Godina</th>
                    <th>Predgovor</th>
                    <th>Kategorija</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($_prefixVariable5 = mysqli_fetch_assoc($_smarty_tpl->tpl_vars['rezultat2']->value)) {
$_smarty_tpl->_assignInScope('red2', $_prefixVariable5);?>
                    <tr>
                        <td><a style="font-weight: bold;" id='nazivZbornika' href='<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/popisBiografija.php?id=<?php echo $_smarty_tpl->tpl_vars['red2']->value['naziv'];?>
'><?php echo $_smarty_tpl->tpl_vars['red2']->value['naziv'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red2']->value['godina'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red2']->value['predgovor'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red2']->value['kategorija'];?>
</td>
                    </tr>
                    <?php }?>

            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            <div id="help" class="help1">
            <div class="help1-content">
                <div class="help1-header">
                <span class="help1-close">&times;</span>
                <h2>Home</h2>
            </div>
                <div class="help1-body">
                    <p>Ovo je početna stranica. Možete vidjeti tablice koje prikazuju razne statistike i popise. Ako odaberete jedan od zbornika, 
                        vidjet ćete popis biografija i korisnika u tom zborniku. Ukoliko ste prijavljeni i kreirali ste neku biografiju,
                        možete na nju kliknuti kako bi poslali zahtjev za njenu objavu.</p>
                </div>
                <div class="help1-footer"><p>Pomoć</p></div>
        </div>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['alertKriviZahtjev']->value;
$_prefixVariable6 = ob_get_clean();
if ($_prefixVariable6 == 1) {?>
                    <?php echo '<script'; ?>
>alert("Zahtjev objave za tu biografiju je već poslan u zadnjih godinu dana.");<?php echo '</script'; ?>
>
                    <?php }?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['alertDobarZahtjev']->value;
$_prefixVariable7 = ob_get_clean();
if ($_prefixVariable7 == 1) {?>
                    <?php echo '<script'; ?>
>alert("Zahtjev za objavu vaše biografije je poslan.");<?php echo '</script'; ?>
>
                    <?php }
}
}
