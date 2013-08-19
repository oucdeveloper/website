<?php
session_start();
echo $_SESSION["test"];
	//echo 'alert("aaa")';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>研究生招生信息网后台管理</title>
<link rel="stylesheet" type="text/css" href="../index.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<script language="javascript" type="text/javascript" src="js/index.js"></script>
<script type="text/javascript">
function aa(){
<?php
//echo $_SESSION["test"]; 
unset($_SESSION["test"]); 
?>
window.location.href="../login.php";
}
</script>
</head>
<body>
<div class="banner">
<img alt="研究生招生信息网" height="108" src="../images/banner.jpg" width="900"/>
</div>
<div class="menu_navcc">
<div class="menu_nav clearfix">
<ul class="nav_content">
<li><a href="../index.php" title="首页"><span>首页</span></a></li>
<li><a href="../doctor/doctor.php" title="博士招生"><span>博士招生</span></a></li>
<li><a href="../academic/academic.php" title="学术型硕士"><span>学术型硕士</span></a></li>
<li class="current"><a href="professional.php" title="专业型硕士"><span>专业型硕士</span></a></li>
<li><a href="../engineering/engineering.php" title="工程硕士"><span>工程硕士</span></a></li>
<li><a href="../teacher/teacher.php" title="导师添加"><span>导师添加</span></a></li>
<li><a href="../directionedit/directionedit.php" title="学科方向"><span>学科方向</span></a></li>
</ul>
<div class="menu_nav_right">
</div>
</div>
</div>
<div class="left"></div>
<div class="guid">
	<ul>
	  <li>当前位置：</li>
	  <li><a href="../index.php">首页</a></li>
      <li>&gt;</li>
	  <li><a href="professional.php">专业型硕士招生</a></li>
 </ul>
</div>
<div class="menu1">
<div class="add">
<p>增加专业型研究生招生数据:</p>  
<form name="addf" method="post" action="">
<table>
<tr>
<td>
一级学科名：
</td>
<td>
<input name="first" type="text">
</td>
<?php
$conn=mysql_connect("localhost","root") or die("失败".mysql_error());
$select=mysql_select_db("demo1",$conn);
$fname=null;
if($select)
{
//echo '<script>alert("成功")</script>';
mysql_query("set names utf8");
if(isset($_POST['first']))
{
$fname=$_POST['first'];
}
if(isset($_POST['Addf']) and $_POST['Addf']=="添加")
{
if($fname!=null){
$sql="insert into manage_degree_first(degree,dfname) values('"."专业型硕士"."','".$fname."')";
$insert=mysql_query($sql,$conn);
if($insert){
echo "<script>alert('成功添加');window.location.href='professional.php';</script>";
}else{
echo "<script>alert('添加失败')</script>";
}
}else{
echo "<script>alert('不能为空')</script>";
}
}
}
?>
<td><input type="Submit" name="Addf" value="添加"><input type="Reset" name="Reset" value="重置"></form><form name="adds" method="post" action=""></td>
</tr>
<tr height="20"></tr>
<tr>
<td>
选择一级学科名：
</td>
<td>
<select id="select1" name="firstselect">
<?php
if($select)
{
//echo '<script>alert("成功")</script>';
mysql_query("set names utf8");
$arr=mysql_query("select dfname from manage_degree_first where degree='专业型硕士'",$conn);
while($result=mysql_fetch_array($arr)){
echo "<option value='".$result[0]."'>".$result[0]."</option>";
}
}
?>
</select>
<?php
if($select)
{
$sname=null;
//echo '<script>alert("成功")</script>';
mysql_query("set names utf8");
if(isset($_POST['second']))
{
$sname=$_POST['second'];
}
if(isset($_POST['Adds']) and $_POST['Adds']=="添加")
{
if($sname!=null)
{
mysql_query("set names utf8");
$arr=mysql_query("select id from manage_degree_first where dfname='".$_POST['firstselect']."'",$conn);
//echo mysql_num_rows($arr);
$result=mysql_fetch_array($arr);
//echo $result['id'];
$sql=("insert into manage_degree_second(dfid,dsname) values('".$result['id']."','".$sname."')");
$insert=mysql_query($sql,$conn);
if($insert){
echo "<script>alert('成功添加');window.location.href='professional.php';</script>";
}else{
echo "<script>alert('添加失败')</script>";
}
}else{
echo '<script>alert("不能为空")</script>';
}
}
}
?>
</td>
<td>填写2级学科名：</td>
<td><input name="second" type="text" /></td>

<td><input type="Submit" name="Adds" value="添加"><input type="Reset" name="Reset" value="重置"></td>
</tr>
</table>

</form>  
</div>
<div class="delete">
<p>&nbsp;</p>
<p>删除专业型硕士招生数据:</p>
<form name="delete" method="post" action="">
<table>
<tr>
<td>
选择一级学科名：
</td>
<td>

<select name="deletefirst" id="Deletefirst">
<?php
if($select)
{
//echo '<script>alert("成功")</script>';
mysql_query("set names utf8");
$arr=mysql_query("select dfname from manage_degree_first where degree='专业型硕士'",$conn);
while($result=mysql_fetch_array($arr)){
if($result[0]==$_POST["deletefirst"])
{
	echo "<option value='".$result[0]."' selected>".$result[0]."</option>";
}
else {
	echo "<option value='".$result[0]."'>".$result[0]."</option>";
}
}
}
?>
</select>
</td>
<td>
选择二级学科名：
</td>
<td>
<script type="text/javascript">
document.getElementById("Deletefirst").onchange=function(){
	document.forms[2].submit();
	}
</script>
<?php
if($select)
{
//echo '<script>alert("成功")</script>';
mysql_query("set names utf8");
$arr=mysql_query("SELECT dsname
FROM manage_degree_second
JOIN manage_degree_first ON manage_degree_second.dfid = manage_degree_first.id
WHERE manage_degree_first.dfname='".$_POST['deletefirst']."'",$conn);
echo '<select name="deletesecond">';
while($result=mysql_fetch_array($arr))
{
echo "<option>".$result[0]."</option>";
}
echo "</select>";
if(isset($_POST['Delete']) and $_POST['Delete']=="删除"){
if($_POST['deletesecond']!=null){
//echo '<script>alert("aa");</script>';
$sql="delete from manage_degree_second where dsname='".$_POST['deletesecond']."'";
$delete=mysql_query($sql,$conn);
}else{
$sql="delete from manage_degree_first where dfname='".$_POST['deletefirst']."'";
$delete=mysql_query($sql,$conn);
}
}
if($delete){
echo "<script>alert('成功删除');window.location.href='professional.php';</script>";
}
}
?>
</td>
<td><input type="Submit" name="Delete" value="删除"><input type="Reset" name="Reset" value="重置"></form>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>