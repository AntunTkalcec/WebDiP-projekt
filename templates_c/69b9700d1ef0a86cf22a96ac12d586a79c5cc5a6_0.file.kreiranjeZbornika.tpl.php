<?php
/* Smarty version 3.1.39, created on 2021-06-02 18:28:13
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\kreiranjeZbornika.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b7b19da7b9b4_51966622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69b9700d1ef0a86cf22a96ac12d586a79c5cc5a6' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\kreiranjeZbornika.tpl',
      1 => 1622651286,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b7b19da7b9b4_51966622 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
<?php if ($_smarty_tpl->tpl_vars['biranjeGodine']->value == 1) {?>
<form name="kreiranjeZbornika" id="kreiranjeZbornika" method="post" action="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/kreiranjeZbornika.php?id=2">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi kreirali zbornik!</p>
    <hr>
    <label for="predgovor"><b>Predgovor</b></label>
    <input type="text" placeholder="Upiši predgovor..." name="predgovor" id="predgovor" required>
    <label for='kategorija'><b>Kategorija</b></label>
    <select name="kategorija" id="kategorija" class="select">
        <?php while ($_prefixVariable1 = mysqli_fetch_array($_smarty_tpl->tpl_vars['rezultatKategorije']->value)) {
$_smarty_tpl->_assignInScope('redKategorije', $_prefixVariable1);?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['redKategorije']->value['naziv'];?>
"><?php echo $_smarty_tpl->tpl_vars['redKategorije']->value['naziv'];?>
</option>
            <?php }?>

    </select>
    <label for="godina"><b>Godina</b></label>
    <input type="text" placeholder="Upiši godinu..." name="godina" id="godina" required>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;
$_prefixVariable2 = ob_get_clean();
if ((isset($_prefixVariable2))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;?>
</p>
        <?php }?>
    <label for='naziv'><b>Naziv</b></label>
    <input type='text' placeholder="Upiši naziv..." name="naziv" id="naziv" required>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitZbornik">Dohvati popis biografija</button>
</div>
</form>
    </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['biranjeGodine']->value == 0 && $_smarty_tpl->tpl_vars['biranjeBiografija']->value == 1) {?>
        <form name="kreiranjeZbornika" id="kreiranjeZbornika" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi kreirali zbornik!</p>
    <hr>
    <label for="predgovor"><b>Predgovor</b></label>
    <input type="text" placeholder="Upiši predgovor..." name="predgovor" id="predgovor" required value='<?php echo $_smarty_tpl->tpl_vars['predgovor']->value;?>
'>
    <label for='kategorija'><b>Kategorija</b></label>
    <select name="kategorija" id="kategorija" class="select">
        <option value='<?php echo $_smarty_tpl->tpl_vars['kategorija']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['kategorija']->value;?>
</option>
    </select>
    <label for="godina"><b>Godina</b></label>
    <input type="text" placeholder="Upiši godinu..." name="godina" id="godina" required value='<?php echo $_smarty_tpl->tpl_vars['odabranaGodina']->value;?>
'>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;
$_prefixVariable3 = ob_get_clean();
if ((isset($_prefixVariable3))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;?>
</p>
        <?php }?>
    <label for='naziv'><b>Naziv</b></label>
    <input type='text' placeholder="Upiši naziv..." name="naziv" id="naziv" required value="<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
">
    <label for="biografije"><b>Biografije</b></label>
    <select multiple name="biografije[]" id="biografije" class="select" required>
        <?php while ($_prefixVariable4 = mysqli_fetch_array($_smarty_tpl->tpl_vars['rezultatBiografije']->value)) {
$_smarty_tpl->_assignInScope('redBiografije', $_prefixVariable4);?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['redBiografije']->value['naziv'];?>
"><?php echo $_smarty_tpl->tpl_vars['redBiografije']->value['naziv'];?>
</option>
            <?php }?>

    </select>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitZbornik">Kreiraj zbornik</button>
</div>
</form>
    </div>
        <?php }
}
}
