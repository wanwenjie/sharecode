<?php
define("ACC",true);
require("./include/init.php");
$info = new UserModel();
$data = array();
$user = isset($_POST['user'])?$_POST['user']:$user;
$pwd  = isset($_POST['pwd'])?$_POST['pwd']:$pwd;
$email = isset($_POST['email'])?$_POST['email']:$email;
$data['user'] = $user;

$data['pwd'] = $pwd;
$data['email'] = $email;
$data['flag'] = 0;
$data['id'] = $info->getId()+1;

$arr['user'] = $user;
$arr['id'] = $info->getId()+1;
$str = 'abcdefghigklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ0123456789';
$arr['code'] = substr(str_shuffle($str),0,8);
$arr['expire'] = time()+5*24*3600;

if($user!=''||$email!=''||$pwd!=''){
	if($info->isUser($user)){
		echo "*用户已存在";
	}else if($info->isEmail($email)) {
		echo "*此账号已存在";
	}else{
		$info->reg($data);
		$info->insert($arr);
		//发送邮件
		$mail = new PHPMailer();
		$mail->SMTPSecure = 'tls';
		$mail->CharSet = 'utf-8';
		$mail->From = '1654206898@qq.com';
		$mail->IsSMTP();
		$mail->Host = 'smtp.qq.com';
		$mail->SMTPAuth = true;
		$mail->Username = '1654206898@qq.com';
		$mail->Password = '@wwj926936543';
		$mail->FromName = 'sharecode';
		$mail->Subject  = $user.'欢迎你来注册，请激活邮件';
		$mail->isHTML(true);   
		$mail->Body     = '请点击 <a href="http://localhost/wwwroot/verify.php?user='.$user.'&code='.$arr['code'].'">激活邮件</a>';

		//添加收件人
		$mail->AddAddress($email,'sharecode');
		echo $mail->send()?"发送激活邮件成功":"发送激活邮件失败";
	}
		
}
