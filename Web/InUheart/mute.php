 <?php 
  	header("Access-Control-Allow-Origin: http://localhost:8081");

    if(isset($_POST['mute']))
        $mute = $_POST['mute'];
    $link = mysqli_connect('localhost','root','','project');
    mysqli_select_db($link,'project');
    mysqli_query($link,"insert into mute(user) values ('$mute')");
    mysqli_close($link);
?>