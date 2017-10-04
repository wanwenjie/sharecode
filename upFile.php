<?php 
define("ACC",true);
require("./include/init.php");
require('./tools/UpTool.class.php');
$info = new AnimaModel();
$user = $_SESSION['user'];
if($user == ''){
	$user = 'wwj';
}
$file = new upTool('file',$user);
$pic  = new upTool('pic',$user);
//上传文件
$file->upFile();
$pic->upPic();
//解压文件
$url = $file->unzip();
$title = isset($_POST['title'])?$_POST['title']:'';
$cat_id = isset($_POST['cat_id'])?$_POST['cat_id']:'';
$content = isset($_POST['content'])?$_POST['content']:'';
$file_path = $file->getPathFile();
$pic_path  = $pic->getPathPic();
$size = $file->getSize();
$data = array();

$data['title'] = $title;
$data['url'] = $url;
$data['content'] = $content;
$data['file_path'] = $file_path;
$data['size'] = $size;
$data['id'] = $info->getId()+1;
$data['user'] = $user;
$data['cat_id'] = $cat_id;
$data['pic']  =  $pic_path;
$info->submit($data);
echo "提交成功";


