<?php
define("ACC",true);
require("./include/init.php");
$anim = new AnimaModel();
$user   = $_SESSION['user'];
$collect_id = isset($_POST['collect_id'])?$_POST['collect_id']:'';
//判断此用户是否收藏过此插件
if($anim->iscollect($user,$collect_id)){
	echo "true";
}else{
	echo "false";
}
