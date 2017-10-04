<!DOCTYPE html>
<html lang="en">
<head>
	<title>上传记录-sharecode</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php require('include.html');?>
	<link rel="stylesheet" href="css/app.ac1878ad.css">
</head>
<body class="page-index  en" >
	<!-- 头部开始 -->
<?php include("header.php");?>
<?php 
	//引用分页
	require('../tools/FenyeTool.class.php');
	//初始化分页，每页显示6条，当前页数为1
	$perpage = 5;
	$page    = isset($_GET['page'])?$_GET['page']:1;
	$offset  = ($page-1)*$perpage;
	$fenye = new FenyeModel($anim->getNum($user),$perpage,$page);
	//从数据库中取出用户上传审核通过的特效的记录
	$record = $anim->getAllByUser($user,$offset,$perpage);
	//删除功能
$id = isset($_GET['id'])?$_GET['id']:'';
if (!empty($id)) {
	if($anim->delAnimById($id)){
		echo "<script>window.location.reload();</script>";
	}
}

?>

<!-- 中间部分 -->
 	<div class="site-main">
		<div class="container">
			<div class="row">
			<!-- 左侧信息栏开始 -->
<?php include("left.php");?>
			<!-- 左侧信息栏结束 -->

			<?php if(!empty($record)){
				foreach ($record as $key => $value) {
					
			?>
				<div class="col-sm-9 col-md-9 col-lg-9 main-body">				
					<div class="thread-list">
						<div class="list-group">
							<div class="list-group-item">
								<div class="category category-official is-pin "title="official">
									<a href=""><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
								</div>
								<div class="item-body">
									<a href="<?php echo $value['url'];?>" class="title hover-blue issues-item-link"><?php echo $value['title'];?></a>
									<div class="post-info">
										<span class="create-user"><?php echo $value['user'];?></span>
										<span class="post-date" style="color:#34A853"><?php echo $value['date'];?></span>
									</div>
									<div class="post-count">
										<div class="post-num">
											<span class="glyphicon glyphicon glyphicon-heart" style="color:#EA4335;"></span>
											<span style="color:#EA4335;"><?php echo $value['collect'];?></span>&nbsp;&nbsp;
											<span class="glyphicon glyphicon-eye-open" style="color:#F9BF0F;"></span>
											<span style="color:#F9BF0F;"><?php echo $value['skim'];?>&nbsp;&nbsp;</span>
					
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div> 
<?php }}?>
 				<ul class="pager">
				  <?php if($anim->getNum($user) >5){echo $fenye->show();}?>
				</ul>
			</div>
		</div>
	</div> 
	<!-- 中间部分 -->
 	<!-- 尾部开始 -->
<?php include("footer.html");?>
	<!-- 尾部结束 -->
</body>
<script src="js/lib.e132304d.js"></script>
<script src="js/app.72d66d24.js"></script>
</html>