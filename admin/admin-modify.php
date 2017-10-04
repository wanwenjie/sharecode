<?php include('_header.html');?>

<title>修改密码</title>
</head>
<body>
<div class="container">
  <div class="list-group" style="width:30%;margin:80px auto;" >
    <form id="tform" role="form">
    
      <div class="form-group">
        <input type="text" name="oldpwd" id="oldpwd" placeholder='原始密码'  autocomplete="off" required class="form-control name" />
      </div>

      <div class="form-group passwordClear">
        <input type="password" name="pwd" id="pwd" autocomplete="off"  minlength=6 placeholder="输入新密码" required class="form-control password"/>
      </div>

      <div class="form-group">
        <span style="color:#cc0000;" hidden="true" id="cpwdcheck">*两次输入密码不对</span>
        <input type="password" placeholder="再一次输入新密码" id="cpwd" autocomplete="off" minlength=6 class="form-control password" onChange="check()"/>
      </div>

      <div class="form-group">
        <span id="msg" style="color:#cc0000;"></span>
      </div>

      <div class="form-group">
        <input type="button" class="btn btn-primary anim-blue-all" onclick="modify();" value="确定修改"></div>

    </form>
  </div>
</div>
</body>
<script>
  function check(){
    var pwd = document.getElementById("pwd");
    var cpwd = document.getElementById('cpwd');
    var span = document.getElementById('cpwdcheck');
    if(cpwd.value != pwd.value){
      span.hidden = false;
    }else span.hidden = true;

  }

  function modify(){
    var fm = document.getElementById('tform');
    var fd = new FormData(fm);
    var xhr = new XMLHttpRequest();
    xhr.open('POST','modify.php',true);
    xhr.onreadystatechange = function (){
      if(this.readyState == 4){
        document.getElementById('msg').innerHTML = this.responseText;
        //window.location.reload();
      }
    }
    xhr.send(fd);
  }

</script>

<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="lib/Validform/5.3.2/Validform.min.js"></script> 
<script type="text/javascript" src="lib/layer/1.9.3/layer.js"></script> 
<script type="text/javascript" src="js/H-ui.js"></script> 
<script type="text/javascript" src="js/H-ui.admin.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").Validform({
		tiptype:2,
		callback:function(form){
			form[0].submit();
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script>
</body>
</html>