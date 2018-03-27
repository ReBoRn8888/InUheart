	
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="css/te_input.css" type="text/css">
<title>在你心理</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<link href="./css/bootstrap1.css" rel='stylesheet' type='text/css' />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="./js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="./css/style1.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--menu-->

<script src="./js/jquery.mmenu.min.js"></script>
<script type="text/javascript">
		$(function() {
			$('nav#menu').mmenu();
		});
	</script>
<script type="text/javascript">
		jQuery(document).ready(function($) {
		  $(".scroll").click(function(event){		
			event.preventDefault();
		  $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
	
	<script type="text/javascript" src="./js/jquery.mixitup.min.js"></script>
	<script type="text/javascript">
	$(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					effects: ['fade'],
					easing: 'snap',
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			
			},
			
			hoverEffect: function () {
			}

		};
		
		// Run the show!
		filterList.init();
		
		
	});	
	</script>

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
											<li><a class="hvr-overline-from-left button2" href="chat.html?rank=user">在线咨询</a></li>
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
<div class="work" id="work">
	<div class="container">
		<h2>心理测试</h2>
		<span class="work_line"> </span>
		<ul id="filters" class="clearfix">
		  <li><span class="filter active" data-filter="app card icon logo web">全部</span></li>
		  <li><span class="filter" data-filter="app">心理专业测评</span></li>
		  <li><span class="filter" data-filter="card">分类测评</span></li>
		  <li><span class="filter" data-filter="icon">趣味测评</span></li>
		  
		  <div class="clearfix"> </div>
		</ul>
        <div id="portfoliolist">
		  <div class="portfolio app" data-cat="app">
				<div class="portfolio-wrapper">				
					<a href="test.php">
					  <div class="view view-first">
	                    <img src="./images/p1.jpg" class="img-responsive" alt=""/>
	                      <div class="mask">
	                        <h3>SCL-90</h3>
	                        <p>90道题</p>
	                        <span> </span>	                      </div>
	                  </div>
					</a>				</div>
		  </div>				
            <div class="portfolio icon" data-cat="icon">
				<div class="portfolio-wrapper">				
					<a href="funtest1.php">
					  <div class="view view-first">
	                    <img src="./images/p2.jpg" class="img-responsive" alt=""/>
	                      <div class="mask">
	                        <h3>梦境测试</h3>
	                        <p></p>
	                        <span> </span>	                      </div>
	                  </div>
					</a>				</div>
			</div>		
		    <div class="portfolio icon" data-cat="icon">
				<div class="portfolio-wrapper">				
					<a href="funtest3.php">
					  <div class="view view-first">
	                    <img src="./images/p3.jpg" class="img-responsive" alt=""/>
	                      <div class="mask">
	                        <h3>紧张测试</h3>
	                        <p></p>
	                        <span> </span>	                      </div>
	                  </div>
					</a>				</div>
			</div>				
			 <div class="portfolio icon" data-cat="icon">
				<div class="portfolio-wrapper">				
					<a href="funtest2.php">
					  <div class="view view-first">
	                    <img src="./images/p4.jpg" class="img-responsive" alt=""/>
	                      <div class="mask">
	                        <h3>弱点测试</h3>
	                        <p></p>
	                        <span> </span>	                      </div>
	                  </div>
					</a>				</div>
			</div>	
		    <div class="portfolio card" data-cat="card">
				<div class="portfolio-wrapper">				
					<a href="./images/p5.jpg" class="flipLightBox">
					  <div class="view view-first">
	                    <img src="./images/p5.jpg" class="img-responsive" alt=""/>
	                      <div class="mask">
	                        <h3>即将上线</h3>
	                        <p></p>
	                        <span> </span>	                      </div>
	                  </div>
					</a>				</div>
			</div>			
			<div class="portfolio card" data-cat="card">
				<div class="portfolio-wrapper">				
					<a href="./images/p6.jpg" class="flipLightBox">
					  <div class="view view-first">
	                    <img src="./images/p6.jpg" class="img-responsive" alt=""/>
	                      <div class="mask">
	                        <h3>即将上线</h3>
	                        <p></p>
	                        <span> </span>	                      </div>
	                  </div>
					</a>				</div>
			</div>	
			<div class="clearfix"> </div>
		</div>
		<div class="work_btn">
		   <a href="#" class="fa-btn btn1 btn-1 btn-1e">查看更多</a>		</div>
	</div><!-- container -->
	<script type="text/javascript" src="./js/fliplightbox.min.js"></script>
	<script type="text/javascript">$('body').flipLightBox()</script>
</div>
   </div>
  </div>
</div>








</body>
</html>	