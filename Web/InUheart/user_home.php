<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Expires" CONTENT="0"> 
	<meta http-equiv="Cache-Control" CONTENT="no-cache"> 
	<meta http-equiv="Pragma" CONTENT="no-cache">
	<title>在你心理</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<link rel="Stylesheet" type="text/css" href="css/loginDialog.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Tilling Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/iconeffects.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/normalize.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- fonts -->
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' 	type='text/css'>
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

	<script>
		$("chatroom").on("click",function(event){
    		event.preventDefault();//使a自带的方法失效，即无法调整到href中的URL(http://www.baidu.com)
   			.ajax({
           		type: "POST",
           		url: "http://localhost:8081",
           		contentType:"application/json",
           		data: JSON.stringify({"rank":"user"}),//参数列表
           		dataType:"json",
           		success: function(result){
           		   //请求正确之后的操作
           		   alert("success");
           		},
           		error: function(result){
           		   //请求失败之后的操作
           		   alert("fail");
           		}
    		});
		});
		$('chatroom').click(function(){
    $.post('http://localhost:8081', {'rank':"user"},
    function(cdata) {
        console.log('ok', cdata)
    })
})
	</script>
	<style>
		.form1{
			font-size: 15px;
		}
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
<body onbeforeunload="history.go(0)">

<?php 
	if(!isset($_COOKIE["username"]))
	{
		echo 	"<script>
					alert('请先登录~');
					location.href='judge.php';
				</script>";
	}
?>

	<div class="banner">
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
											<li><!-- <form id="_form" method="post" action="http://localhost:8081">
												<input type="hidden" name="rank2" value="user" id="rank" /> 
												<a onclick="document.getElementById('_form').submit();" class="hvr-overline-from-left button2" href="#">匿名聊天室</a>
												</form> -->
												<a class="hvr-overline-from-left button2" href="http://localhost:8081/?rank=user">匿名聊天室</a>
											</li>
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
			<div class="banner-info text-center">
				<script src="js/responsiveslides.min.js"></script>
					<script>
											// You can also use "$(window).load(function() {"
											$(function () {
											 // Slideshow 4
											$("#slider3").responsiveSlides({
												auto: true,
												pager: false,
												nav: false,
												speed: 500,
												namespace: "callbacks",
												before: function () {
											$('.events').append("<li>before event fired.</li>");
											},
											after: function () {
												$('.events').append("<li>after event fired.</li>");
												}
												});
												});
					</script>
				<div id="top" class="callbacks_container">
						<ul class="rslides" id="slider3">
							<li>
								<div class="banner-text">
									<h4>在你心理</h4>
									<p>Welcome to In Uheart</p>
								</div>
							</li>
							<li>
								<div class="banner-text">
									<h4>We'll always in your heart</h4>
									<p>Be shining ,Be strong</p>
								</div>
							</li>
							<li>
								<div class="banner-text">
									<h4>如果你看到面前的阴影<br>别怕，那是因为你的背后有阳光</h4>
									<p>If you saw the darkness in front of you,don't be afraid,that's because sunshine is at your back</p>
								</div>
							</li>
						</ul>
				</div>
				<a class="scroll" href="#banner-bottom"><img src="images/down.png"></a>
			</div>
		</div>

</div>
<!-- //banner -->

<div id="banner-bottom" class="welcome">
	<div class="container">
		<h3>Welcome To In Uheart</h3>
		<p>Welcome To In Uheart</p>
		<div class="seed-grid">
				<div class="hi-icon-wrap hi-icon-effect-4 hi-icon-effect-4b">
					<div class="abt-icon">
						<a href="testmain.php" class="hi-icon icon1"></a>
						<h4>心理测评</h4>
					</div>
					<div class="abt-icon">
						<a href="chat.html" class="hi-icon icon2"></a>
						<h4>咨询</h4>
					</div>
					<div class="abt-icon">
						<a href="http://localhost:8081/?rank=user" class="hi-icon icon3"></a>
						<h4>匿名聊天室</h4>
					</div>
					<div class="abt-icon">
						<a href="chicken_soup.php" class="hi-icon icon4"></a>
						<h4>心灵鸡汤</h4>
					</div>
					
					<div class="clearfix"></div>
				</div>
		</div>
		
	</div>
</div>
<!-- //welcome -->



<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {							
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

	<script>
		$(".chatroom").on("click",function(event){
    		event.preventDefault();//使a自带的方法失效，即无法调整到href中的URL(http://www.baidu.com)
   			.ajax({
           		type: "POST",
           		url: "http://localhost:8081",
           		contentType:"application/json",
           		data: JSON.stringify({rank:"user"}),//参数列表
           		dataType:"json",
           		success: function(result){
           		   //请求正确之后的操作
           		   alert("success");
           		},
           		error: function(result){
           		   //请求失败之后的操作
           		   alert("fail");
           		}
    		});
		});
		$('chatroom').click(function(){
    $.post('http://localhost:8081', {'rank':"user"},
    function(cdata) {
        console.log('ok', cdata)
    })
})
	</script>

	
</body>
</html>

