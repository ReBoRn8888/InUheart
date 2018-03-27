<!DOCTYPE HTML>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/style3.css">
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <style type="text/css">
    .cell{
     
          vertical-align: middle;
          display: inline-block;
          line-height: 40px;
		  padding-right:30px;
    }
	.mid {margin:0 auto;width:720px;border:0;text-align:left;}
    </style>
	<script type="text/javascript">
	var num=1;
	function next()
	{
		var check=document.getElementsByName('a'+num);
		if (check[0].checked==false&&check[1].checked==false)
		{
			document.getElementById('hint').value="请先选择答案！"
			return false;
		}
		document.getElementById("upquestion").style.display ="block";
		var i="q"+num;
		if (num==3)
		{
			var r=document.getElementsByName('a3');
			if (r[0].checked)
			{
				num++;
			}
			else num=6;
		}
		else num++;
		var j="q"+num;
		document.getElementById(i).style.display = "none";
		document.getElementById(j).style.display = "block";
		document.getElementById('hint').value="";
		if (num==7||num==5) {document.getElementById("downquestion").style.display = "none";document.getElementById("submit").style.display = "block";}
	}
	function last()
	{
		document.getElementById("downquestion").style.display ="block";
		document.getElementById("submit").style.display = "none";
		var i="q"+num;
		if (num==6) num=3;
		else num--;
		var j="q"+num;
		document.getElementById(i).style.display = "none";
		document.getElementById(j).style.display = "block";
		document.getElementById('hint').value="";
		if (num==1) document.getElementById("upquestion").style.display = "none";
	}
	function showresult()
	{
		var check=document.getElementsByName('a'+num);
		if (check[0].checked==false&&check[1].checked==false)
		{
			document.getElementById('hint').value="请先选择答案！"
			return false;
		}
		var result1="";
		var result2="";
		var result3="";
		if (document.getElementsByName('a1')[0].checked) result1+="你不怕陷入困境，总是自信很安全。";
		if (document.getElementsByName('a1')[1].checked) result1+="你需要安全感，所以你很谨慎。";
		if (document.getElementsByName('a2')[0].checked) result1+="但你喜欢掩饰，重视别人对自己的看法。";
		if (document.getElementsByName('a2')[1].checked) result1+="同时你比较骄傲，喜欢出众，但内心存在孤独感。";
		if (document.getElementsByName('a2')[2].checked) result1+="并且你是快乐主义者，喜欢新奇的体验。";
		if (document.getElementsByName('a3')[0].checked) result2+="你内在理性强大，但这使你压抑与缺乏弹性。";
		if (document.getElementsByName('a3')[1].checked) result2+="你想隐藏自己，但完美主义的你不允许这样。";
		if (document.getElementsByName('a4')[0].checked) result2+="另一方面，你渴望被别人了解，却又怕别人看穿你的一切。";
		if (document.getElementsByName('a4')[1].checked) result2+="另一方面，你对烦心事不太在意。";
		if (document.getElementsByName('a5')[0].checked) result3+="最终，你妄图逃避自我认识，沉浸在宁静的生活中。";
		if (document.getElementsByName('a5')[1].checked) result3+="从而愿意分析并改善自己";
		if (document.getElementsByName('a6')[0].checked) result2+="另一方面，你总和别人保持亲密距离，却难以被理解。";
		if (document.getElementsByName('a6')[1].checked) result2+="另一方面，你希望立刻改变自己，遗忘以往的不愉快。";
		if (document.getElementsByName('a7')[0].checked) result3+="最后，你依赖他物，缺乏了解自己的勇气。";
		if (document.getElementsByName('a7')[1].checked) result3+="最后，你孤独且迷茫，还没找到自己的归属。";
		document.getElementById("res1").value=result1;
		document.getElementById("res2").value=result2;
		document.getElementById("res3").value=result3;
	}
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
<br>
<h1><center>趣味梦境测试</center></h1>
 <div class="grid_3 grid_5">
 <center>
			<div id="q1" style="display:block;" class="mid">
			<p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>1. 你正走在一个幽暗的林间，你更希望脚下是</li>
				</ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
            <p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a1' value='1' cindex='1' qid='3340' nindex='0' ></span><FONT size=4>一片松软的，有斑驳水草的沼泽</FONT></p>
			<p class='i_bot'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a1' value='2' cindex='1' qid='3340' nindex='0' ></span><FONT size=4>一条平滑，长满青苔的石板路</FONT></p></div></div></div>
			<div id="q2" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_2' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>2. 你小心地走过它，来到一座房屋前，那是你的家，你更希望你的家</li>
				</ol></FONT></b></p>
			<div class='sels_list'><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a2' value='1' cindex='2' qid='3341' nindex='0' ></span><FONT size=4>矗立在草坪上，完美且漂亮</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a2' value='2' cindex='2' qid='3341' nindex='0' ></span><FONT size=4>在森林的边缘，侧面是悬崖，底下是海面</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a2' value='3' cindex='2' qid='3341' nindex='0' ></span><FONT size=4>隐没在树林的深处，有几缕阳光照亮了它</FONT></p>
			<p class='i_bot'></p></div></div></div><div id='qindex_3' class='test_contents' ></div></div>
			<div id="q3" style="display:none;" class="mid">
			<p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>3. 你走进你的家，你更希望</li>
				</ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a3' value='1'  cindex='3' qid='3342' nindex='4' ></span><FONT size=4>迎面是一个宽大的客厅，冒热气的火炉和宽宽软软的长沙发</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a3' value='2'  cindex='3' qid='3342' nindex='6' ></span><FONT size=4>屋内光线弱，看不清摆设和家具，似乎零乱而布满灰尘</FONT></p></div>
			<p class='i_bot'></p></div></div>
			<div id="q4" style="display:none;" class="mid">
			<p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>4. 你坐在沙发上，你更希望</li>
				</ol></FONT></b></p><div class='sels_list'><div class='items'>
			<p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a4' value='1' cindex='4' qid='3343' nindex='0' ></span><FONT size=4>眼前是一个明亮的窗户，能很清楚的看到外面的风景，看到玫瑰色的鲜花和飞鸟。这时，你仿佛感觉屋子里有人，躲藏在阴影里，让你有点害怕</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a4' value='2' cindex='4' qid='3343' nindex='0' ></span><FONT size=4>你觉得这不像是你的家，你有了陌生的感觉，但一只小猫跑过来，依偎在你的怀抱里</FONT></p></div>
			</div></div>
			<div id="q5" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_5' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>5. 这时，你发现</li>
				</ol></FONT></b></p><div class='sels_list'><div class='items'>
			<p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a5' value='1' cindex='5' qid='3344' nindex='1' ></span><FONT size=4>你已处身在自然的怀抱中，躺在一片冷冰冰的草地上，房子消失了，但你并不急着去寻找</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a5' value='2' cindex='5' qid='3344' nindex='1' ></span><FONT size=4>自己躺下在自己的床上，有一个陌生的人说爱你，但你总是看不清他的脸</FONT></p></div>
			</div></div></div>
			<div id="q6" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_6' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>6. 你小心地走进去，你更愿意接受</li>
				</ol></FONT></b></p><div class='sels_list'><div class='items'>
			<p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a6' value='1' cindex='6' qid='3345' nindex='0' ></span><FONT size=4>迎面是一个窄小弯曲的楼梯通到楼上，很难的爬上楼梯，又有一个长长的走廊，伴着昏暗的灯光，你感觉有点窒息</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a6' value='2' cindex='6' qid='3345' nindex='0' ></span><FONT size=4>你希望休息一下，于是卷起袖子动手打扫屋子。你找到了一个凳子，上面的灰怎么拍也拍不掉，你只有小心的坐下</FONT></p></div>
			</div></div></div>
			<div id="q7" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_7' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>7. 你似乎不知道接下来要干什么，你好像是在找自己的卧室，有点不确定，但你最终还是来到一个房门前</li>
				</ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a7' value='1' cindex='7' qid='3346' nindex='1' ></span><FONT size=4>你想打开它，但打不开，它似乎卡住了，于是你想找个人来帮你打开门</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a7' value='2' cindex='7' qid='3346' nindex='1' ></span><FONT size=4>你勇敢的推开门，看到有一张双人床，占据了房间大部分空间，你很想躺下去，但内心提醒你说“这不是你的家，你走错了房间”，你掉头离开</FONT></p></div>
			<p class='i_bot'></p></div></div></div>
   </center>
