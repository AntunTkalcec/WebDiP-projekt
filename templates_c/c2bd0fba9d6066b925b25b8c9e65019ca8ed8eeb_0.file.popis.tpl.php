<?php
/* Smarty version 3.1.39, created on 2021-06-03 16:42:00
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\popis.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b8ea3804c298_17812243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2bd0fba9d6066b925b25b8c9e65019ca8ed8eeb' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\popis.tpl',
      1 => 1622731317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b8ea3804c298_17812243 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
<div class='table-wrapper'>
        <table class="tablica" id='tablica2'>
            <caption style='font-size: 18px;'>Popis zbornika grupiran po kategorijama</caption>
            <thead>
                <tr>
                    <th>Naziv biografije</th>
                    <th>Autor biografije</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($_prefixVariable1 = mysqli_fetch_assoc($_smarty_tpl->tpl_vars['rezultat']->value)) {
$_smarty_tpl->_assignInScope('red', $_prefixVariable1);?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['Naziv biografije'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['Autor biografije'];?>
</td>
                    </tr>
                    <?php }?>

            </tbody>
            <tfoot></tfoot>
        </table>
        </div><?php }
}
