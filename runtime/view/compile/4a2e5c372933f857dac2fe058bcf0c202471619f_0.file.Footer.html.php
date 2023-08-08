<?php
/* Smarty version 3.1.46, created on 2023-08-08 20:50:08
  from '/www/wwwroot/acg-faka/app/View/User/Theme/Cartoon/Common/Footer.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_64d23a009711f1_06106371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a2e5c372933f857dac2fe058bcf0c202471619f' => 
    array (
      0 => '/www/wwwroot/acg-faka/app/View/User/Theme/Cartoon/Common/Footer.html',
      1 => 1691417695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d23a009711f1_06106371 (Smarty_Internal_Template $_smarty_tpl) {
?></div>
<?php echo '<script'; ?>
>
    layui.config({
        version: "<?php echo $_smarty_tpl->tpl_vars['app']->value['version'];?>
"
    });

    layui.define(['layer', 'element'], function (exports) {

        var $ = layui.jquery, element = layui.element;
        //手机设备的简单适配
        var treeMobile = $('.site-tree-mobile')
            , shadeMobile = $('.site-mobile-shade');

        $('.layui-nav-tree a').click(() => {
            $('.net-loading').show();
        });

        treeMobile.on('click', function () {
            $('body').addClass('site-mobile');
        });
        shadeMobile.on('click', function () {
            $('body').removeClass('site-mobile');
        });

        $('.logout').click(function () {
            layer.confirm('您是否要注销登录？', {
                btn: ['确认', '取消'],
                title: "安全注销"
            }, function () {
                window.location.href = "/user/authentication/logout";
            });
        });
    });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/static/jquery.qrcode.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/static/wangEditor.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/static/bootstrap-table/js/bootstrap-table.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/static/bootstrap-table/js/bootstrap-table-zh-CN.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/static/jsoneditor/jsoneditor.min.js"><?php echo '</script'; ?>
>

<!--start::HOOK-->
<?php echo hook(\App\Consts\Hook::USER_VIEW_BODY);?>

<!--end::HOOK-->
</body>
<!--start::HOOK-->
<?php echo hook(\App\Consts\Hook::USER_VIEW_FOOTER);?>

<!--end::HOOK-->
</html><?php }
}
