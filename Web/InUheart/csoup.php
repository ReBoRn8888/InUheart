<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/te_input.css" type="text/css">
		<title>在你心理</title>
		<link href="css/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:500,900italic,900,100,700italic,300,700,300italic,400' rel='stylesheet' type='text/css'>
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
<!--//fonts-->
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
		.red{
			color: red;
		}
		div#left {
			float: left;
			width: 150px;
			background-color: #FFFFFF;
			margin-top: 50px;
			padding: 5px;
			margin-left: 50px;
		}
		div#middle {
			padding-top: 30px;
			padding-right: 250px;
			padding-bottom: 5px;
			padding-left: 250px;
			margin: 0px;
		}
		div#right {
		    float: right;
		    width: 150px;
		    background-color: #ffffff;
			margin-top: 50px;
			margin-right: 50px;
			padding: 5px;
		}
		body {
			margin: 0px;
			padding: 0px;
			font-size: 12px;
			line-height: 20px;
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
											<li><a class="hvr-overline-from-left button2" href="testmain.php">测评</a></li>
											<li><a class="hvr-overline-from-left button2" href="appoint_select.php">预约咨询</a></li>
											<li><a class="hvr-overline-from-left button2" href="chat.html">在线咨询</a></li>
											<li><a class="hvr-overline-from-left button2" href="http://localhost:8081/?rank=user">匿名聊天室</a></li>
											<li><a class="hvr-overline-from-left button2" href="chicken_soup.php">心灵鸡汤</a></li>
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
<!-- //banner -->
	<div class="content">
			<div class="container">
			<div class="single-text">
			
		<div class="single-inline">
			<div class="col-md-9">
				<div class="single-top">
					<div class="blog-top">
					<div class="blog-left">
						
		<?php 
		$source = htmlspecialchars($_SERVER["PHP_SELF"]);
		$link = mysqli_connect('localhost','root','','project');
		mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
		if(isset($_GET['title'])){
			$get=$_GET['title'];
			$result = mysqli_query($link,"select * from chicken_soup where Title = '$get'") or die(mysqli_error($link));
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
					$title=$row['Title'];
					$content=$row['Content'];
					$date=$row['Date'];
					$year=substr($date,0,4);
					$month=substr($date,5,2);
					$day=substr($date,8,2);
					switch ($month) {
						case '01':
							$month = "Jan.";
							break;
						case '02':
							$month = "Feb.";
							break;
						case '03':
							$month = "Mar.";
							break;
						case '04':
							$month = "Apr.";
							break;
						case '05':
							$month = "May.";
							break;
						case '06':
							$month = "Jun.";
							break;
						case '07':
							$month = "Jul.";
							break;
						case '08':
							$month = "Aug.";
							break;
						case '09':
							$month = "Sep.";
							break;
						case '10':
							$month = "Oct.";
							break;
						case '11':
							$month = "Nov.";
							break;
						case '12':
							$month = "Dec.";
							break;
					}
					echo "
					<b>$day</b>
						<span>$month</span><br>	
						<span>$year</span>
					</div>
					<div class='top-blog'>
						<font size=5>$title</font>
						<p>Posted by <a href='#'>Admin</a> </p> 
					</div>
					</div>
					<div class'grid-men'>
						<br>
									<br>		<br><br><br><br>
                   <font size=4>	<pre style='overflow:auto;word-wrap: break-word;white-space: pre-wrap;font-size:20px;font-family:微软雅黑'>$content</pre></font>
                   <br><br><br>
								
					</div>
				</div>
			
				
				</div>
			</div>
					";
				}
			}
		}
		else{
			$result = mysqli_query($link,"select * from chicken_soup order by Date desc limit 1") or die(mysqli_error($link));
			if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
				$title=$row['Title'];
				$content=$row['Content'];
				$date=$row['Date'];
				$year=substr($date,0,4);
				$month=substr($date,5,2);
				$day=substr($date,8,2);
				switch ($month) {
						case '01':
							$month = "Jan.";
							break;
						case '02':
							$month = "Feb.";
							break;
						case '03':
							$month = "Mar.";
							break;
						case '04':
							$month = "Apr.";
							break;
						case '05':
							$month = "May.";
							break;
						case '06':
							$month = "Jun.";
							break;
						case '07':
							$month = "Jul.";
							break;
						case '08':
							$month = "Aug.";
							break;
						case '09':
							$month = "Sep.";
							break;
						case '10':
							$month = "Oct.";
							break;
						case '11':
							$month = "Nov.";
							break;
						case '12':
							$month = "Dec.";
							break;
					}
				echo "
					<b>$day</b>
						<span>$month</span><br>	
						<span>$year</span>
					</div>
					<div class='top-blog'>
						<font size=5>$title</font>
						<p>Posted by <a href='#'>Admin</a> </p> 
					</div>
					</div>
					<div class'grid-men'>
						<br>
									<br>		<br><br><br><br>
                   <font size=4>	<pre style='overflow:auto;word-wrap: break-word;white-space: pre-wrap;'>$content</pre></font>
                   <br><br><br>
								
					</div>
				</div>
			
				
				</div>
			</div>
					";
					
			}
		}
		}
		
		mysqli_close($link);
	?>
         	
			<div class="col-md-3 categories-grid">
				<div class="grid-categories">
					<h4>最新发表</h4>
					<?php 
	
		$link = mysqli_connect('localhost','root','','project');
		mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
		$result = mysqli_query($link,"select Title from chicken_soup order by Date desc limit 5") or die(mysqli_error($link));
	
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
				$title=$row['Title'];
				echo "
					<li><a href='csoup.php?title=$title'><span class='dot'> </span>$title</a></li>
				";
			}
		}
		mysqli_close($link);
	?>
				
				</div>
				
			</div>
			<div class="clearfix"> </div>
		</div>
		
		
	</div>

			
			</div>	
	</div>

	


</body>
</html>