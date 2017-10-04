<?php
define("ACC",true);
require("./include/PHPMailer/class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPSecure = 'tls';
$mail->SMTPDebug = 1;
$mail->Host = 'smtp.163.com';
$mail->SMTPAuth = true;
$mail->CharSet = 'utf-8';
$mail->Username = '15263095729';
$mail->Password = 'wwj926936543';
$mail->From = '15263095729@163.com';
$mail->FromName = 'sharecode';
$mail->Subject  = 'wan 欢迎你来注册，请激活邮件';
$mail->Body     = '请点击http://localhost/wwwroot/verify.php?code= 激活邮件';

//添加收件人
$mail->AddAddress('15263095729@163.com','15263095729');
$mail->AddCC('1654206898@qq.com','wan');
echo $mail->send();