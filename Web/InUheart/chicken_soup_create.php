<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/te_input.css" type="text/css">
		<title>在你心理</title>
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
#phpernote{

	width:300px;

	height:100px;

	background-image:url(images/bg.jpg);

	background-repeat: no-repeat;

	background-position: right bottom;

	}
		.red{
			color: red;
		}
	.STYLE1 {
	color: #666666;
	font-weight: bold;
	font-family: "方正等线";
	font-size: 24px;
}
    .STYLE2 {
	font-size: 24px;
	font-family: "方正等线";
	font-weight: bold;
}
    .STYLE3 {
	font-family: "方正等线";
	font-weight: bold;
	color: #333333;
}
    </style>
</head>
<body>
<?php 
	if(!isset($_COOKIE["username"]))
	{
		echo 	"<script>
					alert('请先登录~');
					location.href='judge.php';
				</script>";
	}
?>
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
											<li><a class="hvr-overline-from-left button2" href="chat.html?rank=admin">在线咨询</a></li>
											<li><!-- <form id="_form" method="post" action="http://localhost:8081">
												<input type="hidden" name="rank2" value="admin" id="rank" /> 
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
<!-- //banner -->
<br><br>

<table align="center" border="0">
	<form action="chicken_soup_create_sql.php" method="POST">
		<tr align="center">
			<td></td>
			<td><h3 class="tittle">添加文章&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h3>
			</td>
		</tr>
		<tr>
			<td valign="center"><span class="STYLE1">标题：</span></td>
			<td valign="center" height="50px"><input type="text" name="title" size="150px"></td>
		</tr>
		<tr>
			<td valign="center"><span class="STYLE2">正文：</span></td>
			<td valign="center" height="350px"><textarea name="content" id="content" cols="150" rows="17"  style="background-image:url(images/a.jpg);opacity:0.4;resize:none;"></textarea></td>
		</tr>
		<tr align="center">
			<td colspan="2">
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn-3"  type="submit" ><font size=4><strong>提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交 </strong></font></button></td>
		</tr>
	</form>
</table>

</body>
</html>