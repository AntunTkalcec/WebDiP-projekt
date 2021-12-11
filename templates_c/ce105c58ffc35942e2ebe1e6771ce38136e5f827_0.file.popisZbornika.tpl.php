<?php
/* Smarty version 3.1.39, created on 2021-06-02 16:49:00
  from 'F:\Xampp\htdocs\atkalcec\Projekt\templates\popisZbornika.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b79a5cd73944_66121863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce105c58ffc35942e2ebe1e6771ce38136e5f827' => 
    array (
      0 => 'F:\\Xampp\\htdocs\\atkalcec\\Projekt\\templates\\popisZbornika.tpl',
      1 => 1622645339,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b79a5cd73944_66121863 (Smarty_Internal_Template $_smarty_tpl) {
?><h1><?php echo $_smarty_tpl->tpl_vars['h1']->value;?>
</h1>
<div class='table-wrapper'>
        <table class="tablica" id='tablicaZbornici'>
            <caption style='font-size: 18px;'>Popis zbornika</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naziv</th>
                    <th>Godina</th>
                    <th>Predgovor</th>
                    <th>Kategorija</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($_prefixVariable1 = mysqli_fetch_assoc($_smarty_tpl->tpl_vars['rezultat']->value)) {
$_smarty_tpl->_assignInScope('red', $_prefixVariable1);?>
                    <tr>
                        <td><a href='<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/azuriranjeZbornika.php?id=<?php echo $_smarty_tpl->tpl_vars['red']->value['zbornik_id'];?>
'><?php echo $_smarty_tpl->tpl_vars['red']->value['zbornik_id'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['Naziv zbornika'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['godina'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['predgovor'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['red']->value['naziv'];?>
</td>
                    </tr>
                    <?php }?>

            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
            <hr>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/forms/kreiranjeZbornika.php"><button type="button" name="button" class="registriraj" value="qwe" id="buttonZbornik">Kreiraj zbornik</button></a><?php }
}
