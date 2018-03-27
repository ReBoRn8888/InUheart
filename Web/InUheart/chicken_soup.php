<!DOCTYPE html>
<html>
<head>
	
	<!-- <meta charset="utf-8"> -->
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
											<li><a class="hvr-overline-from-left button2" href="chat.html?rank=user">在线咨询</a></li>
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
			<h3>文章</h3>
		<div class="single-inline">
			<div class="col-md-9">
				<!-- <div class="single-top">
					<div class="blog-top">
					<div class="blog-left">
						<b>2</b>
						<span>Nov.</span>
					</div>
					
					<div class="top-blog">
						<a class="fast" href="csoup.php?title=用眼神谈判"><font size=5>用眼神谈判</font></a>
						<p>Posted by <a href="#">Admin</a> </p> 
					</div>
					<div class="clearfix"> </div>
					</div>
					<div class="grid-men">
						<div class="col-md-5">
							<img class="img-responsive sin-on" src="images/sin1.jpg" alt="" />
							</div>
							<div class="col-md-7">
         								<p>快到飞往巴黎的航班的登机口时，我们从一路飞奔变为一溜小跑。
飞机尚未起飞，但登机通道已经关闭。登机口的工作人员正在平静地整理着票根。
登机口到机舱口之间的登机桥已被收起。
“等等，我们还没登机！”我喘着气喊道。</p>
<p>“抱歉，”登机口工作人员说，“登机时间已过。”
“可我们的转乘航班10分钟前才刚到。他们答应我们会提前打电话通知登机口的。”
“抱歉，登机口一旦关闭，任何人都不能登机。”
飞机引擎嗡嗡的轰鸣声越来越急促，一个家伙拿着一根亮亮的指挥棒不慌不忙地出现在机场跑道上....</p>
								
							<a href="csoup.php?title=用眼神谈判" class="more-dummy">Readmore<span> </span></a>
							</div>
				
						<div class="clearfix"> </div>
					</div>
				</div> -->
				<?php 
					$image = array();
					$image[0]="images/sin.jpg";
					$image[1]="images/sin1.jpg";
					$image[2]="images/sin2.jpg";
					$i = 0;
					$link = mysqli_connect('localhost','root','','project');
					mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
					$result = mysqli_query($link,"select * from chicken_soup order by Date desc limit 3") or die(mysqli_error($link));
					if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
						$title=$row['Title'];
						$content=substr($row['Content'],0,700);
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
						<div class='single-top'>
						<div class='blog-top'>
						<div class='blog-left'>
						<b>$day</b>
						<span>$month</span><br>	
						<span>$year</span>
					</div>
					
					<div class='top-blog'>
						<a class='fast' href='csoup.php?title=$title'><font size=5>$title</font></a>
						<p>Posted by <a href='#'>Admin</a> </p> 
					</div>
					<div class='clearfix'> </div>
					</div>
					<div class='grid-men'>
						<div class='col-md-5'>
							<img class='img-responsive sin-on' src=$image[$i] alt='' />
							</div>
							<div class='col-md-7'>
         								<p style='overflow:auto;word-wrap: break-word;white-space: pre-wrap;'>  $content</p>
								
							<a href='csoup.php?title=$title'' class='more-dummy'>Readmore<span> </span></a>
							</div>
				
						<div class='clearfix'> </div>
					</div>
				</div>
							";
					$i+=1;	
					}
				}
				 ?>
				<!-- <div class="single-top">
					<div class="blog-top">
					<div class="blog-left">
						<b>2</b>
						<span>Nov.</span>
					</div>
					<div class="top-blog">
						<a class="fast" href="csoup.php?title=讨分数的人"><font size=5>讨分数的人</font></a>
						<p>Posted by <a href="#">Admin</a> </p> 
					</div>
					<div class="clearfix"> </div>
					</div>
					<div class="grid-men">
						<div class="col-md-5">
							<img class="img-responsive sin-on" src="images/sin.jpg" alt="" />
							</div>
							<div class="col-md-7">
								<p>一阵小跑声过后，学校走廊里，一个男生小声而急促地叫我，我立定问他：“有什么事吗？”
    他期期艾艾地说：“我——我能到你的办公室去说吗？”我点点头。他进来后，小心翼翼关上门后，将手上卷着的画纸摊开在我面前说：“老师你看，我觉得自己画得挺好的，为什么只有65分呢？我看他这张还没我的好呢，他都70分呢。”他把同桌的那张画也摊了开来。
   </p>
								<p>  啊，原来是来讨说法的。这是一张美术作业，临摹书上的一幅写意国画《梅花麻雀图》。这算是期中考试了。
    两张画摊在桌上，我给他分析：“你这张，梅花点得还蛮像样，麻雀的形体姿态也不错，可偏偏是‘点睛之笔’不准确，眼睛画偏了，这不是犯了常识性的错吗？他这张也有缺点，梅花浓淡深浅缺少变化，但作为画面主体的麻雀画得还是到位的……”
    他听明白了，似乎也服气，但还不走，磨磨蹭蹭，抓了一会儿头皮，终于说出了要说的话：“老师，你这次能不能开开恩，送我5分，下次还你，行不行？”....</p> 
							<a href="csoup.php?title=讨分数的人" class="more-dummy">Readmore<span> </span></a>
							</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="single-top top-sin">
					<div class="blog-top">
					<div class="blog-left">
						<b>2</b>
						<span>Nov.</span>
					</div>
					<div class="top-blog">
						<a class="fast" href="csoup.php?title=总在最慢的队伍"><font size=5>总在最慢的队伍</font></a>
						<p>Posted by <a href="#">Admin</a> </p> 
					</div>
					<div class="clearfix"> </div>
					</div>
					<div class="grid-men">
						<div class="col-md-5">
							<img class="img-responsive sin-on" src="images/sin2.jpg" alt="" />
							</div>
							<div class="col-md-7">
								<p>  问：为什么在超市排队，我选的队伍总是最慢的？
    答：大多数时候不是你真的运气不佳，只不过是你总对倒霉的事情印象深刻。
    “我发誓，隔壁队伍的红衣美女在我排到一半的时候才出现，可是人家现在已经结完账走人了，我前面的前面的那个大妈却还在数硬币。为什么我总是如此不走运？”
    心理学家会搬出“普遍受害者理论”来解释这种现象。当你所在的队伍走得很快时，你的注意力多半集中在前方的目标上，自然也不会对排队留下太多印象。而如果你不巧排在了一支慢队伍中，你就没法抑制“怎么这么慢”这个念头了。若心急又找不到什么事情来打发时间，这个念头就不断地被强化。结果就是，你觉得自己总是最倒霉的那个。
   </p>
								<p>  事实上，理性分析一下你就会知道，从概率上来讲，你确实没法总是走运——就拿你和你左右两边共三支队伍来说，在2/3的时间内，旁边的队伍中总有一支比你的快。
    20世纪初期的哥本哈根电信交换局面临着一个类似的问题：如何确定电话总机的接线数目，以保证用户的平等待时间....</p> 
							<a href="csoup.php?title=总在最慢的队伍" class="more-dummy">Readmore<span> </span></a>
							</div>
						<div class="clearfix"> </div>
					</div> -->
				</div>
			</div>
			<div class="col-md-3 categories-grid">
				<div class="grid-categories">
					<h4>文章列表</h4>
					<ul class="popular ">
						<!-- <li><a href="csoup.php?title=用眼神谈判"><span class="dot"> </span>用眼神谈判</a></li>
						<li><a href="csoup.php?title=讨分数的人"><span class="dot"> </span>讨分数的人</a></li>
						<li><a href="csoup.php?title=总在最慢的队伍"><span class="dot"> </span>总在最慢的队伍</a></li>
						<li><a href="csoup.php?title=身边的溪流"><span class="dot"> </span>身边的溪流</a></li>
						<li><a href="csoup.php?title=守得安静，才有精进"><span class="dot"> </span>守得安静，才有精进</a></li>
						<li><a href="csoup.php?title=天黑了，心亮着"><span class="dot"> </span>天黑了，心亮着</a></li> -->
						<?php 
							$link = mysqli_connect('localhost','root','','project');
							mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
							$result = mysqli_query($link,"select Title from chicken_soup") or die(mysqli_error($link));
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
					</ul>
				</div>
				
			</div>
			<div class="clearfix"> </div>
		</div>
		
		
	</div>

			
			</div>	
	</div>

	


</body>
</html>
