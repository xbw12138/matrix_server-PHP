<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery二维码生成器</title>
<meta name="description" content="jquery qrcode插件制作二维码生成器可随意生成多张二维码图片的二维码生成器。拿手机扫一扫就能获取二维码内容数据。" />
</head>
<body>

<script type="text/javascript" src="asset/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="asset/js/jquery.qrcode.js"></script> 
<script type="text/javascript" src="asset/js/qrcode.js"></script> 
<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;text-decoration:none;}
a:hover{text-decoration:underline;}
body{font:12px/180% Arial, Helvetica, sans-serif , "新宋体";}

.demo{width:200px;margin:40px auto;}
.demo h2{font-size:18px;height:50px;text-align:center;}
.demo input{width:198px;outline:medium;border:1px solid #336699;}
.demo a{width:200px;height:24px;line-height:24px;text-align:center;letter-spacing:4px;background:#336699;color:#fff;font-weight:bold;display:block;margin:5px 0;}
</style>

<div class="demo">
    <input type="hidden" id="url" value="<?php echo $_GET['url']; ?>"/>
	<center>
	<div id="qrcodeTable"></div> 
	</center>
</div>

<script type="text/javascript">

$(document).ready(function(){
var url=$("#url").val();
	$("#qrcodeTable").qrcode({
		render	: "table",
		text	: url,
		width:"400",
		height:"400"
	});	
	
});
</script>
<div style="text-align:center;">
</div>
</body>
</html>