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
		if (check[0].checked==false&&check[1].checked==false)
		{
			document.getElementById('hint').value="请先选择答案！"
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
				num++;
			}
			else num=3;
		}
		else if (num==2)
		{
			var r=document.getElementsByName('a2');
			if (r[0].checked)
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
			else num=5;
		}
		else if (num==4)
		{
			var r=document.getElementsByName('a4');
			if (r[0].checked)
			{
				num++;
			}
			else num=6;
		}
		else if (num==5)
		{
			var r=document.getElementsByName('a5');
			if (r[0].checked)
			{
				num++;
			}
			else num=7;
		}
		else if (num==6)
		{
			var r=document.getElementsByName('a6');
			if (r[0].checked)
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
			else num=9;
		}
		else if (num==8)
		{
			var r=document.getElementsByName('a8');
			if (r[0].checked)
			{
				num++;
			}
			else num=10;
		}
		var j="q"+num;
		document.getElementById(i).style.display = "none";
		document.getElementById(j).style.display = "block";
		document.getElementById('hint').value="";
		if (num==9||num==10) {document.getElementById("downquestion").style.display = "none";document.getElementById("submit").style.display = "block";}
	}
	function last()
	{
		document.getElementsByName('a'+num)[0].checked=document.getElementsByName('a'+num)[1].checked=false;
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
		if (check[0].checked==false&&check[1].checked==false)
		{
			document.getElementById('hint').value="请先选择答案！"
			return false;
		}
		var result1="";
		var result2="";
		var result3="";
		if (num==9) 
		{
			if (document.getElementsByName('a9')[0].checked) 
			{
				result1+="你是典型的心理素质不好，在对方气场比你强大的时候，你就容易紧张和不安。";
				result2+="这个时候你本来准备好的腹稿也都统统消失，大脑一片空白。";
				result3+="最终导致你只能顺着别人的意思说，无法真正展示自己的想法。";
			}
			if (document.getElementsByName('a9')[1].checked) 
			{
				result1+="你有着典型的过度忧虑，很怕别人质疑你能力和水平。";
				result2+="所以一旦你在工作上出现什么纰漏，你就会非常的不好意思。";
				result3+="生怕别人因一点失误看不起你，更怕自己就此被全盘否定。";
			}
		}
		else if (num==10) 
		{
			if (document.getElementsByName('a10')[0].checked) 
			{
				result1+="不管你在工作上多么的老练和圆滑，还是无法克服你在喜欢的人面前的害羞和不自信。";
				result2+="害怕自己不够好害怕自己不够完美，却又觉得自己凭什么要这样紧张。";
				result3+="最终使得自己无法大方的进行正常的沟通与交流。";
			}
			if (document.getElementsByName('a10')[1].checked) 
			{
				result1+="你一般不会紧张，因为你更多的时候都在关心自己的情绪、表现和观点。";
				result2+="很少去揣摩别人的心思，你总是这么做，这对你来说是一件好事。";
				result3+="这样你能保留更多的个性和想法，也不会受到别人很多负面的影响。";
			}
		}
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
<h1><center>紧张测试</center></h1>
 <div class="grid_3 grid_5">
 <center>
	<div id="q1" style="display:block;" class="mid">
			<p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>1. 你很容易发火，但是很快就可以平静下来？</li></ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
            <p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a1' value='1' cindex='1' qid='3340' nindex='0' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a1' value='2' cindex='1' qid='3340' nindex='0' ></span><FONT size=4>不是</FONT></p></div></div></div>
			<div id="q2" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_2' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>2. 愤怒的时候会口不择言？</li></ol></FONT></b></p>
			<div class='sels_list'><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a2' value='1' cindex='2' qid='3341' nindex='0' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a2' value='2' cindex='2' qid='3341' nindex='0' ></span><FONT size=4>不是</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p>
			</div></div></div></div>
			<div id="q3" style="display:none;" class="mid">
			<p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>3. 有的时候却表现出相当能忍耐？</li></ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a3' value='1'  cindex='3' qid='3342' nindex='4' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a3' value='2'  cindex='3' qid='3342' nindex='6' ></span><FONT size=4>不是</FONT></p></div>
			<p class='i_bot'></p></div></div>
			<div id="q4" style="display:none;" class="mid">
			<p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>4. 讨厌繁琐无聊的工作，没办法集中精力?</li></ol></FONT></b></p><div class='sels_list'><div class='items'>
			<p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a4' value='1' cindex='4' qid='3343' nindex='0' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a4' value='2' cindex='4' qid='3343' nindex='0' ></span><FONT size=4>不是</FONT></p></div>
			</div></div>
			<div id="q5" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_5' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>5. 总是很疲惫?</li></ol></FONT></b></p><div class='sels_list'><div class='items'>
			<p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a5' value='1' cindex='5' qid='3344' nindex='1' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a5' value='2' cindex='5' qid='3344' nindex='1' ></span><FONT size=4>不是</FONT></p></div>
			</div></div></div>
			<div id="q6" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_6' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>6. 经常担心还没有发生的事?</li></ol></FONT></b></p><div class='sels_list'><div class='items'>
			<p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a6' value='1' cindex='6' qid='3345' nindex='0' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a6' value='2' cindex='6' qid='3345' nindex='0' ></span><FONT size=4>不是</FONT></p></div>
			</div></div></div>
			<div id="q7" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_7' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>7. 不擅长数理逻辑，不喜欢玩数字游戏?</li></ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a7' value='1' cindex='7' qid='3346' nindex='1' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a7' value='2' cindex='7' qid='3346' nindex='1' ></span><FONT size=4>不是</FONT></p></div>
			<p class='i_bot'></p></div></div></div>
			<div id="q8" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_8' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>8. 总是觉得自己说错了话，但说话的时候总忘记考虑再三?</li></ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a8' value='1' cindex='8' qid='3346' nindex='1' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a8' value='2' cindex='8' qid='3347' nindex='1' ></span><FONT size=4>不是</FONT></p></div>
			<p class='i_bot'></p></div></div></div>
			<div id="q9" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_9' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>9. 在外面衣着光鲜，家里一团糟?</li></ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a9' value='1' cindex='9' qid='3346' nindex='1' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a9' value='2' cindex='9' qid='3348' nindex='1' ></span><FONT size=4>不是</FONT></p></div>
			<p class='i_bot'></p></div></div></div>
			<div id="q10" style="display:none;" class="mid">
			<p class='i_bot'></p><div id='qindex_10' class='test_contents' ><p class='descs fb'><b><ol class="breadcrumb"><li class="active"><FONT size=4>10. 任何时候，都在观察别人的情绪和细微的变化?</li></ol></FONT></b></p><div class='sels_list'><div class='items'><p class='i_top'></p>
			<p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a10' value='1' cindex='10' qid='3346' nindex='1' ></span><FONT size=4>是的</FONT></p>
			<p class='i_bot'></p></div><div class='items'><p class='i_top'></p><p class='i_mid'><span class='sels'>&nbsp <input type='radio' name='a10' value='2' cindex='10' qid='3348' nindex='1' ></span><FONT size=4>不是</FONT></p></div>
			<p class='i_bot'></p></div></div></div>
			

			<div id="change" style="text-align:center; position:absolute; top:389px; height:200px; width:400px; margin-left:35%; left: 39px;" align="center">
				<span class="cell">
             
				<button class="btn-3"style="display:none;" type="buttton"class="test_btn" onClick="last();" id="upquestion"><font size=4><strong>上&nbsp;一&nbsp;题 </strong></font></button>
			  </span>
				<span class="cell">
				<button class="btn-3"  style="display: block;"type="buttton" class="test_btn" onClick="next();" id="downquestion" ><font size=4><strong>下&nbsp;一&nbsp;题 </strong></font></button>
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
				  <INPUT type="text" size=75 id='res1' readonly  style="border:0;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR: #f6b26b">
<INPUT type="text" size=90 id='res2' readonly  style="border:0;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR: #f6b26b">
<INPUT type="text" size=75 id='res3' readonly  style="border:0;FONT-FAMILY:微软雅黑;FONT-SIZE:24px;COLOR: #f6b26b">
               </td>
                  </tr>
                </table>
				
				</center>


</body>
</html>
