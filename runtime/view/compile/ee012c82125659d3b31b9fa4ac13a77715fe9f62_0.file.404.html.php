<?php
/* Smarty version 3.1.46, created on 2023-08-07 22:17:10
  from '/www/wwwroot/acg-faka/app/View/404.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.46',
  'unifunc' => 'content_64d0fce600dcf9_10284176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee012c82125659d3b31b9fa4ac13a77715fe9f62' => 
    array (
      0 => '/www/wwwroot/acg-faka/app/View/404.html',
      1 => 1691417695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d0fce600dcf9_10284176 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</title>
  <style>
    body {
      background: url('/assets/admin/images/login/bg.jpg') fixed no-repeat;background-size: cover;
      font-family: 'Montserrat', sans-serif;
    }
    .container {
      position: absolute;
      -webkit-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
    }

    form {
      background: rgba(255, 255, 255, 0.3);
      padding: 3em;
      border-radius: 20px;
      border-left: 1px solid rgba(255, 255, 255, 0.3);
      border-top: 1px solid rgba(255, 255, 255, 0.3);
      -webkit-backdrop-filter: blur(10px);
      backdrop-filter: blur(10px);
      box-shadow: 20px 20px 40px -6px rgba(0, 0, 0, 0.2);
      text-align: center;
      position: relative;
      -webkit-transition: all 0.2s ease-in-out;
      transition: all 0.2s ease-in-out;
    }
    form p {
      font-weight: bolder;
      color: pink;
      font-size: 1.4rem;
      margin-top: 0;
    }

  </style>
</head>
<body>
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<div class="container">
  <form>
    <p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
  </form>
</div>
</body>
</html>
<?php }
}
