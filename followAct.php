<?php
define("ACC",true);
require("./include/init.php");
$info = new UserModel();
$user = $_SESSION['user'];
$arr =array();
$data = array();
//修改userinfo表作者的关注人数，并向follows表中添加关注记录
$author = isset($_POST['author'])?$_POST['author']:'';
$follows = isset($_POST['follows'])?$_POST['follows']+0:'';
$flag = isset($_POST['flag'])?$_POST['flag']:'';
$arr['follows'] = $follows;

if(!empty($follows)){
	if($info->update($arr,$author)){
		echo $info->getFollows($author);
	}
	if($flag == 0){
		//添加关注记录
		$data['user'] = $user;
		$data['author'] = $author;
		$data['id'] = $info->getLastId()+1;
		$info->addFollow($data);
	}

	if($flag == 1){
		//删除关注记录
		$info->delFollow($user,$author);
	}
}





 