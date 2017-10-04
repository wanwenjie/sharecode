<!DOCTYPE html>
<html lang="en">
<head>
	<title>内容页-sharecode</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php require('include.html');?>
	<link rel="stylesheet" href="css/app.ac1878ad.css">
</head>
	<script>
			window.onload = function (){
			var xhr = new XMLHttpRequest();
			xhr.open('POST','../follow.php',true);
			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhr.send('author='+author);
			xhr.onreadystatechange = function (){
				if(this.readyState == 4){
					if(this.responseText=="true"){
						icon.className = 'glyphicon glyphicon-ok';
						icon.style.color = '#03A9F4';
						isfollowed.style.color = '#03A9F4';
						followNum.style.color = '#03A9F4';
						isfollowed.innerHTML = "已关注该作者";
						flag = 1;
					}else{
						icon.className = 'glyphicon glyphicon-plus-sign';
						isfollowed.innerHTML = "关注作者";
						flag = 0;
					}
				}
			}
			
			var xhr_2 = new XMLHttpRequest();
			xhr_2.open('POST','../collect.php',true);
			xhr_2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhr_2.send('collect_id='+id);
			xhr_2.onreadystatechange = function (){
				if(this.readyState == 4){
					if(this.responseText=="true"){
						c_icon.className = 'glyphicon glyphicon-heart';
						c_icon.style.color = '#03A9F4';
						iscollected.style.color = '#03A9F4';
						collectNum.style.color = '#03A9F4';
						iscollected.innerHTML = "已收藏";
						c_flag = 1;
					}else{
						c_icon.className = 'glyphicon glyphicon-heart-empty';
						iscollected.innerHTML = "点击收藏";
						c_flag = 0;
					}
				}
			}
		}
	</script>
<body class="page-index  en" >
	<!-- 头部开始 -->
	<?php include("header.php");?>
	<?php 
		//根据id取出每一条数据
		$id = isset($_GET['id'])?$_GET['id']+0:1;
		$detail = array();
		$detail = $anim->getDataById($id);
		//添加浏览量
		$data = array();
		$data['skim'] = $detail['skim']+1;
		$anim ->update($data,$detail['id']);
		//获取本id在全部id中的序列号
		$arr = $anim->getAllId();
		if(!empty($arr)){
			foreach ($arr as $key => $value) {
			if($value['id'] == $id){
				$num = $key;
			}
		}
		}
		


	?>
	<!-- 头部结束 -->
	<div class="container">
		<?php require('bar.html');?>
	</div>

		<?php if(!empty($detail)){?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-9 col-sm-8 column animated bounceInLeft" style="border-right:1px solid #eee;">
					<ul class="breadcrumb">
						<li>
							<a href="#">示例下载</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo $anim->getCatName($detail['cat_id']);?></a>
						</li>
					</ul>
					<blockquote>
						<p>
							<?php echo $detail['title'];?></p>
					</blockquote>
					<?php if(empty($detail['pic'])){?>
					<iframe src="<?php echo $detail['url'];?>" frameborder="0" scrolling="no" width="100%" height="300px"></iframe>
					<?php }else{?>
					<img alt="<?php echo $detail['title'];?>" src="<?php echo $detail['pic'];?>" class="img-responsive img-rounded"/>
					<?php }?>
					
					<div class="panel panel-danger" style="margin-top:20px;">
					   <div class="panel-heading">
					      <h3 class="panel-title">插件介绍</h3>
					   </div>
					   <div class="panel-body">
					      <?php echo $detail['content'];?>
					   </div>
					</div>

					<div class="row clearfix">
						<div class="col-md-12 column">
							<a type="button" target="_blank" class="btn  btn-warning" href="<?php echo $detail['url'];?>
								">
								<span class="glyphicon glyphicon-bullhorn"></span>
								&nbsp在线演示
							</a>
							<a type="button" class="btn  btn-info" href="<?php echo $detail['file_path'];?>
								" onclick="down()">
								<span class="glyphicon glyphicon-save"></span>
								&nbsp点击下载
							</a>
							<hr>
							<ul class="pager">
								<li class="previous">
									<a href="<?php if($num-1 >= 0){echo '?id='.$arr[$num-1]['id'];}else{echo '#';}?>">&larr; 上一页</a>
								</li>
								<li class="next">
									<a href="<?php if(!empty($arr[$num+1])){echo '?id='.$arr[$num+1]['id'];}else{echo '#';}?>">下一页 &rarr;</a>
								</li>
							</ul>
						</div>
					</div>
					<hr>
					<div class="row clearfix">
						<div class="col-md-12 column">
							<blockquote>
								<p>评论区</p>
							</blockquote>
							<div class="row clearfix">
								<div class="col-md-12 column">
									<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="<?php echo $detail['id'];?>" data-title="<?php echo $detail['title'];?>" data-url="请替换成文章的网址"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"sharecode"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->
								</div> 
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 column">
					<div class="row clearfix">
						<div class="col-md-12 column animated bounceInRight">
							<div class="user-info">
								<div class="infobar">
									<div class="avatar size36"style="background-image:url(<?php echo $info->getPic($detail['user']);?>);"></div>
									<div class="info-content">
										<div class="name" id="author"><?php echo $detail['user'];?></div>
										<div class="description">
											<a href="#">
												<span class="glyphicon glyphicon-map-marker"></span></a>
										</div>
									</div>
								</div>
								<div class="list-group user-nav">
									<a href="<?php if($user==$detail['user'] or $user == ''){echo '#';}else{echo 'javascript:follow()';}?>" class="list-group-item withripple" >
									<!-- 关注成功后glyphicon glyphicon-ok -->
										<span class="glyphicon glyphicon-plus-sign" id="icon"></span>
										<span id="isfollowed">关注作者</span>
										<span class="pull-right" id="followNum"><?php echo $info->getFollows($detail['user']);?></span>
									</a>
									<a href="<?php if($user==$detail['user'] or $user == ''){echo '#';}else{echo 'javascript:collect()';}?>" class="list-group-item" >
									<!-- 收藏成功后 glyphicon glyphicon-heart-->
										<span class="glyphicon glyphicon-heart-empty" id="c_icon"></span>
										<span id="iscollected">点击收藏</span>
										<span class="pull-right" id="collectNum"><?php echo $detail['collect'];?></span>
									</a>
									<a class="list-group-item" >
										<span class="glyphicon glyphicon-eye-open" style="color:#03A9F4;"></span>
										<span style="color:#03A9F4;">浏览次数</span>
										<span class="pull-right" style="color:#03A9F4;"><?php echo $detail['skim'];?></span>
									</a>

									<a class="list-group-item" >
										<span class="glyphicon glyphicon-cloud-download" style="color:#03A9F4;"></span>
										<span style="color:#03A9F4;">下载次数</span>
										<span class="pull-right" style="color:#03A9F4;"><?php echo $detail['down'];?></span>
									</a>
	
								</div>
							</div>
						</div>
					</div>
					<div id="debug"></div>
					<div class="row clearfix" style="margin-top:25px;">
						<div class="col-md-12 column animated bounceInRight">
							<?php include('panel.html');?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php }else{?>
	<div class="container" style="margin-bottom:120px;">
			<div class="col-xs-12 col-sm-7 col-lg-7">
			
				<div class="info">
					<h1>╮(╯﹏╰)╭</h1>
					<h2>没有你想要的</h2>
					<p>我们会再接再厉</p>
				</div>
			</div>

			<div class="col-xs-12 col-sm-5 col-lg-5 text-center">
			
				<div class="monkey">
					<img src="cssimg/wait.gif" alt="wait" />
				</div>
				
			</div>

		</div>
		<?php }?>
