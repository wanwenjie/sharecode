<?php include('_header.html');?>
<?php 
define("ACC",true);
require("../include/init.php");
$anim = new AnimaModel();
$data = array();
//引用分页
require('../tools/FenyeTool.class.php');
//初始化分页，每页显示6条，当前页数为1
$perpage = 6;
$page    = isset($_GET['page'])?$_GET['page']:1;
$offset  = ($page-1)*$perpage;

$fenye = new FenyeModel($anim->getTotalCollect(),$perpage,$page);
$data = $anim->getAllCollect($offset,$perpage);

$id = isset($_GET['id'])?$_GET['id']:'';
if (!empty($id)) {
	if($anim->delCollectById($id)){
		echo "<script>window.location.href='member-record-browse.php';</script>";
	}
}
?>
<title>收藏记录</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 收藏记录 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong><?php echo $anim->getTotalCollect(); ?></strong> 条</span> </div>
	<div id="debug"></div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="100">用户名</th>
					<th width="130">收藏插件id</th>
					<th width="60">操作</th>
				</tr>
			</thead>
			<tbody>
			<form id="tform">
			<?php 
			if(!empty($data)){
			foreach ($data as $key => $value) {?>
				<tr class="text-c">
					<td><input type="checkbox" value="<?php echo $value['id'];?>" name="ck_id[]"></td>
					<td><?php echo $value['id'];?></td>
					<td><?php echo $value['user'];?></td>
					<td><?php echo $value['collect_id'];?></td>
					<td class="f-14"><a title="删除" href="?id=<?php echo $value['id'];?>" onclick="if(!confirm('确实要删除吗')){return false;}" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				<?php }}?>
			</form>
			</tbody>
		</table>
	</div>
</div>

<ul class="pager pull-right">
	  <?php if($anim->getTotalCollect()>8){echo $fenye->show();}?>
</ul>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/1.9.3/layer.js"></script>  
<script type="text/javascript">
function datadel(){
	var xhr = new XMLHttpRequest();
	var fm  = document.getElementById('tform');
	var fd  = new FormData(fm);
	fd.append('way','collect');
	xhr.open('POST','del.php',true);
	xhr.onreadystatechange = function (){
		if(this.readyState == 4){
			document.getElementById('debug').innerHTML = this.responseText;
			window.location.href='member-record-browse.php';
		}
	}
	xhr.send(fd);

}
</script>
</body>
</html>
