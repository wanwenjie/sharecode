<?php
//上传图片，并将图片地址传送到数据库中
define('ACC',true);
require('./include/init.php');
require('./tools/UpTool.class.php');
//上传之前，删除旧的

$user = $_SESSION['user'];
$file = new upTool('pic',$user);
$file->upPic();
$path = $file->getPathPic();
$info = new UserModel();
//更新数据库中的图片
$info->setPic($user,$path);