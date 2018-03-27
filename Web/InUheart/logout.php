
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="Expires" CONTENT="0"> 
	<meta http-equiv="Cache-Control" CONTENT="no-cache"> 
	<meta http-equiv="Pragma" CONTENT="no-cache">
</head>
<body>
	<?php 
		setcookie("userid", "", time() - 3600);
		setcookie("username", "", time() - 3600);
		setcookie("rank", "", time() - 3600);
		header("Cache-Control: no-cache, must-revalidate");
		echo "<script>alert('注销成功');location.replace('index.html');history.forward(2);</script>";
	?>

</body>
</html>

