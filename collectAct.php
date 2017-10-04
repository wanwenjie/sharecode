<?php
define("ACC",true);
require("./include/init.php");
$anim = new AnimaModel();
$user = $_SESSION['user'];
$arr =array();
$data = array();
//修改aimation表插件的收藏人数，并向collect表中添加收藏记录
$collect_id = isset($_POST['collect_id'])?$_POST['collect_id']:'';
$collect = isset($_POST['collect'])?$_POST['collect']+0:'';
$c_flag = isset($_POST['c_flag'])?$_POST['c_flag']:'';
$arr['collect'] = $collect;


if(!empty($collect)){
	if($anim->update($arr,$collect_id)){
		echo $anim->getCollect($collect_id);
	}
	if($c_flag == 0){
		//添加关注记录
		$data['user'] = $user;
		$data['collect_id'] = $collect_id;
		$data['id'] = $anim->getLastId()+1;
		$anim->addCollect($data);
	}

	if($c_flag == 1){
		//删除关注记录
		$anim->delCollect($user,$collect_id);
	}
}





 