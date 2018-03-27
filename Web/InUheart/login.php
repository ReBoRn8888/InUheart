<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <?php
  $name=$_POST["Username"];
  $pass=$_POST["Password"];
  $rank=$_POST['Rank'];
  $con = mysqli_connect('localhost','root','','project');
  if (!$con)
    {
    die('Could not connect: ' . mysqli_error());
    }
  mysqli_select_db($con,"project");
  
  
  if($rank=="User"){
    $result = mysqli_query($con,"SELECT * FROM user where Rank='user'");

  }
  else if($rank=="Admin"){
    $result = mysqli_query($con,"SELECT * FROM user where Rank='admin'");
  }

  $a = 0;
  
  while($row = mysqli_fetch_array($result,MYSQLI_BOTH))
    {
    if (((strcmp($name,$row['Username'])==0)&&(strcmp($pass,$row['Password'])==0))||((strcmp($name,$row['Schoolnumber'])==0)&&(strcmp($pass,$row['Password'])==0)))
    {
      $a = 1;
      $userid = $row['ID'];
      $username = $row['Username'];
      break;
    }
  }
  

  if ($a==1) 
  {
    setcookie('userid', $userid);
    setcookie('username', $username);
    setcookie('rank', $rank);
   
    if($rank=="User"){
      setcookie('rank', "user");
      echo "<script>alert('用户登录成功');location.href='user_home.php';</script>";
    }
    else if($rank=="Admin"){
      setcookie('rank', "admin");
      echo "<script>alert('管理员登录成功');location.href='teacher_home.php';</script>";
    }

  }
  else{
    echo "<script>alert('用户名或密码错误，请重试');location.href='index.html';</script>";
  }
  mysqli_close($con);
  ?>
</body>
</html>

