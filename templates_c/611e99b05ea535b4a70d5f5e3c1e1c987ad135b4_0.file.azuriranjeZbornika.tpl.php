<?php
/* Smarty version 3.1.39, created on 2021-06-03 15:49:26
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\azuriranjeZbornika.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b8dde685fc05_20553802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '611e99b05ea535b4a70d5f5e3c1e1c987ad135b4' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\azuriranjeZbornika.tpl',
      1 => 1622728054,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b8dde685fc05_20553802 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
<form name="azuriranjeZbornika" id="azuriranjeZbornika" method="post" action="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/azuriranjeZbornika.php?id=<?php echo $_smarty_tpl->tpl_vars['idZbornika']->value;?>
">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi ažurirali zbornik!</p>
    <hr>
    <label for="predgovor"><b>Predgovor</b></label>
    <input type="text" placeholder="Upiši predgovor..." name="predgovor" id="predgovor" required value='<?php echo $_smarty_tpl->tpl_vars['predgovor']->value;?>
'>
    <label for='kategorija'><b>Kategorija</b></label>
    <input type="text" id="kategorija" name="kategorija" value="<?php echo $_smarty_tpl->tpl_vars['kategorija']->value;?>
">
    <label for="godina"><b>Godina</b></label>
    <input type="text" placeholder="Upiši godinu..." name="godina" id="godina" required value='<?php echo $_smarty_tpl->tpl_vars['godina']->value;?>
'>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaNaziv']->value;?>
</p>
        <?php }?>
    <label for='naziv'><b>Naziv</b></label>
    <input type='text' placeholder="Upiši naziv..." name="naziv" id="naziv" required value="<?php echo $_smarty_tpl->tpl_vars['stariNaziv']->value;?>
">
    <label for="biografije"><b>Biografije</b></label>
    <select multiple name="biografije[]" id="biografije" class="select" required>
        <?php while ($_prefixVariable2 = mysqli_fetch_array($_smarty_tpl->tpl_vars['rezultatBiografije']->value)) {
$_smarty_tpl->_assignInScope('redBiografije', $_prefixVariable2);?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['redBiografije']->value['naziv'];?>
"><?php echo $_smarty_tpl->tpl_vars['redBiografije']->value['naziv'];?>
</option>
            <?php }?>

    </select>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitZbornik">Ažuriraj zbornik</button>
</div>
</form>
    </div>
<?php }
}