</div>

			<div id="change" style="text-align:center; position:absolute; top:425px; height:200px; width:400px; margin-left:35%; left: 63px;">
				<span class="cell">
               <button class="btn-3" style="display: none;" type="buttton"class="test_btn" onClick="last();" id="upquestion"><font size=4><strong>上&nbsp;一&nbsp;题 </strong></font></button>
			  </span>
				<span class="cell">
				<button class="btn-3" style="display: block;" type="buttton" class="test_btn" onClick="next();" id="downquestion" ><font size=4><strong>下&nbsp;一&nbsp;题 </strong></font></button>
				</span>
				<span class="cell">
                <button class="btn-3"  style="display:none;" type="buttton" class="test_btn" onClick="showresult();" id="submit" ><font size=4><strong>提&nbsp;&nbsp;&nbsp;交 </strong></font></button>
				</span><br>
</div>
				<center>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <p>
				    <INPUT type="text" size=36 id='hint' readonly  style="border:none;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR: #f6b26b">
				    <br>
				    <br>
			       &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<INPUT type="text" size=75 id='res1' readonly  style="border:0;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR: #f6b26b">
				    <br>
			         &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; <INPUT type="text" size=90 id='res2' readonly  style="border:0;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR: #f6b26b">
				    <br>
			       &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <INPUT type="text" size=75 id='res3' readonly  style="border:0;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR: #f6b26b"">
		          </p>
</center>



</body>
</html>
