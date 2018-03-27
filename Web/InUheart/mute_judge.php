 <?php 
 	header("Access-Control-Allow-Origin: http://localhost:8081");

 	if(isset($_POST['user']))
        $user = $_POST['user'];
    $link = mysqli_connect('localhost','root','','project');
	mysqli_select_db($link,'project');
	$result = mysqli_query($link,"select * from mute where user='$user'");
	if(mysqli_num_rows($result)>0)
		echo "1";
	else 
		echo "0";
	mysqli_close($link);
 // echo "<h1>hello</h1>";
?>