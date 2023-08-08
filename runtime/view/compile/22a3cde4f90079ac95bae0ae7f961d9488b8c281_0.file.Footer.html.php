<?php
/* Smarty version 3.1.46, created on 2023-08-07 22:28:49
  from '/www/wwwroot/acg-faka/app/View/User/Theme/Cartoon/Index/Footer.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_64d0ffa18f0c93_73297747',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22a3cde4f90079ac95bae0ae7f961d9488b8c281' => 
    array (
      0 => '/www/wwwroot/acg-faka/app/View/User/Theme/Cartoon/Index/Footer.html',
      1 => 1691417695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d0ffa18f0c93_73297747 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content-icp"><?php echo $_smarty_tpl->tpl_vars['setting']->value['icp'];?>
</div>
<!--start::HOOK-->
<?php echo hook(\App\Consts\Hook::USER_GLOBAL_VIEW_BODY);?>

<?php echo hook(\App\Consts\Hook::USER_VIEW_INDEX_BODY);?>

<!--end::HOOK-->
</body>
<!--start::HOOK-->
<?php echo hook(\App\Consts\Hook::USER_GLOBAL_VIEW_FOOTER);?>

<?php echo hook(\App\Consts\Hook::USER_VIEW_INDEX_FOOTER);?>

<!--end::HOOK-->
</html><?php }
}
