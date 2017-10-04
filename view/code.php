<!DOCTYPE html>
<html lang="en">
<head>
	<title>在线代码-sharecode</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="css/lib/codemirror.css">
	<?php require('include.html');?>
	<link rel="stylesheet" href="css/app.ac1878ad.css" >

	<script src="js/jquery.min.js"></script>
	<script src="js/lib/codemirror.js"></script>
	<script src="js/lib/javascript.js"></script>
	<script src="js/lib/css.js"></script>
	<script src="js/lib/htmlmixed.js"></script>
</head>
<body class="page-index  en" >
	<!-- 头部开始 -->
	<?php include("header.php");?>
	<?php 
	$id = isset($_GET['id'])?$_GET['id']:'';
	if(!empty($id)){
		$data = $anim->getDemoById($id);
		$contents = file_get_contents($data['url'].'index.html');
		$html = getContents($contents,'<body>','</body>');
		$css  = getContents($contents,'<style type="text/css">','</style>');
		$js   = getContents($contents,'<script>','</script>');
	}  

	$arr = array();
	$arr['skim'] = $data['skim']+1;
	$anim ->updateDemo($arr,$data['id']);

	function getContents($str,$s_str,$e_str){
		$start = strrpos($str,$s_str)+strlen($s_str);
		$end   = strrpos($str,$e_str);
		return $contents = substr($str,$start,$end-$start);
	}
	?>
	<!-- 头部结束 -->
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class="row clearfix">
					<div class="col-md-12 column">
						<ul class="breadcrumb">
							<li>
								<a href="onlinecode.php">在线代码</a>
							</li>
							<li>
								<a href="#">
									<?php echo $data['title'];?></a>
							</li>

						</ul>
						<p>	
						<span class="label label-default label-success" onclick="showHtml();" id="idHtml">html</span>
								<span class="label label-default label-success" onclick="showCss();" id="idCss">css</span>
								<span class="label label-default label-success" onclick="showJs();" id="idJs">js</span>
								<a href="<?php echo $data['file_path'];?>" type="button" class="btn btn-sm btn-info pull-right">点击下载</a>
						</p>
						<div class="row clearfix">
							<div class="col-md-4 column" style="border-right:1px solid #eee;" >
								<div class="row clearfix">

									<div class="col-md-12 column">

										<div class="row clearfix">
											<div class="col-md-12 column" id="html">
												<form role="form">
													<div class="form-group" style="border:1px solid #0AABF4;">
														<textarea class="form-control"  id="htmlEditor">
															<?php echo $html;?></textarea>
														<script>
	//应用codemirror编辑器
	//lineNumber添加行号
	var htmlEditor = CodeMirror.fromTextArea(document.getElementById("htmlEditor"), {
					    lineNumbers: true,
					    matchBrackets: true
				      });
htmlEditor.setSize('auto',145);
	 			
</script>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="col-md-12 column" id="css">
										<div class="row clearfix">
											<div class="col-md-12 column">
												<form role="form">
													<div class="form-group" style="border:1px solid #0AABF4;">
														<textarea class="form-control"  id="cssEditor">
															<?php echo $css;?></textarea>
														<script>
var css  = document.getElementById('cssEditor');
var cssEditor = CodeMirror.fromTextArea(css, {
matchBrackets: true,
lineNumbers: true
});
cssEditor.setSize('auto',145);

</script>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="col-md-12 column" id="js">
										<div class="row clearfix">
											<div class="col-md-12 column">
												<form role="form">
													<div class="form-group" style="border:1px solid #0AABF4;">
														<textarea class="form-control"  id="jsEditor">
															<?php echo $js;?></textarea>
														<script>	
var js   = document.getElementById('jsEditor');
var jsEditor = CodeMirror.fromTextArea(js, {
matchBrackets: true,
lineNumbers: true
});
jsEditor.setSize('auto',145);
</script>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-8 column" >
								<iframe  id="if" src="<?php echo $data['url'].'index.html';?>
									" frameborder="0" width="100%" height="500px">
								</iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 尾部开始 -->
	<?php include("footer.html");?>
	<!-- 尾部结束 -->
