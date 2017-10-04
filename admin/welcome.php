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
<link href="css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="css/H-ui.admin.css" rel="stylesheet" type="text/css" />

<link href="lib/Hui-iconfont/1.0.1/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="pd-20" style="padding-top:20px;">
  <p class="f-20 text-success">欢迎使用H-ui.admin <span class="f-14">v2.3</span>后台管理系统！</p>
  <p>登录IP：<?php echo $_SERVER['REMOTE_ADDR'];?>  登录时间：<?php echo date('y-m-d h:m:s',$_SERVER['REQUEST_TIME']);?></p>
  <table class="table table-border table-bordered table-bg mt-20">
    <thead>
      <tr>
        <th colspan="2" scope="col">服务器信息</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th width="200">服务器操作系统</th>
        <td><span id="lbServerName"><?php echo PHP_OS; ?></span></td>
      </tr>
      <tr>
        <td>服务器IP地址</td>
        <td><?php echo $_SERVER['SERVER_ADDR'];?></td>
      </tr>
      <tr>
        <td>服务器域名</td>
        <td><?php echo $_SERVER['SERVER_NAME'];?></td>
      </tr>
      <tr>
        <td>服务器端口 </td>
        <td><?php echo $_SERVER['SERVER_PORT'];?></td>
      </tr>
      <tr>
        <td>服务器版本 </td>
        <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
      </tr>
       <tr>
        <td>PHP版本 </td>
        <td><?PHP echo PHP_VERSION; ?></td>
      </tr>
       <tr>
        <td>GD图形处理扩展库版本</td>
        <td><?PHP $data = array(); $data = gd_info();echo $data['GD Version']; ?></td>
      </tr>
    </tbody>
  </table>
</div>
<footer class="footer">
  <p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>Copyright &copy;2015 H-ui.admin v2.3 All Rights Reserved.<br>
    本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
</footer>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>