<?php
define("ACC",true);
require("./include/init.php");
$info = new UserModel();
//接受验证码
$code = @$_GET['code'];
$user = @$G_GET['user'];

$info->verifyCode($code,$user);

