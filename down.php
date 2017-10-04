<?php
define('ACC',true);
require('include/init.php');
$anim = new AnimaModel();
$id = isset($_POST['id'])?$_POST['id']+0:'';

if(!empty($id)){
	$data['down'] = $anim->getDownById($id)+1;
	$anim->update($data,$id);
}

