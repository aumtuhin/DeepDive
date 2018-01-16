<?php
  session_start();
  require('function.php');
  $conn = dbcon();
  if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    $password = md5($password);
    $query = "SELECT * FROM user WHERE username='$username' AND password = '$password'";
    $sql = mysqli_query($conn,$query);

    if($row = $sql->fetch_assoc()) {
      $_SESSION['user'] = $row['userid'];
      if (!empty($_POST['remember'])) {
        setcookie ("member_login",$username,time()+ (86400 * 30),"/");
        setcookie ("member_password",$password,time()+ (86400 * 30),"/");
        echo $_POST['remember'];
      }
      else {
        if (isset($_COOKIE["member_login"])) {
          setcookie ("member_login","");
        }
        if (isset($_COOKIE["member_password"])) {
          setcookie ("member_password","");
        }
        else {
          echo "Invalid username or password";
        }
      }
      header('location:userprofile.php');
      exit();
    }
    else {
      echo '<h3  style="color:red;text-align:center;margin-top:40px;">Invalid username password</h3>';
    }
  }
?>
