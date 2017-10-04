<?php 
define("ACC",true);
require("../include/init.php");
$anim = new AnimaModel();


$data['cat_id'] = isset($_POST['cat_id'])?$_POST['cat_id']:'';
$data['cat_name'] = isset($_POST['cat_name'])?$_POST['cat_name']:'';


if($anim->addCat($data)){
	echo "添加成功";
}else{
	echo "添加失败";
}