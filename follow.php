<?php
define("ACC",true);
require("./include/init.php");
$info = new UserModel();
$user   = $_SESSION['user'];
$author = isset($_POST['author'])?$_POST['author']:'';

//判断是否此用户关注过此作者
if($info->isfollow($user,$author)){
	echo "true";
}else{
	echo "false";
}






