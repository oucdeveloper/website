<?php
session_start();
if(!isset($_SESSION["test"]))
{
echo '<script>alert("您还未登陆,请登录！");window.location.href="login.php";</script>';
}
echo $_SESSION["test"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>研究生招生信息网后台管理</title>
<link rel="stylesheet" type="text/css" href="index.css" />
<script type="text/javascript">
	function aa(){
    <?php
	//echo $_SESSION["test"]; 
	unset($_SESSION["test"]); 
	?>
	window.location.href="login.php";
		}
</script>
</head>
<body>
<div class="banner">
<img alt="研究生招生信息网" height="108" src="images/banner.jpg" width="900"/>
</div>
<div class="menu_navcc">
<div class="menu_nav clearfix">
<ul class="nav_content">
<li class="current"><a href="index.html" title="首页"><span>首页</span></a></li>
<li><a href="doctor/doctor.php" title="博士招生"><span>博士招生</span></a></li>
<li><a href="academic/academic.php" title="学术型硕士"><span>学术型硕士</span></a></li>
<li><a href="professional/professional.php" title="专业型硕士"><span>专业型硕士</span></a></li>
<li><a href="engineering/engineering.php" title="工程硕士"><span>工程硕士</span></a></li>
<li><a href="teacher/index.html" title="导师浏览"><span>导师浏览</span></a></li>
<li><a onclick="aa();">注销</a></li>
</ul>
<div class="menu_nav_right">
</div>
</div>
</div>
<div class="left"></div>
<div class="guid">
	<ul>
	  <li>当前位置：</li>
	  <li><a href="index.html">首页</a></li>
 </ul>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="major">
	<a href="doctor/doctor.php"><img alt="博士" height="110" src="images/boshi.png" width="220" /></a>
	<a href="academic/academic.php"><img alt="学术性硕士" height="110" src="images/xueshuxingshuoshi.png" width="220" /></a>
</div>
<p>&nbsp;</p>
<div class="major">
	<a href="professional/professional.php"><img alt="专业型硕士" height="110" src="images/zhuanyexingshuoshi.png" width="220" /> </a>
	<a href="engineering/engineering.php"><img alt="工程硕士" height="110" src="images/gongchengshuoshi.png" width="220" /></a>
</div>

</body>
</html>