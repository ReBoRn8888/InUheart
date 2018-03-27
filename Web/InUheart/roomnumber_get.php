 <?php 
 	header("Access-Control-Allow-Origin: http://localhost:8081");
 	// response.setHeader("Access-Control-Allow-Origin", "*");
 	// header("Access-Control-Allow-Origin：*");
    $link = mysqli_connect('localhost','root','','project');
	mysqli_select_db($link,'project');
	$result = mysqli_query($link,"select * from room where ID=1");
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
			$teacher=$row['roomnumber'];
			echo $teacher;
		}
	}
	mysqli_close($link);
 // echo "<h1>hello</h1>";
?>