<?php
/* Smarty version 3.1.39, created on 2021-05-30 14:20:45
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\azurirajBiografiju.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b3831daece86_59257285',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96f9c5305254b29f4d61f21b55a27aa4de37d561' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\azurirajBiografiju.tpl',
      1 => 1622377236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b3831daece86_59257285 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</h1>
<div class='table-wrapper'>
        <div class='table-wrapper'>
        <table class="tablica" id='tablica4'>
            <caption style='font-size: 24px;'>Moje biografije</caption>
            <thead>
                <tr>
                    <th>Naziv biografije</th>
                    <th>Datum kreiranja</th>
                    <th>Status</th>
                    <th>Razlog dorade</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($_prefixVariable1 = mysqli_fetch_assoc($_smarty_tpl->tpl_vars['rezultat3']->value)) {
$_smarty_tpl->_assignInScope('red', $_prefixVariable1);?>
                    <tr>
                        <td><a id='nazivBiografije' href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/azuriranjeBiografije.php?id=<?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
"><?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['datum_upisa'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['status'];?>
</td>
                        <?php if (empty($_smarty_tpl->tpl_vars['red']->value['razlog_dorade'])) {?>
                            <td>-</td>
                            <?php } else { ?>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['razlog_dorade'];?>
</td>
                        <?php }?>
                    </tr>
                    <?php }?>

            </tbody>
            <tfoot></tfoot>
        </table>
        </div><?php }
}
