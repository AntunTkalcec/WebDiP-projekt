<?php
/* Smarty version 3.1.39, created on 2021-05-29 17:58:48
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\registracija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b264b8c23527_37781888',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3cc827797f16e4bbd9d778606100e5a6dca164e' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\registracija.tpl',
      1 => 1622303927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b264b8c23527_37781888 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['potvrdenMail']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
    <?php echo $_smarty_tpl->tpl_vars['potvrdenMail']->value;?>

    <?php }?>
<form name="registracija" id="registracija" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
<div class="obrazac">
    <h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
    <p class="info">Popunite sve dijelove obrasca kako bi se registrirali!</p>
    <hr>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaEmail']->value;
$_prefixVariable2 = ob_get_clean();
if ((isset($_prefixVariable2))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaEmail']->value;?>
</p>
        <?php }?>
    <label for="email"><b>E-mail</b></label>
    <input type="text" placeholder="Upiši email..." name="email" id="email" required>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaIme']->value;
$_prefixVariable3 = ob_get_clean();
if ((isset($_prefixVariable3))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaIme']->value;?>
</p>
        <?php }?>
    <label for="ime"><b>Ime</b></label>
    <input type="text" placeholder="Upiši ime..." name="ime" id="ime" required>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaPrezime']->value;
$_prefixVariable4 = ob_get_clean();
if ((isset($_prefixVariable4))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaPrezime']->value;?>
</p>
        <?php }?>
    <label for="prezime"><b>Prezime</b></label>
    <input type="text" placeholder="Upiši prezime..." name="prezime" id="prezime">
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaKorime']->value;
$_prefixVariable5 = ob_get_clean();
if ((isset($_prefixVariable5))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaKorime']->value;?>
</p>
        <?php }?>
    <label for="korisnicko_ime"><b>Korisničko ime</b></label>
    <input type="text" placeholder="Upiši korisničko ime..." name="korisnicko_ime" id="korisnicko_ime" required onkeyup="provjeri();">
    <span id="korimeStatus"></span>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaLozinka2']->value;
$_prefixVariable6 = ob_get_clean();
if ((isset($_prefixVariable6))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaLozinka2']->value;?>
</p>
        <?php }?>
    <label for="lozinka"><b>Lozinka</b></label>
    <input type="password" placeholder="Upiši lozinku..." name="lozinka" id="lozinka" required>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaLozinka']->value;
$_prefixVariable7 = ob_get_clean();
if ((isset($_prefixVariable7))) {?>
        <p style="color: red; font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['greskaLozinka']->value;?>
</p>
        <?php }?>
    <label for="lozinka_potvrda"><b>Potvrdi lozinku</b></label>
    <input type="password" placeholder="Ponovi lozinku..." name="lozinka_potvrda" id="lozinka_potvrda" required>
    <hr>
    <div class="g-recaptcha" data-sitekey="6LfBk_EaAAAAACNmV5sUN1QsskYIXwPWl5wjZt7i"></div>
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['greskaCaptcha']->value;
$_prefixVariable8 = ob_get_clean();
if ((isset($_prefixVariable8))) {?>
        <h2><?php echo $_smarty_tpl->tpl_vars['greskaCaptcha']->value;?>
</h2>
        <?php }?>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitReg">Registriraj se</button>
</div>
</form>
    </div>
            <div id="help" class="help1">
            <div class="help1-content">
                <div class="help1-header">
                <span class="help1-close">&times;</span>
                <h2>Registracija</h2>
            </div>
                <div class="help1-body">
                    <p>Ovo je stranica za registraciju. Možete se registrirati, te tako doći do svih ostalih funkcionalnosti aplikacije. 
                        Pazite na točnost upisanih vrijednosti, ukoliko ne poštujete sva pravila, ne možete se registrirati!
                        Nakon registracije ćete morati potvrditi svoj račun klikom na link u mailu.</p>
                </div>
                <div class="help1-footer"><p>Pomoć</p></div>
        </div><?php }
}