</body>

	<script>

	function runCode() {
		var codehtml =htmlEditor.getValue(); 	
        document.getElementById("if").contentWindow.addhtml(codehtml);	
		
		var codecss =cssEditor.getValue(); 	
        document.getElementById("if").contentWindow.addcss(codecss);	
		var codejs ="<script>" +jsEditor.getValue()+ "<\/script>";; 
        document.getElementById("if").contentWindow.addjs(codejs);	
	}
	
	$("textarea").bind("input propertychange", function () {
	    setTimeout(function () {
	        runCode();
	    }, 1500);  
	});
</script>

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
 				htmlEditor.setSize('auto',540);

 			}else{
				//标签变暗	 			
	 			htmlTag.className = "label label-default";	 			
	 			//标签亮的个数减一	 			
	 			count -=1;
	 			//根据个数调整文本域的大小
	 			if(count == 2){
	 				cssEditor.setSize('auto',230);
	 				jsEditor.setSize('auto',230);
	 			}	
	 			if(count==1){
	 				if(flagCss==1){
	 					cssEditor.setSize('auto',480);

	 				}
	 				else if(flagJs==1){
	 					jsEditor.setSize('auto',480);
	 				}
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
 			if (count==2) {
 				if(flagCss==1){
 					    htmlEditor.setSize('auto',230);
	 					cssEditor.setSize('auto',230);

	 				}
	 				else if(flagJs==1){
	 					htmlEditor.setSize('auto',230);
	 					jsEditor.setSize('auto',230);
	 				}
 			};
 			if(count==3){
 				 htmlEditor.setSize('auto',145);
	 			 cssEditor.setSize('auto',145);
	 			 jsEditor.setSize('auto',145);
 			}
 			//显示自己的div
 			htmlDiv.style.display = 'block';
 			flagHtml = 1;
 		}
	}

	function showCss(){
 		if(flagCss == 1){
 			//如果只剩下这一个标签，不灭
 			if (count ==1){
 			
 				cssEditor.setSize('auto',540);
 			}else{
				//标签变暗	 			
	 			cssTag.className = "label label-default";	 			
	 			//标签亮的个数减一	 			
	 			count -=1;
	 			//根据个数调整文本域的大小
	 			if(count == 2){
	 				htmlEditor.setSize('auto',230);
	 				jsEditor.setSize('auto',230);
	 			}	
	 			if(count==1){
	 				if(flagHtml==1){
	 					htmlEditor.setSize('auto',480);

	 				}
	 				else if(flagJs==1){
	 					jsEditor.setSize('auto',480);
	 				}
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
 			if (count==2) {
 				if(flagHtml==1){
 					    htmlEditor.setSize('auto',230);
	 					cssEditor.setSize('auto',230);

	 				}
	 				else if(flagJs==1){
	 					cssEditor.setSize('auto',230);
	 					jsEditor.setSize('auto',230);
	 				}
 			};
 			if(count==3){
 				 htmlEditor.setSize('auto',145);
	 			 cssEditor.setSize('auto',145);
	 			 jsEditor.setSize('auto',145);
 			}
 			//显示自己的div
 			cssDiv.style.display = 'block';
 			flagCss = 1;
 		}
	}

	function showJs(){
 		if(flagJs == 1){
 			//如果只剩下这一个标签，不灭
 			if (count ==1){
 				jsEditor.setSize('auto',540);
 			}else{
				//标签变暗	 			
	 			jsTag.className = "label label-default";	 			
	 			//标签亮的个数减一	 			
	 			count -=1;
	 			//根据个数调整文本域的大小
	 			if(count == 2){
	 				htmlEditor.setSize('auto',230);
	 				cssEditor.setSize('auto',230);
	 			}	
	 			if(count==1){
	 				if(flagHtml==1){
	 					htmlEditor.setSize('auto',480);

	 				}
	 				else if(flagCss==1){
	 					cssEditor.setSize('auto',480);
	 				}
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
 			if (count==2) {
 				if(flagHtml==1){
 					    htmlEditor.setSize('auto',230);
	 					jsEditor.setSize('auto',230);

	 				}
	 				else if(flagCss==1){
	 					cssEditor.setSize('auto',230);
	 					jsEditor.setSize('auto',230);
	 				}
 			};
 			if(count==3){
 				 htmlEditor.setSize('auto',145);
	 			 cssEditor.setSize('auto',145);
	 			 jsEditor.setSize('auto',145);
 			}
 			//显示自己的div
 			jsDiv.style.display = 'block';
 			flagJs = 1;
 		}
	}
	</script>
<script src="js/lib.e132304d.js"></script>
<script src="js/app.72d66d24.js"></script>
</html>