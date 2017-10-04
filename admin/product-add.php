<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->

<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>新增在线代码示例</title>
</head>
<body>
<div class="container">
    <div class="list-group">
        <form id="tform" class="auth-form email-form form-horizontal">
          <div class="form-group">
            <label for="name">标题</label>
            <input type="text" class="form-control" name="title" id="name" placeholder="请输入标题"></div>
          <div class="form-group">
            <label for="name">插件介绍</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control picture"></textarea>
          </div>
          <div class="form-group">
            <label for="inputfile">源代码上传（zip格式，文件最大不超过15mb）</label><br>
            <a type="button" class="btn btn-success">
              上传文件
              <input type="file" id="inputfile" name="file" style="position:absolute;left:100px;bottom:150px;font-size:25px; opacity:0;">
            </a>
          </div>
          <div class="form-group" id="progress" style="display:none;">
            <div class="progress progress-striped active">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%;" id="bar">
                <span class="sr-only">100% 完成</span>
              </div>
            </div>
          </div>
          <div id="debug" style="color:#cc0000;"></div>
          <div class="form-group">
            <input type="button" onclick="send()" class="btn btn-primary" value="提交">
          </div>
        </form>
    </div>
</div>
</body>
  <script>
    function send(){
      var fm = document.getElementById('tform');
      var fd = new FormData(fm);
      var file = document.getElementById('inputfile').files;
      fd.append('pic',file);
      var xhr = new XMLHttpRequest();
      xhr.open('POST','./upFile.php',true);
      xhr.upload.onprogress = function(ev){
        if(ev.lengthComputable){
          document.getElementById('progress').style.display="block";
          var pg = 100*ev.loaded/ev.total;
          document.getElementById('bar').style.width = pg +'%';
        }
      }
      xhr.onreadystatechange = function (){
        if(this.readyState == 4){
          document.getElementById('debug').innerHTML = this.responseText;
          //window.location.reload();
        }
      }
      xhr.send(fd);
    }
    </script>
</html>
