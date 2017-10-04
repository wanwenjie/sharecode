<?php 
define("ACC",true);
require("../include/init.php");
$info = new UserModel();
$anim = new AnimaModel();
$user  = isset($_SESSION['user'])?$_SESSION['user']:'';
if(!empty($user)){
	$pic = $info->getPic($user);
}

//判断当前页面是否已经登录，如果没有，则返回登录页面
$page = $_SERVER['PHP_SELF'];
$start = strrpos($page,'/');
$len = strlen($page)-$start;
$page = substr($page,$start+1,$len);
$data = array("upload.php","user.php","uprecord.php","collect.php");
if(in_array($page,$data)){
	if(empty($_SESSION['user'])){
		header("location:login.html");
	}
}

?>
<header class="site-header ">
		<div class="container">
			<nav class="navbar" role="navigation">
				<div class="navbar-header">
					<button class="btn btn-primary navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">菜单</button>
					<a class="navbar-brand" href="index.php" data-gta="event" data-category="out-top-nav" data-action="tb logo">Ideal</a>
				</div>
				<div class="collapse navbar-collapse">
					<div class="items-wrap">
						<ul class="navbar-button list-inline">
						<?php if(!empty($_SESSION['user'])){?>
<!-- 显示用户名 -->
							<li class="info-wrap">
								<a href="user.php" class="user">
									<div class="avatar img-circle img-24" id="headerpic" style="background-image:url(<?php echo $pic;?>);"></div>
									<div class="user-name"><?php echo $_SESSION['user'];?></div>
								</a>
								
							</li>
							<li>
							<a href="../login.php?out=<?php echo $_SESSION['user'];?>" class="btn btn-default btn-sm signup">登出</a>
							</li>
							<?php } else{?>
							<li>
								<a class="btn btn-default btn-sm login" target="_blank" href="login.html" data-gta="event" data-category="out-top-nav" data-action="login">登录</a>
							</li>
							<li>
								<a class="btn btn-default btn-sm signup" target="_blank" href="register.html" data-gta="event" data-category="out-top-nav" data-action="signup">注册</a>
							</li>
							<?php }?>
						</ul>
						<ul class="nav navbar-nav">
							<li >
								<a href="index.php" data-gta="event" target="_blank" data-category="out-top-nav" data-action="tour">主页</a>
							</li>
							<li >
								<a href="display.php" target="_blank" data-gta="event" data-category="out-top-nav" data-action="prices">示例&下载</a>
							</li>
							<li >
								<a href="<?php if(!empty($_SESSION['user'])){?>user.php<?php }else{?>login.html<?php }?>" data-gta="event" target="_blank" data-category="out-top-nav" data-action="apps">我的空间</a>
							</li>
							<li>
								<a href="onlinecode.php" target="_blank" data-gta="event" data-category="out-top-nav" data-action="blog">在线代码</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>