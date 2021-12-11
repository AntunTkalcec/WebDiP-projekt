<?php
/* Smarty version 3.1.39, created on 2021-05-29 18:00:05
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\prijava.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b2650504df12_87428382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '121504b332176a7dc96a5951401b02b0c1bcf1e7' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\prijava.tpl',
      1 => 1622304001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b2650504df12_87428382 (Smarty_Internal_Template $_smarty_tpl) {
?><form name="prijava" id="prijava" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>
"
<div class="obrazac">
    <h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
    <p class="info">Prijava u sustav</p>
    <hr>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaKorime']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaKorime']->value;?>
</p>
        <?php }?>
    <label for="korisnicko_ime"><b>Korisničko ime</b></label>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['cookie_korime']->value;
$_prefixVariable2 = ob_get_clean();
if ((isset($_prefixVariable2))) {?>
        <input type="text" placeholder="Upiši korisničko ime..." name="korisnicko_ime" id="korisnicko_ime" required autofocus value="<?php echo $_smarty_tpl->tpl_vars['cookie_korime']->value;?>
">
    <?php } else { ?>
    <input type="text" placeholder="Upiši korisničko ime..." name="korisnicko_ime" id="korisnicko_ime" required autofocus>
    <?php }?>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaLozinka']->value;
$_prefixVariable3 = ob_get_clean();
if ((isset($_prefixVariable3))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaLozinka']->value;?>
</p>
        <?php }?>
    <label for="lozinka"><b>Lozinka</b></label>
    <input type="password" placeholder="Upiši lozinku..." name="lozinka" id="lozinka" required>
    <label for="zapamtiMe"><b>Zapamti me</b></label>
    <input type="checkbox" name="zapamtiMe" id="zapamtiMe">
    <hr>
    <button type="submit" class="registriraj" name="submit">Prijavi se</button>
</div>
<div style="font-weight:bold; text-align: center; margin-top: 10px;"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/zaboravljenaLozinka.php">Zaboravili ste lozinku?</a></div>
</form>
</div>
            <div id="help" class="help1">
            <div class="help1-content">
                <div class="help1-header">
                <span class="help1-close">&times;</span>
                <h2>Prijava</h2>
            </div>
                <div class="help1-body">
                    <p>Ovo je stranica za prijavu. Možete se prijaviti u svoj prethodno stvoreni i aktivirani račun. Pazite na upis vrijednosti, jer nakon 3 neuspjela pokušaja 
                        prijave vaš račun biva zaključan te ga može otključati samo admin aplikacije! </p>
                </div>
                <div class="help1-footer"><p>Pomoć</p></div>
        </div><?php }
}
