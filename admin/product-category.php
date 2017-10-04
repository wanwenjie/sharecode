<?php include('_header.html');?>
<?php 
define("ACC",true);
require('../include/init.php');
$anim = new AnimaModel();
$data = array();
//引用分页
require('../tools/FenyeTool.class.php');
//初始化分页，每页显示6条，当前页数为1
$perpage = 6;
$page    = isset($_GET['page'])?$_GET['page']:1;
$offset  = ($page-1)*$perpage;

$fenye = new FenyeModel($anim->getTotalCat(),$perpage,$page);
$data = $anim->getAllCat($offset,$perpage);
//删除功能
$id = isset($_GET['id'])?$_GET['id']:'';
if (!empty($id)) {
	if($anim->delCatById($id)){
		echo "<script>window.location.href='product-category.php';</script>";
	}
}
?>
<title>分类管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 分类管理 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div id="debug"></div>
<div class="pd-20 text-c">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="system_category_add('添加分类','product-category-add.php')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a></span> <span class="r">共有数据：<strong><?php echo $anim->getTotalCat();?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">分类ID</th>
					<th>分类名称</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			<form id="tform">
			<?php foreach ($data as $key => $value) {?>
				<tr class="text-c">
					<td><input type="checkbox" value="<?php echo $value['id'];?>" name="ck_id[]"></td>
					<td><?php echo $value['cat_id'];?></td>
					<td class="text-l"><?php echo $value['cat_name'];?></td>
					<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('分类编辑','product-category-edit.php','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="?id=<?php echo $value['cat_id'];?>" onclick="if(!confirm('确实要删除吗')){return false;}" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				<?php }?>
			</form>
			</tbody>
		</table>
	</div>
</div>
<ul class="pager pull-right">
	<?php if($anim->getTotalCat()>8){echo $fenye->show();}?>
</ul>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/1.9.3/layer.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script> 
<script type="text/javascript">
function datadel(){
	var xhr = new XMLHttpRequest();
	var fm  = document.getElementById('tform');
	var fd  = new FormData(fm);
	fd.append('way','cat');
	xhr.open('POST','del.php',true);
	xhr.onreadystatechange = function (){
		if(this.readyState == 4){
			document.getElementById('debug').innerHTML = this.responseText;
		}
	}
	xhr.send(fd);

}
/*系统-分类-添加*/
function system_category_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*系统-分类-编辑*/
function system_category_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*系统-分类-删除*/
function system_category_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
</script>
</body>
</html>