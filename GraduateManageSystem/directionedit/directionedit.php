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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
<li><a href="../professional/professional.php" title="专业型硕士"><span>专业型硕士</span></a></li>
<li><a href="../engineering/engineering.php" title="工程硕士"><span>工程硕士</span></a></li>
<li><a href="../teacher/teacher.php" title="导师添加"><span>导师添加</span></a></li>
<li class="current"><a href="directionedit.php" title="学科方向"><span>学科方向</span></a></li>
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
	  <li><a href="directionedit.php">学科方向</a></li>
 </ul>
</div>
<div class="menu1">
<div class="add">
<p>增加学科简介:</p>  
<form name="addIntro" method="post" action="">
<table>
<tr>
<td>
选择学位：
</td>
<td>
<select name="degree" id="Degree">
<option>请选择：</option>
<?php
$conn=mysql_connect("localhost","root") or die("失败".mysql_error());
$select=mysql_select_db("demo1",$conn);
if($select)
{
//echo '<script>alert("成功")</script>';
mysql_query("set names utf8");
$arr=mysql_query("select degree from manage_degree",$conn);
while($result=mysql_fetch_array($arr)){
if($result[0]==$_POST["degree"])
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
选择一级学科名：
</td>
<td>
<script type="text/javascript">
document.getElementById("Degree").onchange=function(){
	document.forms[0].submit();
	}
</script>
<?php
if($select)
{
//echo '<script>alert("成功")</script>';
mysql_query("set names utf8");
$arr=mysql_query("SELECT dfname
FROM manage_degree_first
WHERE degree='".$_POST['degree']."'",$conn);
echo '<select name="first" id="First"><option>请选择：</option>';
while($result=mysql_fetch_array($arr))
{
if($result[0]==$_POST["first"])
{
	echo "<option value='".$result[0]."' selected>".$result[0]."</option>";
}
else {
	echo "<option value='".$result[0]."'>".$result[0]."</option>";
}
}
echo "</select>";
}
?>
</td>
<td>
选择二级学科名：
</td>
<td>
<script type="text/javascript">
document.getElementById("First").onchange=function(){
	document.forms[0].submit();
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
WHERE manage_degree_first.dfname='".$_POST['first']."'",$conn);
echo '<select name="second" id="Second"><option>请选择：</option>';
while($result=mysql_fetch_array($arr))
{
if($result[0]==$_POST["second"])
{
	echo "<option value='".$result[0]."' selected>".$result[0]."</option>";
}
else {
	echo "<option value='".$result[0]."'>".$result[0]."</option>";
}
}
echo "</select>";
}
?>
</td>
</tr>
<script type="text/javascript">
document.getElementById("Second").onchange=function(){
	document.forms[0].submit();
	}
</script>

<tr>
<textarea rows="30" cols="50" name="editor01" id="Edit">
<?php
if($select)
{
mysql_query("set names utf8");
$arr=mysql_query("SELECT intro FROM manage_degree_intro JOIN manage_degree_second ON manage_degree_second.id = manage_degree_intro.sid
WHERE manage_degree_second.dsname='".$_POST['second']."'",$conn);
while($result=mysql_fetch_array($arr))
{
	echo $result[0];
}}
?></textarea>
<script type="text/javascript">CKEDITOR.replace('editor01');</script>
</tr>
<tr>
学科介绍：
</tr>
<tr>
<textarea rows="30" cols="50" name="editor02" id="Edit2">
<?php
if($select)
{
mysql_query("set names utf8");
$arr=mysql_query("SELECT info FROM manage_degree_intro JOIN manage_degree_second ON manage_degree_second.id = manage_degree_intro.sid
WHERE manage_degree_second.dsname='".$_POST['second']."'",$conn);
while($result=mysql_fetch_array($arr))
{
	echo $result[0];
}}
?></textarea>
<script type="text/javascript">CKEDITOR.replace('editor02');</script>
</tr>
<tr>
研究方向：
</tr>
<tr>
<textarea rows="30" cols="50" name="editor03" id="Edit3">
<?php
if($select)
{
mysql_query("set names utf8");
$arr=mysql_query("SELECT direction FROM manage_degree_intro JOIN manage_degree_second ON manage_degree_second.id = manage_degree_intro.sid
WHERE manage_degree_second.dsname='".$_POST['second']."'",$conn);
while($result=mysql_fetch_array($arr))
{
	echo $result[0];
}}
?></textarea>
<script type="text/javascript">CKEDITOR.replace('editor03');</script>
</tr>
</table>
<?php
$editor01=null;
$add=null;
if($select)
{
mysql_query("set names utf8");
if(isset($_POST['editor01'])&&isset($_POST['editor02'])&&isset($_POST['editor03']))
{
$editor01=$_POST['editor01'];
$editor02=$_POST['editor02'];
$editor03=$_POST['editor03'];

}
if(isset($_POST['Add']) and $_POST['Add']=="添加")
{
	//echo $editor01;
	
	$arr1=mysql_query("SELECT id FROM manage_degree_second WHERE dsname='".$_POST['second']."'",$conn);
	
	//echo mysql_num_rows($arr);
	while($result1=mysql_fetch_array($arr1))
	{   
	    $arr2=mysql_query("SELECT id FROM manage_degree_intro WHERE sid='".$result1[0]."'",$conn);
		if(mysql_num_rows($arr2)==0)
		{
		$sql=("insert into manage_degree_intro(degree,sid,intro,info,direction) values('".$_POST['degree']."','".$result1[0]."','".$_POST['editor01']."','".$_POST['editor02']."','".$_POST['editor03']."')");
		$add=mysql_query($sql,$conn);
		}else{
		while($result2=mysql_fetch_array($arr2))
		{
		$sql="update manage_degree_intro set intro='".$_POST['editor01']."',info='".$_POST['editor02']."',direction='".$_POST['editor03']."' where id=".$result2[0];
		$add=mysql_query($sql,$conn);
		}
		}
		}
		
	}
	if($add)
	{
		echo '<script>alert("成功")</script>';
	}
}

?>
<input type="Submit" name="Add" value="添加"><input type="Reset" name="Reset" value="重置">
</form>  
</div>
</div>
</body>
</html>