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
		.red{
			color: red;
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
<div class="view-map">
		<table align="center">
			<tr>
				<td>
					<div id="online">
						<center>
							<form action="#">
								<table>
									<tr>
										<td colspan="2"><h3 class="tittle">预约线下咨询</h3></td>
									</tr>
									<tr>
										<td><input type="radio" id="time" name="select"/></td>
										<td><label for="time"><h2 id="h2.-bootstrap-heading">按时间<span class="anchorjs-icon"></span></h2></label></td>
									</tr>
									<tr>
										<td><input type="radio" id="teacher" name="select" /></td>
										<td><label for="teacher"><h2 id="h2.-bootstrap-heading">按心理咨询师<span class="anchorjs-icon"></span></h2></label></td>
									</tr>
									<tr height="10px"><td colspan="2"></td></tr>
									<tr>
									  <td height="42" colspan="2" align="center"><br><button class="btn-3" type="buttton" id="btn"><font size=4><strong>确 &nbsp;&nbsp;&nbsp;认</strong></font></button></td>
									</tr>
								</table> 
							</form>
						</center>
					</div>
				</td>
				<td align="center" width="100px">
					<span id="hint" style="display: none;"></span><br>
					<input type="button" value="==>" onClick="change()" id="changebtn" style="font-size: 20px; border: none; background: none; align-content: center;" onMouseMove="over()" onMouseOut="out()">
				</td>
				<td>
					<div style="display: none;" id="offline">
						<center>
							<form action="submit_online.php" method="post">
								<table>
									<tr>
										<td colspan="2"><h3 class="tittle">预约在线咨询</h3></td>
									</tr>
									<tr>
										<td align="center">
											<label for="" style="font-size: 20px;">请输入预约时间：<br>(格式：年-月-日-时间) <br>如2016-11-23-15:00</label><br><br>
											<input type="text" name="onlinedate" required="required">
										</td>
									</tr>
									<tr><td height="15"></td></tr>
									<tr>
									  <td height="42" align="center"><br>
									  <button class='btn-3' type='submit'><font size=4><strong>确 &nbsp;&nbsp;&nbsp; 认</strong></font></button>
									  </td>
									</tr>
								</table>
							</form>
						</center>
					</div>
				</td>
			</tr>
		</table>
</div>

		
		

	<!-- 根据时间选择 -->
	<form action="appoint_time.php" method="post" id="form_time" style="display:none">
		<center>
			<h2 id="h2.-bootstrap-heading">请选择时间：</h2><br>
			<input type="text" name="date" class="date_input">
			 <button class='btn-3' type='submit'><font size=4><strong>提&nbsp;&nbsp;&nbsp 交</strong></font></button>
		</center>
		<br><br><br><br><br>
	</form>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery.date_input.js"></script>
	<script type="text/javascript">$($.date_input.initialize);</script>

	<!-- 根据心理咨询师选择 -->
	<form action="appoint_teacher.php" id="form_teacher" method="post" style="display:none">
		<center>
			<h2 id="h2.-bootstrap-heading">有以下心理咨询师，请选择：</h2><br>
				<?php 
				$link = mysqli_connect('localhost','root','','project');
				mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
				$result = mysqli_query($link,"select * from appointment") or die(mysqli_error($link));
				if(mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
						$teacher=$row['teacher'];
						echo "
							<label><input type='radio' name='teacher' value=$teacher><FONT size=5>$teacher</FONT></label><br>
						";
					}
				}
				else{
					echo "没有心理咨询师";
				}
				mysqli_close($link);
				?>
				<br>
				 <button class='btn-3' type='submit'><font size=4><strong>提&nbsp;&nbsp;&nbsp;交</strong></font></button>
				<br><br><br><br><br>
		</center>
	</form>
	<script>
		$('#btn').click(function(){
			if(document.getElementById("time").checked){
				$('#form_teacher').fadeOut(150,function(){
					$('#form_time').fadeIn();
				});
			}
			else if(document.getElementById("teacher").checked){
				$('#form_time').fadeOut(150,function(){
					$('#form_teacher').fadeIn();
				});
			}
		});

		function change(){
			if(document.getElementById("changebtn").value == "==>"){
				$('#online').fadeOut(200,function(){
								$('#offline').fadeIn(200);
							});
					document.getElementById("changebtn").value = "<==";
				}
			else if(document.getElementById("changebtn").value == "<=="){
				$('#offline').fadeOut(200,function(){
								$('#online').fadeIn(200);
							});
					document.getElementById("changebtn").value = "==>";
				}
		}
		function over(){
			if(document.getElementById("changebtn").value == "==>")
				document.getElementById("hint").innerHTML = "线上预约"; 
			else
				document.getElementById("hint").innerHTML = "线下预约"; 
			$('#hint').fadeIn(300);
		}
		function out(){
			document.getElementById("hint").innerHTML = ""; 
			$('#hint').fadeOut(300);
		}
	</script>
	
</body>
</html>