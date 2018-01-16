<?php
  session_start();
  require('function.php');
  $conn = dbcon();
  if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $username =  mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    $password = md5($password);

    $query = "INSERT INTO user (name,username,email,password) VALUES ('$name','$username','$email','$password')";
    $sql = mysqli_query($conn,$query);
    if (!$sql) {
      echo "error";
    }
    else {
      $sql = "SELECT * FROM user WHERE username = '$username'";
      $query = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($query);
      $_SESSION['user'] = $row['userid'];
      header('location:userprofile.php');
      exit();
    }
  }
?>
