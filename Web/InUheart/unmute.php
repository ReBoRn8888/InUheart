 <?php 
  	header("Access-Control-Allow-Origin: http://localhost:8081");

    if(isset($_POST['mute']))
        $mute = $_POST['mute'];
    $link = mysqli_connect('localhost','root','','project');
    mysqli_select_db($link,'project');
    mysqli_query($link,"delete from mute where user='$mute'");
    mysqli_close($link);
?>