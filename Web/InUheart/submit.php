<!DOCTYPE html>
<html>
<head>
	<title>提交</title>
	<meta charset="UTF-8">
</head>
<body>
	<?php 
	$userid=$_COOKIE['userid'];

	//连接数据库
	$link = mysqli_connect('localhost','root','','project');
	mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));

	$select=$_POST['select'];
	$information=$_POST['information'];

	$result = mysqli_query($link,"select * from appoint_result where UserID=$userid and AppointID=$select") or die(mysqli_error($link));
	if(mysqli_num_rows($result)>0){			//已经预约了这个点
		echo "<script>
				alert('您已经预约了这个时间点，请选择其他预约！');
				history.back(-1);
			  </script>";
	}
	else{			//还未预约这个点
		//insert语句
		$result = mysqli_query($link,"insert into appoint_result(UserID,AppointID,Information) values($userid,$select,'$information')") or die(mysqli_error($link));
		if($result)
    	{
        	echo "<script>
        		  alert('预约成功！');
        		  location.href='appoint_select.php'
        		  </script>";
    	}
    	else
    	{
        	echo "<script>
        		  alert('出错，请重试！');
        		  history.back(-1);
        		  </script>";
    	}
	}
	
    mysqli_close($link);
	?>
</body>
</html>