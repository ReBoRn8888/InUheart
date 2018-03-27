<!DOCTYPE html>
<html>
<head>
	<title>用户查看预约状态</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<link rel="stylesheet" href="css/style3.css">
	<link rel="stylesheet" href="css/te_input.css" type="text/css">
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
		.left{
			float: left;
			display: inline;
		}
		.right{
			float: right;
			display: inline;
		}
		.red{
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
											<a class="navbar-brand" href="judge.php"><span>In</span><i>Uheart</i></a>
										</h1>
									</div>
									<!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
									<nav class="cl-effect-1">
										<ul class="nav navbar-nav ">
											<li><a class="hvr-overline-from-left button2 active" href="judge.php">主页</a></li>
											<li><a class="hvr-overline-from-left button2" href="testmain.php">心理测评</a></li>
											<li><a class="hvr-overline-from-left button2" href="appoint_select.php">预约咨询</a></li>
											<li><a class="hvr-overline-from-left button2" href="chat.html?rank=user">在线咨询</a></li>
											<li><a class="hvr-overline-from-left button2" href="http://localhost:8081/?rank=user">匿名聊天室</a></li>
											<li><a class="hvr-overline-from-left button2" href="chicken_soup.php">心灵鸡汤</a></li>
											<li><a class="hvr-overline-from-left button2" href="appoint_condition.php">我的</a></li>
											<li><a class="hvr-overline-from-left button2" href="logout.php">注销</a></li>
												<?php 
	                                $username=$_COOKIE['username'];
	                          		echo "<div class='right'>欢迎登录&nbsp;</div>
		                           	<div class='red'>$username&nbsp;</div>";
	                                 ?>
	                                <br><br>
											</ul>
																					
									
									</nav>
								</div><!-- /navbar-collapse -->
								</nav>
				</div>
			</div>
	</div>
	<!-- //banner -->

	<?php 
	$userid=$_COOKIE['userid'];
	$username=$_COOKIE['username'];

	//连接数据库
	$link = mysqli_connect('localhost','root','','project');
	mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));

	$result = mysqli_query($link,"select * from appointment,appoint_result where appoint_result.AppointID=appointment.ID and UserID=$userid order by date,time") or die(mysqli_error($link));
	$result2 = mysqli_query($link,"select * from online_appoint where User=$userid") or die(mysqli_error($link));
	if(mysqli_num_rows($result)>0){
		echo "<center><br>";
		echo "<h2>$username&nbsp;您的线下预约状况如下：</h2><br>" ;
		echo "<form action='appoint_delete.php' method='post' id='form'>
		<div class='table-1'>
			  <table align='center' cellpadding='8px' border='0' cellspacing='0.5'>
			  	<tr>
			  		<td align='center'></td>
			  		<td align='center'>预约时间</td>
					<td align='center'>预约地点</td>
					<td align='center'>老师</td>
					<td align='center' width='200'>预约留言</td>
					<td align='center'>接受情况</td>
					<td align='center'>完成情况</td>
			  	</tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
			$appointid=$row['ID'];
			$information=$row['Information'];
			$accept=$row['Accept'];
			$complete=$row['Complete'];
			$teacher=$row['teacher'];
			$room=$row['room'];
			$time=$row['time'];
			$date=$row['date'];
			if($row['Accept']==0)$accept="未接受";
			else $accept="已接受";
			if($row['Complete']==0)$complete="未完成";
			else $complete="已完成";
			echo 
				"<tr>
					<td align='center'><input type='radio' name='select' value='$appointid'></td>
					<td align='center'>$date<br>$time</td>
					<td align='center'>$room</td>
					<td align='center'>$teacher</td>
					<td align='center'>$information</td>
					";
			if($accept=="未接受")echo "<td align='center'><div class='red'>$accept</div></td>";
			else echo "<td align='center'>$accept</td>";
			if($complete=="未完成")echo "<td align='center'><div class='red'>$complete</div></td>";
			else echo "<td align='center'>$complete</td>";
			echo "</tr>";
		}
		echo 
			"</table></div>
			<br><br>
			<center>
				<button class='btn-3' type='submit' name='delete'><font size=4><strong>取消预约</strong></font></button>
			</center>
			</form><br><br><br>";
	}
	if(mysqli_num_rows($result2)>0){
		echo "<center><br>";
		echo "<h2>$username&nbsp;您的线上预约状况如下：</h2><br>" ;
		echo "<form action='appoint_delete_online.php' method='post'>
		<div class='table-1'>
			  <table align='center' cellpadding='8px' border='0' cellspacing='0.5'>
			  	<tr>
			  		<td align='center'></td>
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
			"</table></div>
			<br><br>
			<center>
			
			
			     <button class='btn-3' type='submit' name='delete'><font size=4><strong>取消预约</strong></font></button>
			    
				
			</center>
			</form><br><br><br>";
	}
	if(mysqli_num_rows($result)<=0&&mysqli_num_rows($result2)<=0){
		echo "<center>您未进行任何预约，请返回预约后再来查看！</center>";
	}
	mysqli_close($link);
	?>
</body>
</html>