<!DOCTYPE html>
<html lang="en">
<head>
	<title>我的收藏-sharecode</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php require('include.html');?>
	<link rel="stylesheet" href="css/app.ac1878ad.css" >
</head>
<body class="page-index  en" >
	<!-- 头部开始 -->
<?php include("header.php");?>
<?php 
//引用分页
require('../tools/FenyeTool.class.php');
//初始化分页，每页显示6条，当前页数为1
$perpage = 4;
$page    = isset($_GET['page'])?$_GET['page']:1;
$offset  = ($page-1)*$perpage;

$fenye = new FenyeModel($anim->getNumByCollect($user),$perpage,$page);
$data = array();
$data = $anim->getCollectByUser($user,$offset,$perpage);

?>
<!-- 头部结束 -->
<!-- 中间部分 -->
 	<div class="site-main">
		<div class="container">
			<div class="row">
			<!-- 左侧信息栏开始 -->
<?php include("left.php");?>
			<!-- 左侧信息栏结束 -->
 				<div class="col-sm-9 col-md-9 col-lg-9 main-body">
					<?php for ($j = 0,$z = 0; $j < ceil(count($data)/2); $j++) { 

		?>
			<div class="row">
			<?php for ($i = 0; $i < 2; $i++,$z++) { 
				if(!isset($data[$z]['id'])){continue;}
			?>
				<div class="col-md-6  col-sm-6 col-xs-12 animated bounceInDown">
					<div class="thumbnail">
						<img src="<?php echo $data[$z]['pic'];?>" id="thumb" class="img-rounded img-responsive" alt="<?php echo $data[$z]['title'];?>"><div class="caption">
							<div style="height:65px;">
								<h5>
									<a href="detail.php?id=<?php echo $data[$z]['id'];?>" target="_blank" style="color:#60BDE8;";><?php echo $data[$z]['title'];?></a>
								</h5>
								<small>
									<?php echo mb_substr($data[$z]['content'],0,40,'utf-8')." ...";?>
								</small>
							</div>
							<p>
							<hr>
							<span class="glyphicon glyphicon-eye-open" style="color:#F9BF0F;"></span>&nbsp;<?php echo ceil($data[$z]['skim']/2);?>&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-heart" style="color:#EA4335;"></span>&nbsp;<?php echo $data[$z]['collect'];?>&nbsp;&nbsp;&nbsp;<a href="" class="tooltip-hide" data-toggle="tooltip" title="<?php echo $data[$z]['user'];?>" style="float:right;"><span class="glyphicon glyphicon-user pull-right"style="color:#34A853;"></span></a>
							</p>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
			<?php }?>
				</div> 
			</div>
			<ul class="pager">
			  <?php if($anim->getNumByCollect($user)>4){echo $fenye->show();}?>
			</ul>
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