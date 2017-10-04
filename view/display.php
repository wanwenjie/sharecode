<!DOCTYPE html>
<html lang="en">
<head>
	<title>在线演示-sharecode</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php require('include.html');?>
	<link rel="stylesheet" href="css/app.ac1878ad.css" >
	<style>
		#thumb{
		width:auto;
		height:149px;
	}
	</style>

</head>
<script>
window.onload = function(){
	var url = window.location.search;
	
	var pageIndex = url.indexOf('&page');
	if(pageIndex < 0){
		pageIndex = url.length;
	}
	var iscat = url.indexOf('cat_id=');
	if(iscat >= 0 ){
		var catId = url.substring(url.indexOf('cat_id=')+7,pageIndex);
		document.getElementById('nav_'+catId).className = 'active';
	}else{
		document.getElementById('nav_1').className="active";
	}
	
}
	
</script>
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
	$cat_id = isset($_GET['cat_id'])?$_GET['cat_id']+0:1;
	$fenye = new FenyeModel($anim->getNumByCatId($cat_id),$perpage,$page);
	//根据cat_id取出来的数据
	$data = array();
	$data = $anim->getDataByCatId($cat_id,$offset,$perpage);
?>
	<!-- 头部结束 -->
	<div class="container">
<?php require('nav.html');?>
<?php require('bar.html');?>
		<div class="row clearfix">
		<div class="col-md-9 column" style="border-right:1px solid $eee;">
		<?php for ($j = 0,$z = 0; $j < ceil(count($data)/3); $j++) { 

		?>
			<div class="row">
			<?php for ($i = 0; $i < 3; $i++,$z++) { 
				if(!isset($data[$z]['id'])){continue;}
			?>
				<div class="col-md-4  col-sm-6 col-xs-12 animated bounceInDown">
					<div class="thumbnail">
                                               
						<img src="<?php echo $data[$z]['pic'];?>" id="thumb" class="img-rounded img-responsive" alt="<?php echo $data[$z]['title'];?>">
				
						<div class="caption">
							<div style="height:65px;">
								<h5>
									<a href="detail.php?id=<?php echo $data[$z]['id'];?>" target="_blank" style="color:#60BDE8;";><?php echo $data[$z]['title'];?></a>
								</h5>
								<small>
								<?php if(strlen($data[$z]['content'])>35){echo mb_substr($data[$z]['content'],0,35,'utf-8')." ...";}else{echo $data[$z]['content'];} ?>
								
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
		      <div class="col-md-3 column animated bounceInRight">
                    <?php include('panel.html');?>
                  </div>
   </div>

	<ul class="pager">
		  <?php if($anim->getNumByCatId($cat_id)>6){echo $fenye->show();}?>
	</ul>

	</div>
	<!-- 尾部开始 -->
<?php include("footer.html");?>
	<!-- 尾部结束 -->
</body>
	<script src="js/lib.e132304d.js"></script>
	<script src="js/app.72d66d24.js"></script>
	<script>
      $(function () { $('.tooltip-hide').tooltip('hide');});
	</script>
</html>