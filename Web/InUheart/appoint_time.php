<!DOCTYPE html>
<html>
<head>
	<title>在你心理</title>
	<link rel="stylesheet" href="css/style3.css">
	<meta charset="UTF-8">
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
										<a class="navbar-brand" href="index.html"><span>In</span><i>Uheart</i></a>
									</h1>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
									<nav class="cl-effect-1">
										<ul class="nav navbar-nav ">
										<li><a class="hvr-overline-from-left button2 active" href="judge.php">主页</a></li>
											<li><a class="hvr-overline-from-left button2" href="testmain.php">测评</a></li>
											<li><a class="hvr-overline-from-left button2" href="appoint_select.php">预约咨询</a></li>
											<li><a class="hvr-overline-from-left button2" href="chat.html">在线咨询</a></li>
											<li><a class="hvr-overline-from-left button2" href="http://localhost:8081/?rank=user">匿名聊天室</a></li>
											<li><a class="hvr-overline-from-left button2" href="chicken_soup.php">鸡汤</a></li>
											<li><a class="hvr-overline-from-left button2" href="appoint_condition.php">我的</a></li>
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

	//连接数据库
	$link = mysqli_connect('localhost','root','','project');
	mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
	if(isset($_POST['date']))$date=$_POST['date'];

	$result = mysqli_query($link,"select * from appointment where date='{$date}' and available=1") or die(mysqli_error($link));

	//有空闲的心理咨询室
	if(mysqli_num_rows($result)>0)		
	{
		
		echo "<center><br>";
		echo "<h3 style='color:rgb(177, 106, 104);'>您选择的是：&nbsp;$date<br><br>该时间段有如下心理咨询室：</h3><br>" ;
		echo "<form action='submit.php' method='post' id='form'>
		<div class='table-1'>
			  <table align='center' cellpadding='4px'>
			  	<tr>
			  		<td align='center'></td>
			  		<td align='center'>姓名</td>
			  		<td align='center'>房间</td>
			  		<td align='center'>时间</td>
			  	</tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_BOTH))
		{
		 	$teacher = $row['teacher'];
		 	$room = $row['room'];
		 	$time = $row['time'];
		 	$id = $row['ID'];
			echo 
			"<tr>
				<td align='center'><input type='radio' name='select' value=$id></td>
				<td align='center'>$teacher</td>
				<td align='center'>$room</td>
				<td align='center'>$time</td>
			</tr></div>";
		}
		echo "<tr align='center'>
				<td colspan='4' >
					<br><br>请您描述一下想要咨询的问题：
				</td>
			 </tr>
			 <tr align='center'>
				<td colspan='4' >
					<textarea name='information' cols='40' rows='3'></textarea>
				</td>
			 </tr>
			 <tr align='center'>
				<td colspan='4' >
					<br>
					  <button class='btn-3' type='submit' naem='456'><font size=4><strong>确&nbsp;&nbsp;&nbsp;定</strong></font></button>
				</td>
			 </tr>";
		echo "</table></form>";
		echo "</center>";
	}
	else 				//没有空闲的心理咨询室
	{
		
	echo "<script>alert('没有空闲的心理咨询室，请查看的别的时间');
	location.href='appoint_select.php';</script>";
	}
	mysqli_close($link);
	?>
</body>
</html>