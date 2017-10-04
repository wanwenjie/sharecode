<?php 
define("ACC",true);
require("../include/init.php");
require('../tools/UpTool.class.php');
$anim = new AnimaModel();

$file = new upTool('file');
//上传文件
$file->upFileByTime();
//解压文件
$url = $file->unzipByTime();
$title = isset($_POST['title'])?$_POST['title']:'';
$content = isset($_POST['content'])?$_POST['content']:'';
$file_path = $file->getPathByTime();

$size = $file->getSize();
$data = array();

$data['title'] = $title;
$data['url'] = $url;
$data['content'] = $content;
$data['file_path'] = $file_path;
$data['size'] = $size;
$data['id'] = $anim->getDemoId()+1;


$anim->submitDemo($data);
echo "提交成功";


