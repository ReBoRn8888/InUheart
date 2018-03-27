<?php session_start(); ?>

<html><head>
<meta http-equiv="Access-Control-Allow-Origin" content="*" charset=utf-8/>
    <title>在你心理-匿名聊天室</title>
    <script type="text/javascript">
    //WebSocket = null;
    </script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="css/bootstrap1.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Include these three JS files: -->
    <script type="text/javascript" src="/js/swfobject.js"></script>
    <script type="text/javascript" src="/js/web_socket.js"></script>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.min.js"></script> 
    <script type="text/javascript" src="jquery.qqFace.js"></script>
<?php 
			if(!isset($_GET["rank"]))
			{
				echo 	"<script>
							alert('请先登录~');
							history.back(-1);
						</script>";
			}
		?>
  <script type="text/javascript">
    if (typeof console == "undefined") {    this.console = { log: function (msg) {  } };}
    WEB_SOCKET_SWF_LOCATION = "/swf/WebSocketMain.swf";
    WEB_SOCKET_DEBUG = true;
    var ws, name, client_list={}, rank, number, judgemute, user, list;

    // 连接服务端
    function connect() {
    	
       // 创建websocket
       ws = new WebSocket("ws://"+document.domain+":7272");
       // 当socket连接打开时，输入用户名
       ws.onopen = onopen;
       // 当有消息时根据消息类型显示不同信息
       ws.onmessage = onmessage; 
       ws.onclose = function() {
    	  console.log("连接关闭，定时重连");
          connect();
       };
       ws.onerror = function() {
     	  console.log("出现错误");
       };
    }

    // 连接建立时发送登录信息
    function onopen()
    {
    	get_roomnumber();
    	// number = 2;
        rank = "<?php echo $_GET['rank']; ?>";
        if(!name)
        {
            show_prompt();
        }
        user = name;

        judgingmute();

        var login_data;
        login_data = '{"type":"login","client_name":"'+name.replace(/"/g, '\\"')+'","room_id":"<?php echo isset($_GET['room_id']) ? $_GET['room_id'] : 1?>"';
        
        // 登录
        // if(rank=="admin")
        // if(judgemute==1)
        // if(rank=="user")
        //     login_data = '{"type":"login","client_name":"'+name.replace(/"/g, '\\"')+'","room_id":"<?php echo isset($_GET['room_id']) ? $_GET['room_id'] : 1?>","mute":'+$mute_list+'}';
        // else 
        //login_data+=',"list":"'+list+'"}';
        if(list == "1")
        {
            login_data+='}';
        }
        else
        {
            login_data+=''+list+'}';
        }
        // else
        // 	login_data = '{"type":"login","client_name":"'+name.replace(/"/g, '\\"')+'","room_id":"<?php echo isset($_GET['room_id']) ? $_GET['room_id'] : 1?>"}';
        // else if(rank=="user")
        // 	login_data = '{"type":"login","client_name":"'+name.replace(/"/g, '\\"')+'","room_id":"<?php echo isset($_GET['room_id']) ? $_GET['room_id'] : 1?>"}';
        console.log("websocket握手成功，发送登录数据:"+login_data);
        ws.send(login_data);
    }

    // 服务端发来消息时
    function onmessage(e)
    {
        console.log("e.data = " + e.data);
        var data = eval("("+e.data+")");
        if(data[user]==1)
            judgemute = 1;
        else judgemute = 0;
        console.log("原来的rank:"+rank);
        switch(data['type']){
            // 服务端ping客户端
            case 'ping':
                ws.send('{"type":"pong"}');
                break;
            // 登录 更新用户列表
            case 'login':
                //{"type":"login","client_id":xxx,"client_name":"xxx","client_list":"[...]","time":"xxx"}
                say(data['client_id'], data['client_name'],  data['client_name']+' 加入了聊天室', data['time']);
                if(data['client_list'])
                {
                    client_list = data['client_list'];
                }
                else
                {
                    client_list[data['client_id']] = data['client_name'];
                }
                flush_client_list();
                console.log(data['client_name']+"登录成功");
                break;
            // 发言
            case 'say':
                //{"type":"say","from_client_id":xxx,"to_client_id":"all/client_id","content":"xxx","time":"xxx"}
                	say(data['from_client_id'], data['from_client_name'], data['content'], data['time']);
                break;
            // 用户退出 更新用户列表
            case 'logout':
                //{"type":"logout","client_id":xxx,"time":"xxx"}
                say(data['from_client_id'], data['from_client_name'], data['from_client_name']+' 退出了', data['time']);
                delete client_list[data['from_client_id']];
                flush_client_list();
        }
    }
    // 输入姓名
    function show_prompt(){  
        name = prompt('输入你的名字：（可不输）', '');
        if(!name || name=='null'){
            name = '游客';
        }
    }

    // 提交对话
    function onSubmit() {
    	if(judgemute==1){
    		alert("你已被管理员禁言");
    	}
    	else{
			var input = document.getElementById("textarea");
    		var to_client_id = $("#client_list option:selected").attr("value");
    		var to_client_name = $("#client_list option:selected").text();
    		ws.send('{"type":"say","to_client_id":"'+to_client_id+'","to_client_name":"'+to_client_name+'","content":"'+input.value.replace(/"/g, '\\"').replace(/\n/g,'\\n').replace(/\r/g, '\\r')+'"}');
    		console.log('提交对话：\n{"type":"say","to_client_id":"'+to_client_id+'","to_client_name":"'+to_client_name+'","content":"'+input.value.replace(/"/g, '\\"').replace(/\n/g,'\\n').replace(/\r/g, '\\r')+'"}');
    		input.value = "";
    		input.focus();
    	}
    }

    // 刷新用户列表框
    function flush_client_list(){
    	var userlist_window = $("#userlist");
    	var client_list_slelect = $("#client_list");
    	var room_list = $("#roomlist");
    	var mute_list = $("#mutelist");
    	
//        var rank = document.getElementById("rank").value;
        console.log("flush_client_list()中的rank=" + rank);
    	userlist_window.empty();
    	client_list_slelect.empty();
    	mute_list.empty();
    	userlist_window.append('<h4>在线用户</h4><ul>');
        userlist_window.append(rank);
        if(rank=="admin"){
        	$('#changeroom').fadeIn(1);
        	$('#roomnumber').fadeIn(1);
        }
        client_list_slelect.append('<option value="all" id="cli_all">所有人</option>');
    	for(var p in client_list){
            userlist_window.append('<li id="'+p+'">'+client_list[p]+'</li>');
            client_list_slelect.append('<option value="'+p+'">'+client_list[p]+'</option>');

            mute_list.append('<option value="'+client_list[p]+'">'+client_list[p]+'</option>');
        }

    	$("#client_list").val(select_client_id);
    	userlist_window.append('</ul>');
    	console.log("roomnumber = " + number);
    	get_roomnumber();
    	// alert(get_roomnumber());
    	if(number>0){
    		room_list.empty();
    		room_list.append('房间数：' + number);
    		room_list.append('&nbsp;&nbsp;&nbsp;&nbsp;<b>房间列表:</b>（当前在&nbsp;房间<?php echo isset($_GET['room_id'])&&intval($_GET['room_id'])>0 ? intval($_GET['room_id']):1; ?>）<br>')
    		for(var i = 1 ; i <= number ; i++){
	    		room_list.append('&nbsp;&nbsp;&nbsp;&nbsp;<a href="/?rank=' + rank + '&room_id=' + i + '">房间' + i + '</a>');
    		}
    		room_list.append('<br><br>');
    	}
    }

    // 发言
    function say(from_client_id, from_client_name, content, time){
    	$("#dialog").append('<div class="speech_item"><img src="http://lorempixel.com/38/38/?'+from_client_id+'" class="user_icon" /> '+from_client_name+' <br> '+time+'<div style="clear:both;"></div><p class="triangle-isosceles top">'+replace_em(content)+'</p> </div>');
        console.log("发言(say function)：\nfrom_client_name = " + from_client_name + "\ntime = " + time + "\ncontent = " + replace_em(content));
    }

    $(function(){
    	select_client_id = 'all';
	    $("#client_list").change(function(){
	         select_client_id = $("#client_list option:selected").attr("value");
	    });
    });

    function get_roomnumber(){
    	var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    	// alert(xmlhttp.responseText);
		    number=xmlhttp.responseText;
			// alert("reaponse = "+number);
		    }
		  }
		xmlhttp.open("POST","http://localhost:8080/InUheart/roomnumber_get.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
    }

    function mute()
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		var temp = document.getElementById("mutelist").value;
		xmlhttp.open("POST","http://localhost:8080/InUheart/mute.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("mute="+temp);
	}
	function unmute()
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		var temp = document.getElementById("mutelist").value;
		xmlhttp.open("POST","http://localhost:8080/InUheart/unmute.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("mute="+temp);
	}
    
	function change(){
		number=prompt("请输入房间数","roomnumber");
		if (number!=null && number!=""){
			update1();
			// alert(room);
		} 
	}
	function update1()
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.open("POST","http://localhost:8080/InUheart/roomnumber_update.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("roomnumber="+number);
		location.reload(true);
	}
	function judgingmute(){
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    	// alert(xmlhttp.responseText);
		    list = xmlhttp.responseText;
            console.log("list = " + list);
			// alert("judgemute return = "+typeof(judgemute));
		    }
		  }
		xmlhttp.open("POST","http://localhost:8080/InUheart/mute_list.php",false);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("user="+user);
	}
  </script>
  <style type="text/css">
        .qqFace { margin-top: 4px; background: #fff; padding: 2px; border: 1px #dfe6f6 solid; }
        .qqFace table td { padding: 0px; }
        .qqFace table td img { cursor: pointer; border: 1px #fff solid; }
        .qqFace table td img:hover { border: 1px #0066cc solid; }
        .emotion{
            float: right;
            background-image:url("arclist/face.png");
            height: 25px;
            width: 25px;
        } 
        .emotion:hover{
            float: right;
            background-image:url("arclist/face_hover.png");
            height: 25px;
            width: 25px;
        }
  </style>
</head>
<body style="background-image:url(/images/bg.jpg);background-position:center; background-repeat:repeat-y" onLoad="connect();">
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
										<a class="navbar-brand" href="http://localhost:8080/InUheart/judge.php"><span>In</span><i>Uheart</i></a>
									</h1>
								</div>
								
							</nav>
			</div>
		</div>
</div>
<!-- <input type="hidden" id='get' name="get" /> -->
    <span id="getnum"></div>
    <div class="container">
	    <div class="row clearfix">
	        <div class="col-md-1 column">
	        </div>
	        <div class="col-md-6 column">
	           <div class="thumbnail">
	               <div class="caption" id="dialog"></div>
	           </div>
	           <form onSubmit="onSubmit(); return false;">
	                <select style="margin-bottom:8px" id="client_list">
                        <option value="all">所有人</option>
                    </select>
                    <div class="emotion"></div>
                    <textarea class="textarea thumbnail" id="textarea"></textarea>
                    <div class="say-btn"><input type="submit" class="btn btn-default" value="发表" /></div>
               </form>
               <div id="roomlist">
               <!-- &nbsp;&nbsp;&nbsp;&nbsp;<b>房间列表:</b>（当前在&nbsp;房间<?php echo isset($_GET['room_id'])&&intval($_GET['room_id'])>0 ? intval($_GET['room_id']):1; ?>）<br>
               &nbsp;&nbsp;&nbsp;&nbsp;<a href="/?room_id=1">房间1</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/?room_id=2">房间2</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/?room_id=3">房间3</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/?room_id=4">房间4</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/?room_id=5">房间5</a>
               <br><br> -->
               </div>

	        </div>
	        <div class="col-md-3 column">
	           <div class="thumbnail">
                   <div class="caption" id="userlist"></div>
                   <button onClick="change()" id="changeroom" style="display: none">更改房间数</button><br>
                   		<form action="#" method="post" id="roomnumber" style="display: none">
                   	<!-- <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> -->
                   			请选择要禁言的用户:
                   			<select style="margin-bottom:8px" id="mutelist" name="mutelist">
                   	 		    
                   	 		</select><br>
                   	 		<!-- <input type="hidden" name="back" id="back" value="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"/> -->
                   	 		<input type="submit" value="禁言" onClick="mute()">
                   	 		<input type="submit" value="取消禁言" onClick="unmute()">
                   	 		<!-- <button onclick="btn()">update</button> -->
                   	    </form>
               </div>
	        </div>
	    </div>
    </div>
    <script type="text/javascript">var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F7b1919221e89d2aa5711e4deb935debd' type='text/javascript'%3E%3C/script%3E"));</script>
    <script type="text/javascript">
        $(function(){ 
            $('.emotion').qqFace({ 
                assign:'textarea', //给输入框赋值 
                path:'arclist/'    //表情图片存放的路径 
            }); 
        });
        function replace_em(str){
            str = str.replace(/\</g,'&lt;');
            str = str.replace(/\>/g,'&gt;');
            str = str.replace(/\n/g,'<br/>');
            str = str.replace(/\[em_([0-9]*)\]/g,'<img src="arclist/$1.gif" border="0" />');
            return str;
        }
    </script>
</body>
</html>
