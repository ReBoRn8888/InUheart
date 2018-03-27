<?php 
    header("Access-Control-Allow-Origin: http://localhost:8081");

    $link = mysqli_connect('localhost','root','','project');
    mysqli_select_db($link,'project') or die('Cannot connect to db:'.mysqli_error($link));
    $result = mysqli_query($link,"select * from mute") or die(mysqli_error($link));
    if(mysqli_num_rows($result)>0){
        $list = "";
        while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
            $user = $row['user'];
            $list=$list.",\"".$user."\":\"1\"";
        }
        echo $list;
    }
    else
        echo "1";
    mysqli_close($link);
?>