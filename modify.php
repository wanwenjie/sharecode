<?php
//此为修改用户名（昵称）和密码的控制器
define("ACC",true);
require("./include/init.php");
$info = new UserModel();
$data = array();
$user = isset($_POST['name'])?$_POST['name']:'';
$pwd  = isset($_POST['pwd'])?$_POST['pwd']:'';
if(!empty($user)){
	$data['user'] = $user;
}
if(!empty($pwd)){
	$data['pwd']  = $pwd;
}

if($info->update($data,$_SESSION['user'])){
	echo "修改成功";
}



