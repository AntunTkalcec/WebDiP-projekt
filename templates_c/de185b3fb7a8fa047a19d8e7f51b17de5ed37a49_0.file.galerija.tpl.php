<?php
/* Smarty version 3.1.39, created on 2021-05-31 22:43:12
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\galerija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b54a602703f0_33277928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de185b3fb7a8fa047a19d8e7f51b17de5ed37a49' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\galerija.tpl',
      1 => 1622493791,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b54a602703f0_33277928 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</h1>
<?php while ($_prefixVariable1 = mysqli_fetch_array($_smarty_tpl->tpl_vars['rezultat']->value)) {
$_smarty_tpl->_assignInScope('red', $_prefixVariable1);?>
    <figure class="galerija">
        <img style="width:100%;" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/media/<?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
" alt='slika' title='<?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
'/>
    </figure>
    <hr>
    <?php }
}
}
