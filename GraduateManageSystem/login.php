<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>研究生招生信息网后台管理</title>
<link rel="stylesheet" type="text/css" href="index.css" />
</head>
<body>
<div class="banner">
<img alt="研究生招生信息网" height="108" src="images/banner.jpg" width="900"/>
</div>
<div class="left"></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="major1">
<form name="login" method="post" action="">
<table>
<tr>
<td>
姓名
</td>
<td>
<input name="user" type="text">
</td>
</tr>
<tr>
<td>
密码
</td>
<td>
<input name="pwd" type="password">
</td>
</tr>
</table>
<input type="Submit" name="Submit" value="登录">
<input type="Reset" name="Reset" value="重置">
</form>
<?php
session_start();
session_set_Cookie_params(3600);
$conn=mysql_connect("localhost","root") or die("失败".mysql_error());
$select=mysql_select_db("demo1",$conn);
$name=null;
$pwd=null;
if($select){
//echo '<script>alert("成功")</script>';
mysql_query("set names utf8");
if(isset($_POST['user'])&&isset($_POST['pwd'])){
$name=$_POST['user'];
$pwd=$_POST['pwd'];
}
if(isset($_POST['Submit']) and $_POST['Submit']=="登录"){
//echo '<script>alert("成功")</script>';
if(($name!=null)&&($pwd!=null)){
$arr=mysql_query("select * from manage_user",$conn);
$flag=0;
while($result=mysql_fetch_array($arr)){
if(($name==$result[0])&&($pwd==$result[1]))
{
$_SESSION["test"]="notnull";
echo '<script>alert("登录成功");window.location.href="index.php";</script>';
}else{
$flag=$flag+1;
}
if($flag==mysql_num_rows($arr))
{
echo '<script>alert("登录失败"+'.$flag.');</script>';
} 
}
}else{
echo '<script>alert("用户名或密码不能为空")</script>';
}
}
}
?>
</div>
</body>
</html>