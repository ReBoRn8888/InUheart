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
	var upid=new Array();
	var lastid=0;
	upid[0]=1;
	function next()
	{
		var check=document.getElementsByName('a'+num);
		if (check[0].checked==false&&check[1].checked==false&&check[2].checked==false)
		{
			document.getElementById('hint').value="请先选择答案!";
			return false;
		}
		document.getElementById("upquestion").style.display ="block";
		upid[lastid]=num;
		lastid++;
		var i="q"+num;
		if (num==1)
		{
			var r=document.getElementsByName('a1');
			if (r[0].checked)
			{
				num=3;
			}
			else num++;
		}
		else if (num==2)
		{
			var r=document.getElementsByName('a2');
			if (r[1].checked)
			{
				num++;
			}
			else num=4;
		}
		else if (num==3)
		{
			var r=document.getElementsByName('a3');
			if (r[0].checked)
			{
				num++;
			}
			else if (r[1].checked)
			{
				num=5;
			}
			else num=6;
		}
		else if (num==4)
		{
			var r=document.getElementsByName('a4');
			if (r[2].checked)
			{
				num=6;
			}
			else num++;
		}
		else if (num==5)
		{
			var r=document.getElementsByName('a5');
			if (r[0].checked)
			{
				num++;
			}
			else if (r[1].checked)
			{
				num=7;
			}
			else num=8;
		}
		else if (num==6)
		{
			var r=document.getElementsByName('a6');
			if (r[1].checked)
			{
				num++;
			}
			else num=8;
		}
		else if (num==7)
		{
			var r=document.getElementsByName('a7');
			if (r[0].checked)
			{
				num++;
			}
			else if (r[1].checked)
			{
				num=10;
			}
			else num=9;
		}
		else if (num==8)
		{
			var r=document.getElementsByName('a8');
			if (r[2].checked)
			{
				num=10;
			}
			else num++;
		}
		else if (num==9)
		{
			var r=document.getElementsByName('a9');
			if (r[2].checked)
			{
				num=12;
			}
			else if (r[0].checked)
			{
				num=10;
			}
			else num=11;
		}
		else if (num==10)
		{
			var r=document.getElementsByName('a10');
			if (r[2].checked)
			{
				num=11;
			}
			else num=12;
		}
		else if (num==11)
		{
			var r=document.getElementsByName('a11');
			if (r[2].checked)
			{
				num=14;
			}
			else if (r[0].checked)
			{
				num=13;
			}
			else num=12;
		}
		else if (num==12)
		{
			var r=document.getElementsByName('a12');
			if (r[2].checked)
			{
				num=13;
			}
			else if (r[1].checked)
			{
				num=14;
			}
		}
		else if (num==13)
		{
			var r=document.getElementsByName('a13');
			if (r[0].checked)
			{
				num=14;
			}
			else if (r[1].checked)
			{
				num=15;
			}
		}
		var j="q"+num;
		document.getElementById(i).style.display = "none";
		document.getElementById(j).style.display = "block";
		document.getElementById('hint').value="";
		if (num==14||num==15) {document.getElementById("downquestion").style.display = "none";document.getElementById("submit").style.display = "block";}
	}
	function last()
	{
		document.getElementsByName('a'+num)[0].checked=document.getElementsByName('a'+num)[1].checked=document.getElementsByName('a'+num)[2].checked=false;
		document.getElementById("downquestion").style.display ="block";
		document.getElementById("submit").style.display = "none";
		var i="q"+num;
		num=upid[lastid-1];
		lastid--;
		var j="q"+num;
		document.getElementById(i).style.display = "none";
		document.getElementById(j).style.display = "block";
		document.getElementById('hint').value="";
		if (num==1) document.getElementById("upquestion").style.display = "none";
	}
	function showresult()
	{
		var check=document.getElementsByName('a'+num);
		if (check[0].checked==false&&check[1].checked==false&&check[2].checked==false)
		{
			document.getElementById('hint').value="请先选择答案！"
			return false;
		}
		document.getElementById('hint').value="";
		var result1="";
		var result2="";
		var result3="";
		if (num==12)
		{
			result1+="你的弱点在于同情心泛滥,很容易的便会被他人所感动，产生帮助的想法";
			result2+="尽管那样的你很善良，但现实的残酷往往会将你抛弃，你可能会被利用。";
			result3+="一定要学会区分，哪些人值得同情，哪些人只是在变相的对你进行掠夺。";
		}
		else if (num==13)
		{
			result1+="你的弱点在于太激进，生活行为缺乏张弛度。";
			result2+="有时速度太快了不一定是好事，任何成功都需要有个过程。";
			result3+="要相信只要你付出了辛勤的汗水，定会收获多多。";
		}
		else if (num==14) 
		{
			if (document.getElementsByName('a14')[0].checked) 
			{
				result1+="喜欢贪小便宜让你的形象大打折扣。";
				result2+="无论原因是什么，请都要看长远一点。";
				result3+="小聪明只会让你漏洞百出，谁都不是我们想象中的傻子。";
			}
			if (document.getElementsByName('a14')[1].checked) 
			{
				result1+="贪慕虚荣往往会让你的内心很受打击。";
				result2+="要知道人外有人，天外有天的道理亘古不变。";
				result3+="请抛弃那些身外之物，和自己的昨天比较。";
			}
			if (document.getElementsByName('a14')[2].checked) 
			{
				result1+="放下你习以为常的傲慢，身边就会出现很多机会。 ";
				result2+="真正的自信源于对自我的绝对信任，而不是对自卑的伪装。";
				result3+="放下高傲的态度，再多充实一下自己吧。";
			}
		}
		else if (num==15) 
		{
			if (document.getElementsByName('a15')[0].checked) 
			{
				result1+="你的弱点在于嫉妒心太重。";
				result2+="总是不自觉地让自己心理失衡，说白了一切痛苦都是自找的。";
				result3+="嫉妒是因为能力不足，强大自身才是正道。";
			}
			if (document.getElementsByName('a15')[1].checked) 
			{
				result1+="你不够宽容，所以显得有些难以接近，甚至脾气暴躁。";
				result2+="你之所以斤斤计较是因为害怕失去，但得失的事情又有谁能说得清呢?";
				result3+="不如坦然一点。增加亲和力，你的人生路会走得更好。 ";
			}
			if (document.getElementsByName('a15')[2].checked) 
			{
				result1+="你的弱点在于不够勤奋，缺乏实际行动。";
				result2+="总是抱怨世事不公，不如好好调整一下自己吧。";
				result3+="只有你的付出高于社会必要劳动时间，才会有真正的物质收获。 ";
			}
		}
		document.getElementById("res1").value=result1;
		document.getElementById("res2").value=result2;
		document.getElementById("res3").value=result3;
	}
	function finish()
	{
		if (num==12) 
		{
			document.getElementById("downquestion").style.display = "none";
			document.getElementById("submit").style.display = "block";
		}
		else if (num==13) 
		{
			document.getElementById("downquestion").style.display = "none";
			document.getElementById("submit").style.display = "block";
		}
	}
	function cencel()
	{
		document.getElementById("downquestion").style.display = "block";
		document.getElementById("submit").style.display = "none";
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
<h1><center>弱点测试</center></h1>
 <div class="grid_3 grid_5">
 <center>
			<div id="q1" style="display:block;" class="mid">
			<p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>1. 你喜欢绘画吗?</li>
				</ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
            <p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a1' value='1'  ></span><FONT size=4>喜欢</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a1' value='2'  ></span><FONT size=4>不喜欢</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a1' value='3'  ></span><FONT size=4>不置可否</FONT></p></div></div></div>
			<div id="q2" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_2' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>2. 如果一个女孩儿很嗲的对你说，“哇，我好好喜欢你哦。”你会有什么感觉?</li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a2' value='1' ></span><FONT size=4>这女孩儿也太假了</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a2' value='2' ></span><FONT size=4>这女孩儿好可爱</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a2' value='3' ></span><FONT size=4>没什么感觉，怎么说话是她的事情</FONT></p>
			</div></div>
			<div id="q3" style="display:none;" class="mid">
			<p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>3. 你最喜欢以下哪种绘画作品?</li></ol></FONT> </b></p><div class='sels_list'>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a3' value='1'   ></span><FONT size=4>国画</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a3' value='2'   ></span><FONT size=4>油画</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a3' value='3'   ></span><FONT size=4>漫画</FONT></p>
			</div></div>
			<div id="q4" style="display:none;" class="mid">
			<p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>4. 你经常熬夜吗?</li></ol></FONT></b></p><div class='sels_list'>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a4' value='1'  ></span><FONT size=4>经常</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a4' value='2'  ></span><FONT size=4>偶尔</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a4' value='3'  ></span><FONT size=4>从不</FONT></p>
			</div></div>
			<div id="q5" style="display:none;" class="mid">
			<div id='qindex_5' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>5. 你觉得自己是个美食家吗? </li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a5' value='1'  ></span><FONT size=4>是的</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a5' value='2'  ></span><FONT size=4>不是</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a5' value='3'  ></span><FONT size=4>不置可否</FONT></p>
			</div></div>
			<div id="q6" style="display:none;" class="mid">
			<div id='qindex_6' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>6. 你有找算命先生看相的经历吗?</li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a6' value='1'  ></span><FONT size=4>有</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a6' value='2'  ></span><FONT size=4>没有，但是有想过</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a6' value='3'  ></span><FONT size=4>没有，也不想</FONT></p>
			</div></div>
			<div id="q7" style="display:none;" class="mid">
			<div id='qindex_7' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>7. 你会到大型豪华影院去看电影吗?</li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a7' value='1'  ></span><FONT size=4>会</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a7' value='2'  ></span><FONT size=4>不会</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a7' value='3'  ></span><FONT size=4>不好说</FONT></p>
			</div></div>
			<div id="q8" style="display:none;" class="mid">
			<div id='qindex_8' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>8. 你觉得自己善于学习吗? </li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a8' value='1'  ></span><FONT size=4>我是个学习天才</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a8' value='2'  ></span><FONT size=4>我不善于学习</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a8' value='3'  ></span><FONT size=4>我只善于学习我感兴趣的东西</FONT></p>
			</div></div>
			<div id="q9" style="display:none;" class="mid">
			<div id='qindex_9' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>9. 你通常习惯使用哪只手?</li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a9' value='1'  ></span><FONT size=4>左手</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a9' value='2'  ></span><FONT size=4>右手</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a9' value='3'  ></span><FONT size=4>左右交替使用</FONT></p>
			</div></div>
			<div id="q10" style="display:none;" class="mid">
			<div id='qindex_10' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>10. 你对“整容”这件事怎么看?</li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a10' value='1'  ></span><FONT size=4>支持</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a10' value='2'  ></span><FONT size=4>反对</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a10' value='3'  ></span><FONT size=4>不反对，但也不会去尝试</FONT></p>
			</div></div>
			<div id="q11" style="display:none;" class="mid">
			<div id='qindex_11' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>11. 通常遇到街边乞讨的人你会怎么做? </li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a11' value='1'  ></span><FONT size=4>很同情的掏出钱来给他们</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a11' value='2'  ></span><FONT size=4>好奇的看着他们，心想会不会是骗人的</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a11' value='3' ></span><FONT size=4>看也不看他们，心想肯定是骗人的</FONT></p>
			</div></div>
			<div id="q12" style="display:none;" class="mid">
			<div id='qindex_12' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>12. 你喜欢吃方便面吗?</li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a12' value='1' onClick="finish();" ></span><FONT size=4>喜欢</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a12' value='2' onClick="cencel();" ></span><FONT size=4>不喜欢</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a12' value='3' onClick="cencel();" ></span><FONT size=4>有时喜欢有时不喜欢</FONT></p>
			</div></div>
			<div id="q13" style="display:none;" class="mid">
			<div id='qindex_13' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>13. 你经常一个人逛街吗?</li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a13' value='1' onClick="cencel();" ></span><FONT size=4>经常</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a13' value='2' onClick="cencel();" ></span><FONT size=4>偶尔</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a13' value='3' onClick="finish();" ></span><FONT size=4>从不</FONT></p>
			</div></div>
			<div id="q14" style="display:none;" class="mid">
			<div id='qindex_14' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>14. 你经常购买价格低廉的服饰吗? </li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a14' value='1'  ></span><FONT size=4>经常</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a14' value='2'  ></span><FONT size=4>偶尔</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a14' value='3' ></span><FONT size=4>从不</FONT></p>
			</div></div>
			<div id="q15" style="display:none;" class="mid">
			<div id='qindex_15' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>15. 如果有人称你为“宝贝”，你会怎样? </li></ol></FONT></b></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a15' value='1'  ></span><FONT size=4>我会很开心的接受这个称呼</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a15' value='2'  ></span><FONT size=4>我会很厌恶的拒绝这个称呼</FONT></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a15' value='3' ></span><FONT size=4>我没什么感觉，称呼只是一个代号</FONT></p>
			</div></div>
			

			<div id="change" style="text-align:center; position:absolute; top:415px; height:200px; width:400px; margin-left:35%; left: 81px;">
				<span class="cell">
				<button class="btn-3" style="display: none;" type="buttton"class="test_btn" onClick="last();" id="upquestion"><font size=4><strong>上&nbsp;一&nbsp;题 </strong></font></button>
			  </span>
				<span class="cell">
				<button class="btn-3" style="display: block;" type="buttton" class="test_btn" onClick="next();" id="downquestion" ><font size=4><strong>下&nbsp;一&nbsp;题 </strong></font></button>
				</span>
				<span class="cell">
                
				<button class="btn-3"  style="display:none;" type="buttton" class="test_btn" onClick="showresult();" id="submit" ><font size=4><strong>提&nbsp;&nbsp;&nbsp;交 </strong></font></button>
				</span><br>
				
			
				<INPUT type="text" size=20 id='hint' readonly  style="border:none;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR: #f6b26b"><br><br>
</div>
				<center>
				&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
				<p>&nbsp;</p>
		
			
			
				<table width="200" border="0" style="margin:6% 0 0 30%">
                  <tr>
                    <td>	
				  <INPUT type="text" size=75 id='res1' readonly  style="border:0;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR:#f6b26b">
				 
 <INPUT type="text" size=90 id='res2' readonly  style="border:0;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR:#f6b26b">

<INPUT type="text" size=75 id='res3' readonly  style="border:0;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR: #f6b26b">
</td>
                  </tr>
                </table>
				
				</center>


</body>
</html>