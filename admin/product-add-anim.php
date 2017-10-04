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
  <script type="text/javascript" src="js/jquery.js"></script>
  <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
  <!--[if IE 6]>
  <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
  <script>DD_belatedPNG.fix('*');</script>
  <![endif]-->
  <title>插件上传</title>
</head>
<body>
  <div class="container">
    <div class="list-group">
      <form id="tform" class="auth-form email-form form-horizontal">
        <div class="form-group">
          <label for="name">标题</label>
          <input type="text" class="form-control" name="title" id="name" placeholder="请输入标题"></div>
        <div class="form-group">
          <div class="row clearfix">
          <div class="col-md-6 column">
            <label for="inputfile">封面图片</label>
            <br>
            <a type="button" class="btn btn-info" onchange="pic()">
              上传图片
              <input type="file" id="inputpic" name="pic" style="position:absolute;left:0px;top:25px;font-size:25px;color:#cc0000;opacity:0;"></a>
            <div id="preview" style="width:50%;height:auto;border:1px dotted #4285F4;border-radius:5px;display:none;"></div>
          </div>
          <div class="col-md-6 column">
            <label for="inputfile">源代码上传（zip格式，文件最大不超过15mb）</label>
            <br>
            <a type="button" class="btn btn-info" onchange="file()">
              上传文件
              <input type="file" id="inputfile" name="file" style="position:absolute;left:0px;top:25px;font-size:25px;color:#cc0000;opacity:0;"></a>
            <div id="fileview" style="width:auto;height:auto;border:1px dotted #4285F4;border-radius:5px;display:none;padding-top:5px;"></div>
          </div>
          </div>
        </div>

        <div class="form-group">
          <label for="name">选择列表</label>
          <select name="cat_id" class="form-control">
            <option value="1">UI</option>
            <option value="2">导航</option>
            <option value="3">媒体</option>
            <option value="4">输入</option>
            <option value="5">其他</option>
          </select>
        </div>
        <div class="form-group">
          <label for="name">插件介绍</label>
          <textarea name="content" id="content" cols="30" rows="10" class="form-control picture"></textarea>
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
          <input type="button" onclick="send()" class="btn btn-primary" value="提交"></div>
      </form>
    </div>
  </div>
</body>
  <script>
    function pic(){
      var pic  = document.getElementById('inputpic').files;
       //检测文件是不是图片 
      if(pic[0].type.indexOf('image') === -1){ 
          alert("您拖的不是图片！"); 
          return false; 
      } 
       //拖拉图片到浏览器，可以实现预览功能 
      var img = window.URL.createObjectURL(pic[0]); 
      var filename = pic[0].name; //图片名称 
      var filesize = Math.floor((pic[0].size)/1024);  
      if(filesize>500){ 
          alert("上传大小不能超过500K."); 
          return false; 
      } 
      var str = "<img src='"+img+"' class='img-rounded' style='width:100%;'><p style='color:#FBBC05;'>图片名称："+filename+"</p><p style='color:#FBBC05;'>大小："+filesize+"KB</p>"; 
      $("#preview").show();
      $("#preview").html(str); 


    }

    function file(){
      var file  = document.getElementById('inputfile').files;
      var filename = file[0].name; //图片名称 
      var filesize = Math.floor((file[0].size)/1024);  
      if(filesize>50000){ 
          alert("上传大小不能超过50000K."); 
          return false; 
      } 
      var str = "<p style='color:#FBBC05;'>名称："+filename+"</p><p style='color:#FBBC05;'>大小："+filesize+"KB</p>"; 
      $("#fileview").show();
      $("#fileview").html(str); 

    }
     function send(){
      var fm = document.getElementById('tform');
      var fd = new FormData(fm);
      var file = document.getElementById('inputfile').files;
      var pic  = document.getElementById('inputpic').files;
      fd.append('pic',pic);
      fd.append('file',file);
      var xhr = new XMLHttpRequest();
      xhr.open('POST','../upFile.php',true);
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