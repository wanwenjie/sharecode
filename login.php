<?php
define("ACC",true);
require("./include/init.php");
//首先验证验证码是否正确

$info = new UserModel();
$code = $_SESSION['code'];
$email = "1654206898@qq.com";
$pwd  = "147528";
$out = "";

$out = isset($_GET['out'])?$_GET['out']:$out;
$email = !empty($_POST['email'])?$_POST['email']:$email;
$pwd  = !empty($_POST['pwd'])?$_POST['pwd']:$pwd;
$code = !empty($_POST['code'])?$_POST['code']:$code;
if (strtolower($code) != $_SESSION['code']){
	echo "*验证码错误";


}else if($info->login($email,$pwd)){
		echo "登录成功,正在跳转......";

}else{
	echo "*用户名或密码有误";
}
if(!empty($out)){
	$info->logout($out);
}

