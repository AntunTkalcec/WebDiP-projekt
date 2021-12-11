<?php
/* Smarty version 3.1.39, created on 2021-06-03 16:40:57
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\dorada.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b8e9f972db59_33337222',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd7ac0526d52edd12ff646fdd5b555a73feb70b0' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\dorada.tpl',
      1 => 1622731239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b8e9f972db59_33337222 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
<?php if (!empty($_smarty_tpl->tpl_vars['greska']->value)) {?>
    <p style="color: red; font-weight: bold; margin-left: auto; margin-right: auto;"><?php echo $_smarty_tpl->tpl_vars['greska']->value;?>
</p>
    <?php }
if (empty($_smarty_tpl->tpl_vars['greska']->value)) {?>
<form name="dorada" id="dorada" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
<div class="obrazac">
    <p class="info">Popunite sve dijelove obrasca kako bi poslali biografiju na doradu!</p>
    <hr>
    <label for="identifikator"><b>Identifikator</b></label>
    <input type="text" name="identifikator" id="identifikator" required readonly value="<?php echo $_smarty_tpl->tpl_vars['idBiografije']->value;?>
">
    <label for='razlogDorade'><b>Razlog dorade</b></label>
    <input type='text' placeholder="Upiši razlog dorade..." name="razlogDorade" id="razlogDorade" required>
    <hr>
    <button type="submit" name="submit" class="registriraj" value="qwe" id="submitDoradu">Pošalji zahtjev za doradu</button>
</div>
</form>
    </div>
    <?php }
}
}
