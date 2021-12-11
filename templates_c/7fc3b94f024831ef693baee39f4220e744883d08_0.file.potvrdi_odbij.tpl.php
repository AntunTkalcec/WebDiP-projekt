<?php
/* Smarty version 3.1.39, created on 2021-06-03 17:18:43
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\potvrdi_odbij.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b8f2d3475885_81163791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fc3b94f024831ef693baee39f4220e744883d08' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\potvrdi_odbij.tpl',
      1 => 1622733241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b8f2d3475885_81163791 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
<?php if (!empty($_smarty_tpl->tpl_vars['greska']->value)) {?>
    <p style="color: red; margin-left: auto; margin-right: auto;"><?php echo $_smarty_tpl->tpl_vars['greska']->value;?>
</p>
    
    <form name="odbij" id="odbij" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
    <div class="obrazac">
        <p class="info">Prihvatite ili odbijte biografiju!</p>
        <hr>
        <label for="identifikator"><b>Identifikator</b></label>
        <input type="text" name="identifikator" id="identifikator" required readonly value="<?php echo $_smarty_tpl->tpl_vars['idBiografije']->value;?>
">
        <label for='naziv'><b>Naziv</b></label>
        <input type='text' name="naziv" id="naziv" required value="<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
" readonly>
        <hr>
        <button type="submit" name="odbij" class="registriraj" value="qwe" id="odbij">Odbij biografiju</button>
</div>
</form>
    </div>
    <?php }
if (empty($_smarty_tpl->tpl_vars['greska']->value)) {?>
<form name="potvrdi/odbij" id="potvrdi/odbij" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
<div class="obrazac">
    <p class="info">Prihvatite ili odbijte biografiju!</p>
    <hr>
    <label for="identifikator"><b>Identifikator</b></label>
    <input type="text" name="identifikator" id="identifikator" required readonly value="<?php echo $_smarty_tpl->tpl_vars['idBiografije']->value;?>
">
    <label for='naziv'><b>Naziv</b></label>
    <input type='text' name="naziv" id="naziv" required value="<?php echo $_smarty_tpl->tpl_vars['naziv']->value;?>
" readonly>
    <hr>
    <button type="submit" name="potvrdi" class="registriraj" value="qwe" id="potvrdi">Prihvati biografiju</button>
    <button type="submit" name="odbij" class="registriraj" value="qwe" id="odbij">Odbij biografiju</button>
</div>
</form>
    </div>
    <?php }
}
}
