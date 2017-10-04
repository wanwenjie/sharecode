<?php
//此为修改用户名（昵称）和密码的控制器
define("ACC",true);
require("../include/init.php");
$info = new UserModel();
$opwd = isset($_POST['oldpwd'])?$_POST['oldpwd']:'';
$pwd =  isset($_POST['pwd'])?$_POST['pwd']:'';
$data['pwd'] = $pwd;
$user = $_SESSION['admin'];
if($info->verify($opwd,$user)){
	if($info->updateAdmin($data,$user)){
		echo "修改成功";
	}
}



