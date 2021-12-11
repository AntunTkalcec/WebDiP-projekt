<?php
/* Smarty version 3.1.39, created on 2021-05-27 15:57:12
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\zaboravljenaLozinka.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60afa538e013f6_32906573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a684fcab3aa0fedf1fc0fd4870b9a1051262507' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\zaboravljenaLozinka.tpl',
      1 => 1622123809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60afa538e013f6_32906573 (Smarty_Internal_Template $_smarty_tpl) {
?><form name="prijava" id="prijava" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>
"
<div class="obrazac">
    <h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
    <p class="info">Zaboravljena lozinka</p>
    <hr>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaKorime']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaKorime']->value;?>
</p>
        <?php }?>
    <label for="korisnicko_ime"><b>Korisničko ime</b></label>
    <input type="text" placeholder="Upiši korisničko ime..." name="korisnicko_ime" id="korisnicko_ime" required autofocus>
    <hr>
    <button type="submit" class="registriraj" name="submit">Pošalji mail</button>
</div>
</form><?php }
}
