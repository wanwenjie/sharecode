<!DOCTYPE html>
<html lang="en">
<head>
	<title>搜索-sharecode</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php require('include.html');?>
	<link rel="stylesheet" href="css/lib.css">
	<link rel="stylesheet" href="css/app.ac1878ad.css"></head>
<body class="page-index  en" >
	<!-- 头部开始 -->
	<?php include("header.php");?>
	<?php
	//引用分页
	require('../tools/FenyeTool.class.php');
	//初始化分页，每页显示6条，当前页数为1
	$perpage = 6;
	$page    = isset($_GET['page'])?$_GET['page']:1;
	$offset  = ($page-1)*$perpage;
	$search  = isset($_GET['search'])?$_GET['search']:'';
	$data = array();
	if(!empty($search)){
		$fenye = new FenyeModel($anim->searchAll($search),$perpage,$page);
		$data  = $anim->search($search,$offset,$perpage);
	}
	
?>
	<!-- 头部结束 -->
	<div class="container">
		<?php require('bar.html');?>
		<?php if(!empty($data)){
		foreach ($data as $key =>
		$value) {?>
		<div class="col-sm-12 col-md-12 col-lg-12 main-body">
			<hr>
			<div class="thread-list">
				<div class="col-md-4 column">
					<img src="<?php echo $value['pic'];?>" class="img-responsive img-rounded">
				</div>
				<div class="col-md-8 column">
					<dl>
						<dt>标题:</dt>
						<dd >
							<a href="detail.php?id=<?php echo $value['id'];?>
								" style="color:#03A9F4;" target="_blank">
								<?php echo $value['title'];?></a>
						</dd>
                                                  <br>
						<dt>作者:</dt>
						<dd style="color:#34A853;">
							<?php echo $value['user'];?></dd>
						<br>
						<dt>插件简介:</dt>
						<dd style="color:#F9BF0F;">
							<?php echo $value['content'];?></dd>
					</dl>
				</div>
			</div>
		</div>
		<hr>
		<?php }}else{?>
		<div class="container" style="margin-bottom:120px;">
			<div class="col-xs-12 col-sm-7 col-lg-7">
			
				<div class="info">
					<h1>╮(╯﹏╰)╭</h1>
					<h2>没有你想要的</h2>
					<p>我们会再接再厉</p>
				</div>
				<form class="input-group" action="search.php" method="GET">
					<input type="text" class="form-control" placeholder="继续搜索" name="search">
					<span class="input-group-btn">
						<button class="btn btn-info" type="submit">搜索</button>
					</span>
				</form>
			</div>

			<div class="col-xs-12 col-sm-5 col-lg-5 text-center">
			
				<div class="monkey">
					<img src="cssimg/wait.gif" alt="wait" />
				</div>
				
			</div>

		</div>
		<?php }?>

		<ul class="pager">
			<?php if($anim->searchAll($search)>6){echo $fenye->show();}?></ul>

	</div>
	<!-- 尾部开始 -->
	<?php include("footer.html");?>
	<!-- 尾部结束 -->
</body>
	<script src="js/lib.e132304d.js"></script>
	<script src="js/app.72d66d24.js"></script>
	<script>$(function () { $('.tooltip-hide').tooltip('hide');});</script>
</html>