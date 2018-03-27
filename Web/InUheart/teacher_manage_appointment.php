<!DOCTYPE html>
<html>
<head>
		<title>在你心理</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style3.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tilling Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!-- //fonts -->
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->
		<style>
/* Border styles */

.table-1 thead, #table-1 tr {
border-top-width: 1px;
border-top-style: solid;
border-top-color: #ffd966;
}
.table-1 {
border-bottom-width: 1px;

border-bottom-color: #ffd966;

}

/* Padding and font style */
.table-1 td, #table-1 th {
padding: 5px 10px;
font-size: 20px;
font-family: 微软雅黑;
color: rgb(177, 106, 104);
}

/* Alternating background colors */
.table-1 tr:nth-child(even) {
background: #FFF
}
.table-1 tr:nth-child(odd) {
background: #ffd966
}
</style>
	<style>
		.title{
			font-family: stkaiti;
		}
		.table2{
			font-size: 15px;
			font-family: "宋体";
		}
		.red{
			color: red;
		}
		.left{
			float: left;
			display: inline;
		}
		.right{
			float: right;
			display: inline;
		}
		.red2{
			color: red;
			float: right;
			display: inline;
		}
	</style>
</head>
<body>
<!-- banner -->
<div class="banner page-head">
		<div class="container">
			<div class="header-nav">
							<nav class="navbar navbar-default">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header logo">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<h1>
										<a class="navbar-brand" href="index.html"><span>In</span><i>Uheart</i></a>
									</h1>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
									<nav class="cl-effect-1">
										<ul class="nav navbar-nav ">
											<li><a class="hvr-overline-from-left button2 active" href="judge.php">主页</a></li>
										
											<li><a class="hvr-overline-from-left button2" href="chat.html?rank=admin">在线咨询</a></li>
											<li><!-- <form id="_form" method="post" action="http://localhost:8081">
												<input type="hidden" name="rank2" value="user" id="rank" /> 
												<a onclick="document.getElementById('_form').submit();" class="hvr-overline-from-left button2" href="#">匿名聊天室</a>
												</form> -->
												<a class="hvr-overline-from-left button2" href="http://localhost:8081/?rank=admin">匿名聊天室</a>
											</li>
											<li><a class="hvr-overline-from-left button2" href="chicken_soup_create.php">心灵鸡汤</a></li>
											<li><a class="hvr-overline-from-left button2" href="teacher_manage_appointment.php">我的</a></li>
											<li><a class="hvr-overline-from-left button2" href="logout.php">注销</a></li>
												<li><?php 
	                                $username=$_COOKIE['username'];
	                          echo "<div class='right'>欢迎登录&nbsp;</div>
		                           <div class='red'>$username&nbsp;</div>";
	                                 ?></li>
											</ul>
									</nav>
								</div><!-- /navbar-collapse -->
							</nav>
			</div>
		</div>
