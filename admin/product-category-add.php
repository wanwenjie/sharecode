<?php include('_header.html');?>

<title>添加分类</title>
</head>
<body>
<div class="container">
  <div class="list-group" style="width:30%;margin:80px auto;" >
    <form id="tform" role="form">
    
      <div class="form-group">
        <input type="text" name="cat_id" placeholder='分类ID'  autocomplete="off" required class="form-control name" />
      </div>

      <div class="form-group">
        <input type="text" name="cat_name" autocomplete="off" placeholder="分类名称" required class="form-control "/>
      </div>

      <div class="form-group">
        <span id="msg" style="color:#cc0000;"></span>
      </div>
      <div class="form-group">
        <input type="button" class="btn btn-primary anim-blue-all" onclick="add();" value="添加"></div>
    </form>
  </div>
</div>
</body>
<script>
	function add(){
		var fm = document.getElementById('tform');
	    var fd = new FormData(fm);
	    var xhr = new XMLHttpRequest();
	    xhr.open('POST','cat.php',true);
	    xhr.onreadystatechange = function (){
	      if(this.readyState == 4){
	        document.getElementById('msg').innerHTML = this.responseText;
	        //window.location.reload();
	      }
	    }
	    xhr.send(fd);
	}
</script>
</html>