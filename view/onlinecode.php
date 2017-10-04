<!DOCTYPE html>
<html lang="en">
<head>
	<title>在线代码-sharecode</title>
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
	$perpage = 8;
	$page    = isset($_GET['page'])?$_GET['page']:1;
	$offset  = ($page-1)*$perpage;

	$fenye = new FenyeModel($anim->getNumByDemo(),$perpage,$page);
	$data = $anim->getDemoAll($offset,$perpage);

	?>
	<!-- 头部结束 -->
	<div class="container">
	<?php require('bar.html');?>
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class="row">
				<?php 
				if(!empty($data)){
					foreach ($data as $key => $value) {
					
				?>
					<div class="col-md-3  col-sm-6 col-xs-12 animated bounceInDown">
						<div class="thumbnail">
							<iframe src="<?php echo $value['url'];?>" frameborder="0" width="100%" height="100%" scrolling="no"></iframe>
							<div class="caption">
								<div style="height:65px;">
									<h5>
										<a href="code.php?id=<?php echo $value['id'];?>" style="color:#60BDE8;";>
											<?php echo $value['title'];?></a>
									</h5>
									<small>
										<?php echo $value['content'];?></small>
								</div>
								<p>
									<hr>
									<span class="glyphicon glyphicon-eye-open" style="color:#EA4335;;"></span>
									&nbsp;<?php echo $value['skim'];?>&nbsp;&nbsp;&nbsp;
								</p>
							</div>
						</div>
					</div>
					<?php }}?>
				</div>
			</div>
		</div>
	</div>
	<ul class="pager">
		<?php if($anim->getNumByDemo()>8){echo $fenye->show();}?>
	</ul>

</div>
<!-- 尾部开始 -->
<?php include("footer.html");?>
<!-- 尾部结束 -->
</body>
<script>
	//先以html为例子
	var flagHtml = 1;
	var flagCss = 1;
	var flagJs = 1;
	var count = 3;
	var cssDiv = document.getElementById('css');
	var jsDiv = document.getElementById('js');
	var htmlDiv = document.getElementById('html');
	var cssTag = document.getElementById('idCss');
	var jsTag = document.getElementById('idJs');
	var htmlTag = document.getElementById('idHtml');
	var textarea = document.getElementsByTagName('textarea');

	function showHtml(){
 		if(flagHtml == 1){
 			//如果只剩下这一个标签，不灭
 			if (count ==1){
 				textarea[0].rows = 18;
 			}else{
				//标签变暗	 			
	 			htmlTag.className = "label label-default";	 			
	 			//标签亮的个数减一	 			
	 			count -=1;
	 			//根据个数调整文本域的大小
	 			if(count != 0){
	 				textarea[1].rows = 18/count;
	 				textarea[2].rows = 18/count;
	 			}	 			
	 			//隐藏自身的div
	 			htmlDiv.style.display = "none";
	 			//开关标签的标志
	 			flagHtml = 0;
	 		}
 		}else{
 			//标签变亮
 			htmlTag.className = "label label-success";
 			//亮的个数+1
 			count += 1;
 			//调整文本域的大小
 			textarea[0].rows = 18/count;
 			textarea[1].rows = 18/count;
 			textarea[2].rows = 18/count;
 			//显示自己的div
 			htmlDiv.style.display = 'block';
 			flagHtml = 1;
 		}
	}

	function showCss(){
 		if(flagCss == 1){
 			//如果只剩下这一个标签，不灭
 			if (count ==1){
 				textarea[1].rows = 18;
 			}else{
				//标签变暗	 			
	 			cssTag.className = "label label-default";	 			
	 			//标签亮的个数减一	 			
	 			count -=1;
	 			//根据个数调整文本域的大小
	 			if(count != 0){
	 				textarea[0].rows = 18/count;
	 				textarea[2].rows = 18/count;
	 			}	 			
	 			//隐藏自身的div
	 			cssDiv.style.display = "none";
	 			//开关标签的标志
	 			flagCss = 0;
	 		}
 		}else{
 			//标签变亮
 			cssTag.className = "label label-success";
 			//亮的个数+1
 			count += 1;
 			//调整文本域的大小
 			textarea[0].rows = 18/count;
 			textarea[1].rows = 18/count;
 			textarea[2].rows = 18/count;
 			//显示自己的div
 			cssDiv.style.display = 'block';
 			flagCss = 1;
 		}
	}

	function showJs(){
 		if(flagJs == 1){
 			//如果只剩下这一个标签，不灭
 			if (count ==1){
 				textarea[2].rows = 18;
 			}else{
				//标签变暗	 			
	 			jsTag.className = "label label-default";	 			
	 			//标签亮的个数减一	 			
	 			count -=1;
	 			//根据个数调整文本域的大小
	 			if(count != 0){
	 				textarea[0].rows = 18/count;
	 				textarea[1].rows = 18/count;
	 			}	 			
	 			//隐藏自身的div
	 			jsDiv.style.display = "none";
	 			//开关标签的标志
	 			flagJs = 0;
	 		}
 		}else{
 			//标签变亮
 			jsTag.className = "label label-success";
 			//亮的个数+1
 			count += 1;
 			//调整文本域的大小
 			textarea[0].rows = 18/count;
 			textarea[1].rows = 18/count;
 			textarea[2].rows = 18/count;
 			//显示自己的div
 			jsDiv.style.display = 'block';
 			flagJs = 1;
 		}
	}
	</script>
<script src="js/lib.e132304d.js"></script>
<script src="js/app.72d66d24.js"></script>
</html>