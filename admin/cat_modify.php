<?php 
define("ACC",true);
require("../include/init.php");
$anim = new AnimaModel();

$cat_id = isset($_POST['cat_id'])?$_POST['cat_id']:'';
$data['cat_name'] = isset($_POST['cat_name'])?$_POST['cat_name']:'';

if(!empty($cat_id)){
	if($anim->updateCat($data,$cat_id)){
		echo "修改成功";
	}else{
		echo "修改失败";
	}
}
