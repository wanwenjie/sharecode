
<!DOCTYPE html>
<html lang="zh">
<head>
	<title>修改信息-sharecode</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php require('include.html');?>
	<link rel="stylesheet" href="css/app.ac1878ad.css" >
</head>
<body class="page-my-profile zh" data-category="community"data-user="57946ca0917f0303294e8ae2" >
	<?php include("header.php");?>
	<div class="site-main">
		<div class="container">
		
			<div class="row">
				<!-- 左侧信息栏开始 -->
				<?php include("left.php");?>
				<!-- 左侧信息栏结束 -->
				<div class="col-sm-9 col-md-9 col-lg-9 main-body animated bounceInRight">
					<div class="panel panel-default profile">
						<div class="panel-heading" style="background-color:#fff;">
							<h3 class="panel-title">个人信息</h3>
						</div>
						<div class="panel-body">
							<div class="avatar size120" id="userpic" style="background-image:url(<?php echo $pic;?>
								);">
								<a class=" white hover-opacity avatar-handler webuploader-container glyphicon glyphicon-pencil" title="更新头像" style="position:absolute;top:80px;right:0px;" >
									<input type="file" style="position:absolute;top:0;left:0;width:30px;height:33px;display:inline;opacity:0;"
									onChange="up()" name="file"></a>
							</div>
							<div class="profile-fields">
								<div class="form-group">
									<input type="text" name="name" value="<?php echo $_SESSION['user'];?>" placeholder="社区昵称" class="form-control"></div>
								<div class="form-group">
									<input type="text" name="pwd" placeholder="修改密码" class="form-control"></input>
								</div>
							</div>
						</div>
					</div>
					<div class="handler-wrap text-right">
						<input type="button" class="btn btn-primary save-handler" onclick="save()" value="保存">
					</div>
					<div id="debug" class="profile-fields">
						<img src="cssimg/dog.gif" alt="wait" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.html");?>
	<script src="js/lib.e132304d.js"></script>
	<script src="js/app.72d66d24.js"></script>
</body>
</html>
<script>
	function up(){
		//使用ajax无刷新技术上传文件
		//创建对象
		var fd = new FormData();
		var xhr = new XMLHttpRequest();
		//获取文件对象
		var file = document.getElementsByName('file')[0].files[0];
		//立即显示图片
		var path = window.URL.createObjectURL(file);
		document.getElementById('userpic').style.backgroundImage = 'url('+path+')';
		document.getElementById('headerpic').style.backgroundImage = 'url('+path+')';
		document.getElementById('leftpic').style.backgroundImage = 'url('+path+')';
		fd.append("pic",file);
		xhr.open('POST','../upPic.php',true);
		xhr.onreadystatechange = function (){
			if(this.readyState == 4){
				document.getElementById('debug').innerHTML = this.responseText;
				//window.location.reload();
			}
		}
		xhr.send(fd);
		
	}

	function save(){
		var fd = new FormData();
		var user = document.getElementsByName('name')[0].value;
		var pwd  = document.getElementsByName('pwd')[0].value;
		fd.append("name",user);
		fd.append('pwd',pwd);

		var xhr = new XMLHttpRequest();
		xhr.open('POST','../modify.php',true);
		xhr.onreadystatechange = function (){
			if(this.readyState == 4){
				document.getElementById('debug').innerHTML = this.responseText;
				window.location.reload();
			}
		}
		xhr.send(fd);
	}
</script>