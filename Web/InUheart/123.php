

<!doctype html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="author" content="jQuery插件库(www.jq22.com)">

<meta name="weburl" content="http://www.jq22.com/">
<script type="text/javascript" src="jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="jquery.qqFace.js"></script>
	<title>基于jQuery开发的全能表单验证插件</title>
<style>
	.comment{width:680px; margin:20px auto; position:relative} 
.comment h3{height:28px; line-height:28px} 
.com_form{width:100%; position:relative} 
.input{width:99%; height:60px; border:1px solid #ccc} 
.com_form p{height:28px; line-height:28px; position:relative} 
span.emotion{width:42px; height:20px; background:url(icon.gif) no-repeat 2px 2px;  
padding-left:20px; cursor:pointer} 
span.emotion:hover{background-position:2px -28px} 
.qqFace{margin-top:4px;background:#fff;padding:2px;border:1px #dfe6f6 solid;} 
.qqFace table td{padding:0px;} 
.qqFace table td img{cursor:pointer;border:1px #fff solid;} 
.qqFace table td img:hover{border:1px #0066cc solid;} 
#show{width:680px; margin:20px auto}
</style>

</head>

<body>
<div id="show"></div> 
<div class="comment"> 
    <div class="com_form"> 
        
        <p><span class="emotion">表情</span><input type="button" class="sub_btn" value="提交"></p> 
    </div> 
</div>

</body>

<script  src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.qqFace.js"></script>

<script type="text/javascript">

$(function(){

	$('.emotion').qqFace({

		id : 'facebox', 

		assign:'saytext', 

		path:'arclist/'	//表情存放的路径

	});

	$(".sub_btn").click(function(){

		var str = $("#saytext").val();

		$("#show").html(replace_em(str));

	});

});

//查看结果

function replace_em(str){

	str = str.replace(/\</g,'&lt;');

	str = str.replace(/\>/g,'&gt;');

	str = str.replace(/\n/g,'<br/>');

	str = str.replace(/\[em_([0-9]*)\]/g,'<img src="arclist/$1.gif" border="0" />');

	return str;

}

</script>

<script src="http://www.jq22.com/js/jq.js"></script>

</html>









  

  