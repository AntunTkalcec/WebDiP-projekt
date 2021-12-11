<?php
/* Smarty version 3.1.39, created on 2021-05-31 21:05:05
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\azuriranjeBiografije.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b533617a45d6_27353236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '547168f358a5a1f916df1863689e7dd891fe4fe6' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\azuriranjeBiografije.tpl',
      1 => 1622487903,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b533617a45d6_27353236 (Smarty_Internal_Template $_smarty_tpl) {
?><form name="novaBiografija" id="novaBiografija" method="post" action="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/azuriranjeBiografije.php?id=<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
" enctype="multipart/form-data">
<div class="obrazac">
    <h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
    <p class="info">Ažuriranje biografije: "<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
"</p>
    <p>Pazite na materijale! Ako ostavite prazno, biografija će biti ažurirana bez prethodno postavljenog materijala.</p>
    <hr>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;?>
</p>
        <?php }?>
    <label for="naziv"><b>Naziv</b></label>
    <input type="text" placeholder="Upiši naziv..." name="naziv" id="naziv" required onkeyup="provjeriBiografiju();" value='<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
'>
    <span id="nazivStatus" style="font-size: 16px;"></span>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaPodaci']->value;
$_prefixVariable2 = ob_get_clean();
if ((isset($_prefixVariable2))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaPodaci']->value;?>
</p>
        <?php }?>
    <label for="podaci"><b>Osobni podaci</b></label>
    <input type="text" placeholder="Upiši osobne podatke..." name="podaci" id="podaci" required value='<?php echo $_smarty_tpl->tpl_vars['podaci']->value;?>
'>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaObrazovanje']->value;
$_prefixVariable3 = ob_get_clean();
if ((isset($_prefixVariable3))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaObrazovanje']->value;?>
</p>
        <?php }?>
    <label for="obrazovanje"><b>Obrazovanje</b></label>
    <input type="text" placeholder="Upiši obrazovanje..." name="obrazovanje" id="obrazovanje" value='<?php echo $_smarty_tpl->tpl_vars['obrazovanje']->value;?>
'>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaVjestine']->value;
$_prefixVariable4 = ob_get_clean();
if ((isset($_prefixVariable4))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaVjestine']->value;?>
</p>
        <?php }?>
    <label for="vjestine"><b>Vještine</b></label>
    <input type="text" placeholder="Upiši vještine..." name="vjestine" id="vjestine" value='<?php echo $_smarty_tpl->tpl_vars['vjestine']->value;?>
'>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaIskustvo']->value;
$_prefixVariable5 = ob_get_clean();
if ((isset($_prefixVariable5))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaIskustvo']->value;?>
</p>
        <?php }?>
    <label for="iskustvo"><b>Radno iskustvo</b></label>
    <input type="text" placeholder="Upiši radno iskustvo..." name="iskustvo" id="iskustvo" value='<?php echo $_smarty_tpl->tpl_vars['iskustvo']->value;?>
'>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaInteresi']->value;
$_prefixVariable6 = ob_get_clean();
if ((isset($_prefixVariable6))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaInteresi']->value;?>
</p>
        <?php }?>
    <label for="interesi"><b>Interesi</b></label>
    <input type="text" placeholder="Upiši interese..." name="interesi" id="interesi" value='<?php echo $_smarty_tpl->tpl_vars['interesi']->value;?>
'>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaTekst']->value;
$_prefixVariable7 = ob_get_clean();
if ((isset($_prefixVariable7))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaTekst']->value;?>
</p>
        <?php }?>
    <label for="tekst"><b>Tekst biografije</b></label>
    <textarea id="tekst" name="tekst" placeholder="Upiši tekst biografije..." style="height: 250px;"><?php echo $_smarty_tpl->tpl_vars['tekst']->value;?>
</textarea>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaKategorija']->value;
$_prefixVariable8 = ob_get_clean();
if ((isset($_prefixVariable8))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaKategorija']->value;?>
</p>
        <?php }?>
    <label for="kategorija"><b>Kategorija</b></label>
    <select name="kategorija" id="kategorija" class="select">
        <?php if ($_smarty_tpl->tpl_vars['kategorija']->value == 1) {?>
            <option value='Znanstvenici' selected>Znanstvenici</option>
            <option value="Pisci">Pisci</option>
            <option value="Redatelji">Redatelji</option>
            <option value="Glumci">Glumci</option>
            <option value="Političari">Političari</option>
            <option value="Ostale ličnosti">Ostale ličnosti</option>
            <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['kategorija']->value == 2) {?>
            <option value='Znanstvenici'>Znanstvenici</option>
            <option value="Pisci" selected>Pisci</option>
            <option value="Redatelji">Redatelji</option>
            <option value="Glumci">Glumci</option>
            <option value="Političari">Političari</option>
            <option value="Ostale ličnosti">Ostale ličnosti</option>
            <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['kategorija']->value == 3) {?>
            <option value='Znanstvenici'>Znanstvenici</option>
            <option value="Pisci">Pisci</option>
            <option value="Redatelji" selected>Redatelji</option>
            <option value="Glumci">Glumci</option>
            <option value="Političari">Političari</option>
            <option value="Ostale ličnosti">Ostale ličnosti</option>
            <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['kategorija']->value == 4) {?>
            <option value='Znanstvenici'>Znanstvenici</option>
            <option value="Pisci">Pisci</option>
            <option value="Redatelji">Redatelji</option>
            <option value="Glumci" selected>Glumci</option>
            <option value="Političari">Političari</option>
            <option value="Ostale ličnosti">Ostale ličnosti</option>
            <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['kategorija']->value == 5) {?>
            <option value='Znanstvenici'>Znanstvenici</option>
            <option value="Pisci">Pisci</option>
            <option value="Redatelji">Redatelji</option>
            <option value="Glumci">Glumci</option>
            <option value="Političari" selected>Političari</option>
            <option value="Ostale ličnosti">Ostale ličnosti</option>
            <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['kategorija']->value == 6) {?>
            <option value='Znanstvenici'>Znanstvenici</option>
            <option value="Pisci">Pisci</option>
            <option value="Redatelji">Redatelji</option>
            <option value="Glumci">Glumci</option>
            <option value="Političari">Političari</option>
            <option value="Ostale ličnosti" selected>Ostale ličnosti</option>
            <?php }?>
    </select>
    <label for="materijal"><b>Materijal</b></label>
    <select name="materijalSelect" id="materijalSelect" class="select">
        <option value="slika">Slika</option>
        <option value="video">Video</option>
        <option value="audio">Audio</option>
        <option vlaue="gif">GIF</option>
    </select>
    <br>
    <input name="materijal" type="file" id="materijal"/>
    <br>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaRazlog']->value;
$_prefixVariable9 = ob_get_clean();
if ((isset($_prefixVariable9))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaRazlog']->value;?>
</p>
        <?php }?>
    <label for="razlogDorade"><b>Razlog dorade</b></label>
    <input type="text" name="razlogDorade" id="razlogDorade" placeholder="Upiši razlog dorade...">
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitBio">Ažuriraj biografiju</button>
</div>
</form>
    <?php if ($_smarty_tpl->tpl_vars['vecJeUZborniku']->value === 1) {?>
        <?php echo '<script'; ?>
>let warning = confirm("Ne možete ažurirati biografiju koja je već u zborniku.")<?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>window.location.href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php"<?php echo '</script'; ?>
>
        <?php }?>
    </div>
            <div id="help" class="help1">
            <div class="help1-content">
                <div class="help1-header">
                <span class="help1-close">&times;</span>
                <h2>Ažuriranje biografije</h2>
            </div>
                <div class="help1-body">
                    <p>Ovo je stranica za ažuriranje nove biografije. Možete ažurirati svoju biografiju, ukoliko ona nije već dio zbornika, koju će moderator morati odobriti prije nego je ona vidljiva.</p>
                </div>
                <div class="help1-footer"><p>Pomoć</p></div>
        </div><?php }
}
