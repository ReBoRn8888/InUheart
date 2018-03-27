 <?php 
  	header("Access-Control-Allow-Origin: http://localhost:8081");

    if(isset($_POST['roomnumber']))
        $roomnumber = $_POST['roomnumber'];
    $link = mysqli_connect('localhost','root','','project');
    mysqli_select_db($link,'project');
    mysqli_query($link,"update room set roomnumber=$roomnumber where ID=1");
    mysqli_close($link);
?>