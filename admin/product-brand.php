<?php include('_header.html');?>
<title>插件管理</title>
<?php 
define("ACC",true);
require("../include/init.php");
$anim = new AnimaModel();
$data = array();
//引用分页
require('../tools/FenyeTool.class.php');
//初始化分页，每页显示6条，当前页数为1
$perpage = 8;
$page    = isset($_GET['page'])?$_GET['page']:1;
$offset  = ($page-1)*$perpage;

$fenye = new FenyeModel($anim->total(),$perpage,$page);
$data = $anim->getAll($offset,$perpage);
//删除功能和审核功能
$id = isset($_GET['id'])?$_GET['id']:'';
$way = isset($_GET['way'])?$_GET['way']:'';
if (!empty($id) && !empty($way)) {
	if($way == 'del'){
		if($anim->delAnimById($id)){
			echo "<script>window.location.href='product-brand.php';</script>";
		}
	}
	if($way == 'check'){
		$arr['_check'] = 1;
		$anim->update($arr,$id);
		echo "<script>window.location.href='product-brand.php';</script>";
	}
}
?>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont"></i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 插件管理 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont"></i></a></nav>
<div class="pd-20">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
		<a onclick="check()" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> 批量审核</a>
		<a onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a> 
		<a class="btn btn-primary radius" onclick="product_add('添加产品','product-add-anim.php')" href="javascript:;"><i class="Hui-iconfont"></i> 添加产品</a>
	</span> 
	<span class="r">共有数据：<strong><?php echo $anim->total();?></strong> 条</span> </div>
	<div id="debug"></div>
	<div class="mt-20">

		<table class="table table-border table-bordered table-bg table-hover">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="30">ID</th>
					<th width="50">插件URL</th>
					<th width="50">插件下载地址</th>
					<th width="50">名称</th>
					<th width="50">所属分类</th>
					<th width="50">上传日期</th>
					<th width="50">插件大小(kB)</th>
					<th width="50">作者</th>
					<th width="50">简介</th>
					<th width="50">浏览量</th>
					<th width="50">收藏数</th>
					<th width="50">图片地址</th>
					<th width="50">审核</th>
					<th width="50">操作</th>
				</tr>
			</thead>
			<tbody>
			<form id="tform">
				<?php if(!empty($data)){
				foreach ($data as $key => $value) {?>
				<tr class="text-c">
					<td><input type="checkbox" value="<?php echo $value['id'];?>" name="ck_id[]"></td>
					<td class="text-l"><?php echo $value['id'];?></td>
					<td class="text-l"><?php echo $value['url'];?></td>
					<td class="text-l"><?php echo $value['file_path'];?></td>
					<td class="text-l"><?php echo $value['title'];?></td>
					<td class="text-l"><?php echo $value['cat_id'];?></td>
					<td class="text-l"><?php echo $value['date'];?></td>
					<td class="text-l"><?php echo round($value['size']/1024,2);?></td>
					<td class="text-l"><?php echo $value['user'];?></td>
					<td class="text-l"><?php echo $value['content'];?></td>
					<td class="text-l"><?php echo $value['skim'];?></td>
					<td class="text-l"><?php echo $value['collect'];?></td>
					<td class="text-l"><?php echo $value['pic'];?></td>
					<td class="text-l"><?php if($value['_check']==1){?><span class="glyphicon glyphicon-check"></span><?php }else{?><span class="glyphicon glyphicon-unchecked"></span><?php }?></td>
					<td class="f-14 product-brand-manage"><a style="text-decoration:none" class="ml-5" onClick="if(!confirm('确实要删除吗')){return false;}" href="?id=<?php echo $value['id'];?>&way=del" title="删除"><i class="glyphicon glyphicon-trash"></i></a>
					<a style="text-decoration:none" class="ml-5" onClick="if(!confirm('审核要通过吗')){return false;}" href="?id=<?php echo $value['id'];?>&way=check" title="审核"><span class="glyphicon glyphicon-check"></span></a>
					</td>
				</tr>
					<?php }}?>
					</form>
			</tbody>
		</table>
	</div>
</div>
<ul class="pager pull-right">
	<?php if($anim->total()>6){echo $fenye->show();}?>
</ul>	
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/1.9.3/layer.js"></script><script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript">
function check(){
	var xhr = new XMLHttpRequest();
	var fm  = document.getElementById('tform');
	var fd  = new FormData(fm);
	xhr.open('POST','check.php',true);
	xhr.onreadystatechange = function (){
		if(this.readyState == 4){
			document.getElementById('debug').innerHTML = this.responseText;
			window.location.href='product-brand.php';
		}
	}
	xhr.send(fd);
}

function datadel(){
	var xhr = new XMLHttpRequest();
	var fm  = document.getElementById('tform');
	var fd  = new FormData(fm);
	fd.append('way','plug');
	xhr.open('POST','del.php',true);
	xhr.onreadystatechange = function (){
		if(this.readyState == 4){
			document.getElementById('debug').innerHTML = this.responseText;
			window.location.href='product-brand.php';
		}
	}
	xhr.send(fd);

}
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
</script>
</body>
</html>