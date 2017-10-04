<?php include('_header.html');?>
<?php 
define("ACC",true);
require('../include/init.php');
$info = new UserModel();
$data = array();
//引用分页
require('../tools/FenyeTool.class.php');
//初始化分页，每页显示6条，当前页数为1
$perpage = 6;
$page    = isset($_GET['page'])?$_GET['page']:1;
$offset  = ($page-1)*$perpage;

$fenye = new FenyeModel($info->getTotalAdmin(),$perpage,$page);
$data = $info->getAllAdmin($offset,$perpage);
$id = isset($_GET['id'])?$_GET['id']:'';
if (!empty($id)) {
	if($info->delAdminById($id)){
		echo "<script>window.location.href='admin-list.php';</script>";
	}
}



?>
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div id="debug"></div>
<div class="pd-20">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="admin_add('添加管理员','admin-add.php','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong><?php echo $info->getTotalAdmin();?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="90">密码</th>
				<th width="150">邮箱</th>
				<th width="100">是否登录</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<form id="tform">
		<?php if(count($data)!=0){
		foreach ($data as $key => $value) {?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo $value['id'];?>" name="ck_id[]"></td>
				<td><?php echo $value['id'];?></td>
				<td><?php echo $value['user'];?></td>
				<td><?php echo md5($value['pwd']);?></td>
				<td><?php echo $value['email'];?></td>
				<td class="td-status"><span class="label label-success radius"><?php if($value['flag']==1){;?>已登录<?php }else {?>未登录<?php }?></span></td>
				<td class="td-manage"> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','admin-modify.php','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="?id=<?php echo $value['id'];?>" onclick="if(!confirm('确实要删除吗')){return false;}" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			<?php }}?>
		</form>
		</tbody>
	</table>
</div>
<ul class="pager pull-right">
	<?php if($info->getTotalAdmin()>8){echo $fenye->show();}?>
</ul>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>  
<script type="text/javascript" src="lib/layer/1.9.3/layer.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script> 
<script type="text/javascript">

function datadel(){
	var xhr = new XMLHttpRequest();
	var fm  = document.getElementById('tform');
	var fd  = new FormData(fm);
	fd.append('way','admin');
	xhr.open('POST','del.php',true);
	xhr.onreadystatechange = function (){
		if(this.readyState == 4){
			document.getElementById('debug').innerHTML = this.responseText;
			window.location.href='admin-list.php';
		}
	}
	xhr.send(fd);

}

/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

</script>
</body>
</html>