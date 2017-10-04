<?php include('_header.html');?>
<?php 
define('ACC',true);
require('../include/init.php');
$anim = new AnimaModel();

//引用分页
require('../tools/FenyeTool.class.php');
//初始化分页，每页显示6条，当前页数为1
$perpage = 6;
$page    = isset($_GET['page'])?$_GET['page']:1;
$offset  = ($page-1)*$perpage;

$fenye = new FenyeModel($anim->getNumByDemo(),$perpage,$page);
$data = $anim->getDemoAll($offset,$perpage);
//删除功能
$id = isset($_GET['id'])?$_GET['id']:'';
if (!empty($id)) {
	if($anim->delDemoById($id)){
		echo "<script>window.location.href='product-list.php';</script>";
	}
}
?>
<title>在线代码管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 在线代码管理 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div id="debug"></div>
<div class="pd-20">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick="product_add('添加产品','product-add.php')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加产品</a></span> <span class="r">共有数据：<strong><?php echo $anim->getNumByDemo();?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th>ID</th>
					<th>插件URL</th>
					<th>插件下载地址</th>
					<th>名称</th>
					<th>上传日期</th>
					<th>插件大小(KB)</th>
					<th>简介</th>
					<th>浏览量</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<form id="tform">
			<?php if(count($data)!=0){
				foreach ($data as $key => $value) {
				?>
				<tr class="text-c">
					<td><input type="checkbox" value="<?php echo $value['id'];?>" name="ck_id[]"></td>
					<td><?php echo $value['id'];?></td>
					<td><?php echo $value['url'];?></td>
					<td><?php echo $value['file_path'];?></td>
					<td class="text-l"><?php echo $value['title'];?></td>
					<td class="text-l"><?php echo $value['date'];?></td>
					<td class="text-l"><?php echo round($value['size']/1024,2);?></td>
					<td class="text-l"><?php echo $value['content'];?></td>
					<td class="text-l"><?php echo $value['skim'];?></td>
					<td class="f-14 product-brand-manage"><a style="text-decoration:none" class="ml-5" onClick="if(!confirm('确实要删除吗')){return false;}" href="?id=<?php echo $value['id'];?>" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				<?php }}?>
				</form>
			</tbody>
		</table>
	</div>
</div>
<ul class="pager pull-right">
	<?php if($anim->getNumByDemo()>6){echo $fenye->show();}?>
</ul>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/1.9.3/layer.js"></script><script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript">

function datadel(){
	var xhr = new XMLHttpRequest();
	var fm  = document.getElementById('tform');
	var fd  = new FormData(fm);
	fd.append('way','demo');
	xhr.open('POST','del.php',true);
	xhr.onreadystatechange = function (){
		if(this.readyState == 4){
			document.getElementById('debug').innerHTML = this.responseText;
			window.location.href='product-list.php';
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