<?php
define("ACC",true);
require("../include/init.php");
$info = new UserModel();
$data = array();
$user = isset($_POST['user'])?$_POST['user']:$user;
$pwd  = isset($_POST['pwd'])?$_POST['pwd']:$pwd;
$email = isset($_POST['email'])?$_POST['email']:$email;
$data['user'] = $user;
$data['pwd'] = $pwd;
$data['email'] = $email;
$data['flag'] = 0;
$data['id'] = $info->getIdAdmin()+1;
if($user!=''||$email!=''||$pwd!=''){
	if($info->isUserAdmin($user)){
		echo "*用户已存在";
	}else if($info->isEmailAdmin($email)) {
		echo "*此账号已存在";
	}else{
		$info->regAdmin($data);
		echo "*用户已成功注册";
	}
		
}