<!-- 尾部开始 -->
<?php include("footer.html");?>
<!-- 尾部结束 -->
</body>
<script>
	var flag = 0;
	var c_flag = 0;
	//获取当前页面id
	var url = window.location.search;
    var id = url.substring(url.lastIndexOf('=')+1, url.length);
	//提取将要控制的文本对象
	var isfollowed = document.getElementById('isfollowed');
	var iscollected = document.getElementById('iscollected');
	//提取作者信息	
	var author = document.getElementById('author').innerHTML;
	//关注的图标
	var icon = document.getElementById('icon');
	//收藏的图标
	var c_icon = document.getElementById('c_icon');



		//关注功能开始
	function follow(){
		//创建xhr对象
		var xhr = new XMLHttpRequest();
		xhr.open('POST','../followAct.php',true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		//获取页面中的关注量
		var num = document.getElementById('followNum');
		var count = parseInt(num.innerHTML);
		if(flag == 0){
			    //如果没有关注，点击关注，关注量+1
				icon.className = 'glyphicon glyphicon-ok';
				isfollowed.innerHTML = "已关注该作者";
				count += 1;
				xhr.send('follows='+count+'&author='+author+'&flag=0');
				xhr.onreadystatechange = function (){
				if(this.readyState == 4){
					num.innerHTML = this.responseText;				
					flag = 1;
				}
			}
		}else{
			//取消关注，关注量-1
			icon.className = 'glyphicon glyphicon-plus-sign';
			isfollowed.innerHTML = "已取消关注";
			count-=1;
			xhr.send('follows='+count+'&author='+author+'&flag=1');
			xhr.onreadystatechange = function (){
				if(this.readyState == 4){
					num.innerHTML = this.responseText;
					flag = 0;
				}
			}
		}

	}

	//收藏功能开始
	function collect(){
		//创建xhr对象
		var xhr = new XMLHttpRequest();
		xhr.open('POST','../collectAct.php',true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		//获取页面中的关注量
		var num = document.getElementById('collectNum');
		var count = parseInt(num.innerHTML);
		if(c_flag == 0){
			    //如果没有关注，点击关注，关注量+1
				c_icon.className = 'glyphicon glyphicon-heart';
				iscollected.innerHTML = "已收藏";
				count += 1;
				xhr.send('collect='+count+'&collect_id='+id+'&c_flag=0');
				xhr.onreadystatechange = function (){
				if(this.readyState == 4){
					num.innerHTML = this.responseText;				
					c_flag = 1;
				}
			}
		}else{
			//取消关注，关注量-1
			c_icon.className = 'glyphicon glyphicon-heart-empty';
			iscollected.innerHTML = "已取消收藏";
			count-=1;
			xhr.send('collect='+count+'&collect_id='+id+'&c_flag=1');
			xhr.onreadystatechange = function (){
				if(this.readyState == 4){
					num.innerHTML = this.responseText;
					c_flag = 0;
				}
			}
		}

	}

	//下载次数计数
	function down(){
		var xhr = new XMLHttpRequest();
		xhr.open("POST",'../down.php',true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.onreadystatechange = function (){
			if(this.readyState == 4){
				document.getElementById('debug').innerHTML = this.responseText;
			}
		}
		xhr.send('id='+id);
	}

	</script>
<script src="js/lib.e132304d.js"></script>
<script src="js/app.72d66d24.js"></script>
</html>



