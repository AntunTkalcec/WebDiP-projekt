<?php
/* Smarty version 3.1.39, created on 2021-05-30 15:31:35
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\novaBiografija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b393b7bc0588_77890838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b79a701b373f0cb173749cb80eafbd1ff21d2f8f' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\novaBiografija.tpl',
      1 => 1622380945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b393b7bc0588_77890838 (Smarty_Internal_Template $_smarty_tpl) {
?><form name="novaBiografija" id="novaBiografija" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
" enctype="multipart/form-data">
<div class="obrazac">
    <h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
    <p class="info">Kreirajte novu biografiju!</p>
    <hr>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;?>
</p>
        <?php }?>
    <label for="naziv"><b>Naziv</b></label>
    <input type="text" placeholder="Upiši naziv..." name="naziv" id="naziv" required onkeyup="provjeriBiografiju();">
    <span id="nazivStatus" style="font-size: 16px;"></span>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaPodaci']->value;
$_prefixVariable2 = ob_get_clean();
if ((isset($_prefixVariable2))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaPodaci']->value;?>
</p>
        <?php }?>
    <label for="podaci"><b>Osobni podaci</b></label>
    <input type="text" placeholder="Upiši osobne podatke..." name="podaci" id="podaci" required>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaObrazovanje']->value;
$_prefixVariable3 = ob_get_clean();
if ((isset($_prefixVariable3))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaObrazovanje']->value;?>
</p>
        <?php }?>
    <label for="obrazovanje"><b>Obrazovanje</b></label>
    <input type="text" placeholder="Upiši obrazovanje..." name="obrazovanje" id="obrazovanje">
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaVjestine']->value;
$_prefixVariable4 = ob_get_clean();
if ((isset($_prefixVariable4))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaVjestine']->value;?>
</p>
        <?php }?>
    <label for="vjestine"><b>Vještine</b></label>
    <input type="text" placeholder="Upiši vještine..." name="vjestine" id="vjestine">
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaIskustvo']->value;
$_prefixVariable5 = ob_get_clean();
if ((isset($_prefixVariable5))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaIskustvo']->value;?>
</p>
        <?php }?>
    <label for="iskustvo"><b>Radno iskustvo</b></label>
    <input type="text" placeholder="Upiši radno iskustvo..." name="iskustvo" id="iskustvo">
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaInteresi']->value;
$_prefixVariable6 = ob_get_clean();
if ((isset($_prefixVariable6))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaInteresi']->value;?>
</p>
        <?php }?>
    <label for="interesi"><b>Interesi</b></label>
    <input type="text" placeholder="Upiši interese..." name="interesi" id="interesi">
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaTekst']->value;
$_prefixVariable7 = ob_get_clean();
if ((isset($_prefixVariable7))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaTekst']->value;?>
</p>
        <?php }?>
    <label for="tekst"><b>Tekst biografije</b></label>
    <textarea id="tekst" name="tekst" placeholder="Upiši tekst biografije..." style="height: 250px;"></textarea>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaKategorija']->value;
$_prefixVariable8 = ob_get_clean();
if ((isset($_prefixVariable8))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaKategorija']->value;?>
</p>
        <?php }?>
    <label for="kategorija"><b>Kategorija</b></label>
    <select name="kategorija" id="kategorija" class="select">
        <option value="Znanstvenici">Znanstvenici</option>
        <option value="Pisci">Pisci</option>
        <option value="Redatelji">Redatelji</option>
        <option value="Glumci">Glumci</option>
        <option value="Političari">Političari</option>
        <option value="Ostale ličnosti">Ostale ličnosti</option>
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
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitBio">Kreiraj biografiju</button>
</div>
</form>
    </div>
            <div id="help" class="help1">
            <div class="help1-content">
                <div class="help1-header">
                <span class="help1-close">&times;</span>
                <h2>Nova biografija</h2>
            </div>
                <div class="help1-body">
                    <p>Ovo je stranica za kreiranje nove biografije. Možete kreirati novu biografiju, koju će moderator morati odobriti prije nego je ona vidljiva.</p>
                </div>
                <div class="help1-footer"><p>Pomoć</p></div>
        </div><?php }
}
