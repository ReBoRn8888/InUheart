<?php 
	//连接数据库
	$link = mysqli_connect('localhost','root','','project');
	mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
	if(!isset($_COOKIE["rank"]))
		echo "<script>location.href='index.html';</script>";
	else if($_COOKIE["rank"]=="user")
		echo "<script>location.href='user_home.php';</script>";
	else if($_COOKIE["rank"]=="admin")
		echo "<script>location.href='teacher_home.php';</script>";
?>