</div>
	<?php 
	$userid=$_COOKIE['userid'];
	$admin=$_COOKIE['username'];
	echo "<br><br><br><h3 class='tittle' align='center'>管理预约情况</h3>";
	$link = mysqli_connect('localhost','root','','project');
	mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
	$result = mysqli_query($link,
		"select appoint_result.ID as AppointID,Information,Accept,Complete,room,time,date,Username from appointment,appoint_result,user where user.ID=appoint_result.UserID and appoint_result.AppointID=appointment.ID and appointment.teacher='$admin'")	or die(mysqli_error($link));
	$result2 = mysqli_query($link,
		"select * from online_appoint")	or die(mysqli_error($link));
	if(mysqli_num_rows($result)>0){
		echo "<form action='appoint_update.php' method='post'>
		<div class='table-1'>
		<center>
			<h2>线下预约</h2><br>
			<table>
				<tr>
					<td></td>
					<td align='center'>预约人</td>
					<td align='center' width='200'>预约留言</td>
					<td align='center'>预约时间</td>
					<td align='center'>预约地点</td>
					<td align='center'>接受情况</td>
					<td align='center'>完成情况</td>
				</tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
			$appointid=$row['AppointID'];
			$username=$row['Username'];
			$information=$row['Information'];
			$date=$row['date'];
			$time=$row['time'];
			$room=$row['room'];
			if($row['Accept']==0)$accept="未接受";
			else $accept="已接受";
			if($row['Complete']==0)$complete="未完成";
			else $complete="已完成";
			echo 
				"<tr>
					<td align='center'><input type='radio' name='select' value='$appointid'></td>
					<td align='center'>$username</td>
					<td align='center'>$information</td>
					<td align='center'>$date<br>$time</td>
					<td align='center'>$room</td>";
			if($accept=="未接受")echo "<td align='center'><div class='red'>$accept</div></td>";
			else echo "<td align='center'>$accept</td>";
			if($complete=="未完成")echo "<td align='center'><div class='red'>$complete</div></td>";
			else echo "<td align='center'>$complete</td>";
			echo "</tr>";
		}
		echo 
			"</table>
			</center>
			</div>
			<br><br>
			<center>
				 <button class='btn-3' type='submit' name='accept'><font size=4><strong>接&nbsp;&nbsp;&nbsp;受</strong></font></button>&nbsp;&nbsp;&nbsp;&nbsp;
				            <button class='btn-3' type='submit' name='unaccept'><font size=4><strong>取&nbsp;消&nbsp;接&nbsp;受</strong></font></button><br><br> 
							 <button class='btn-3' type='submit' name='complete'><font size=4><strong>完&nbsp;&nbsp;&nbsp;成</strong></font></button>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<button class='btn-3' type='submit' name='uncomplete'><font size=4><strong>取&nbsp;消&nbsp;完&nbsp;成</strong></font></button>
			</center>
			</form><br><br><br>";
		}
		if(mysqli_num_rows($result2)>0){
		echo "<form action='appoint_update_online.php' method='post'>
		<div class='table-1'>
		<center>
			<h2>线上预约</h2><br>
			<table>
				<tr>
					<td></td>
					<td align='center'>预约时间</td>
					<td align='center'>接受情况</td>
					<td align='center'>完成情况</td>
				</tr>";
		while($row = mysqli_fetch_array($result2,MYSQLI_BOTH)){
			$appointid=$row['ID'];
			$accept=$row['Accept'];
			$complete=$row['Complete'];
			$date=$row['Date'];
			if($row['Accept']==0)$accept="未接受";
			else $accept="已接受";
			if($row['Complete']==0)$complete="未完成";
			else $complete="已完成";
			echo 
				"<tr>
					<td align='center'><input type='radio' name='select2' value='$appointid'></td>
					<td align='center'>$date</td>";
			if($accept=="未接受")echo "<td align='center'><div class='red'>$accept</div></td>";
			else echo "<td align='center'>$accept</td>";
			if($complete=="未完成")echo "<td align='center'><div class='red'>$complete</div></td>";
			else echo "<td align='center'>$complete</td>";
			echo "</tr>";
		}
		echo 
			"</table>
			</center>
			</div>
			<br><br>
			<center>
				
				 <button class='btn-3' type='submit' name='accept'><font size=4><strong>接&nbsp;&nbsp;&nbsp;受</strong></font></button>&nbsp;&nbsp;&nbsp;&nbsp;
				            <button class='btn-3' type='submit' name='unaccept'><font size=4><strong>取&nbsp;消&nbsp;接&nbsp;受</strong></font></button><br><br> 
							 <button class='btn-3' type='submit' name='complete'><font size=4><strong>完&nbsp;&nbsp;&nbsp;成</strong></font></button>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<button class='btn-3' type='submit' name='uncomplete'><font size=4><strong>取&nbsp;消&nbsp;完&nbsp;成</strong></font></button>
				
			</center>
			</form><br><br><br>";
		mysqli_close($link);
	}
	?>
</body>
</html>