<!DOCTYPE html>
<html>
<head>
	<title>update</title>
	<meta charset="UTF-8">
</head>
<body>
	<?php 
	if(!isset($_POST['select'])){
		echo "	<script>
					alert('请选择一条预约');
					location.href='teacher_manage_appointment.php';
				</script>";
	}
	else{
		$select=$_POST['select'];
		if(isset($_POST['complete']))$judge="complete";
		if(isset($_POST['accept']))$judge="accept";
		if(isset($_POST['unaccept']))$judge="unaccept";
		if(isset($_POST['uncomplete']))$judge="uncomplete";
		
		$link = mysqli_connect('localhost','root','','project');
		mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
		if($judge=="accept")
			mysqli_query($link,"update appoint_result set Accept=1 where ID=$select") or die(mysqli_error($link));
		else if($judge=="complete")
			mysqli_query($link,"update appoint_result set Complete=1 where ID=$select") or die(mysqli_error($link));
		else if($judge=="unaccept")
			mysqli_query($link,"update appoint_result set accept=0 where ID=$select") or die(mysqli_error($link));
		else if($judge=="uncomplete")
			mysqli_query($link,"update appoint_result set Complete=0 where ID=$select") or die(mysqli_error($link));
	}
	mysqli_close($link);
	echo "<script>location.href='teacher_manage_appointment.php';</script>";
	?>
	
</body>
</html>