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

$fenye = new FenyeModel($info->getNum(),$perpage,$page);
$data = $info->getAll($offset,$perpage);
$id = isset($_GET['id'])?$_GET['id']:'';
if (!empty($id)) {
	if($info->delUserById($id)){
		echo "<script>window.location.href='member-list.php';</script>";
	}
}
?>

<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div id="debug"></div>
<div class="pd-20">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong><?php echo $info->getNum();?></strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="150">邮箱</th>
				<th width="100">密码</th>
				<th width="130">关注人数</th>
				<th width="70">状态</th>
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
				<td><?php echo $value['user'];?></u></td>
				<td><?php echo $value['email'];?></td>
				<td><?php echo $value['pwd'];?></td>
				<td><?php echo $value['follows'];?></td>
				<td class="td-status"><span class="label label-success radius"><?php if($value['flag']==1){;?>已登录<?php }else {?>未登录<?php }?></span></td>
				<td class="td-manage"><a title="删除" href="?id=<?php echo $value['id'];?>" onclick="if(!confirm('确实要删除吗')){return false;}" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			<?php }}?>
		</form>
		</tbody>
	</table>
	</div>
</div>
<ul class="pager pull-right">
	<?php if($info->getNum()>8){echo $fenye->show();}?>
</ul>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script> 
<script type="text/javascript">


function datadel(){
	var xhr = new XMLHttpRequest();
	var fm  = document.getElementById('tform');
	var fd  = new FormData(fm);
	fd.append('way','user');
	xhr.open('POST','del.php',true);
	xhr.onreadystatechange = function (){
		if(this.readyState == 4){
			document.getElementById('debug').innerHTML = this.responseText;
			window.location.href='member-list.php';
		}
	}
	xhr.send(fd);

}

$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
	$('.table-sort tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
</script> 
</body>
</html>