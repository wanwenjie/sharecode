<?php

$ck_id = isset($_POST['ck_id'])?$_POST['ck_id']:0;
$way   = isset($_POST['way'])?$_POST['way']:'';


//批量删除开始
define("ACC",true);
require("../include/init.php");
$anim = new AnimaModel();
$info = new UserModel();

switch ($way) {
	case 'plug':
		//删除插件
		foreach ($ck_id as $key => $value) {
			$anim->delAnimById($value);
		}
		break;

	case 'demo':
		//删除在线代码
		foreach ($ck_id as $key => $value) {
			$anim->delDemoById($value);
		}
		break;

	case 'cat':
		//删除分类
		foreach ($ck_id as $key => $value) {
			$anim->delCatById($value);
		}
		break;

	case 'user':
		//删除会员列表
		foreach ($ck_id as $key => $value) {
			$info->delUserById($value);
		}
		break;

	case 'admin':
		//删除管理员列表
		foreach ($ck_id as $key => $value) {
			$info->delAdminById($value);
		}
		break;

	case 'collect':
		//删除管理员列表
		foreach ($ck_id as $key => $value) {
			$anim->delCollectById($value);
		}
		break;

	case 'follow':
		//删除管理员列表
		foreach ($ck_id as $key => $value) {
			$info->delFollowById($value);
		}
		break;
}






















