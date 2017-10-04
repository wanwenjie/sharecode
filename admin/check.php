<?php
$ck_id = isset($_POST['ck_id'])?$_POST['ck_id']:0;

define("ACC",true);
require("../include/init.php");
$anim = new AnimaModel();

foreach ($ck_id as $key => $value) {
	$arr['_check'] = 1;
	$anim->update($arr,$value);
}