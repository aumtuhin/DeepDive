<?php
  session_start();
  require '../function.php';
  $conn = dbcon();
  if (isset($_SESSION['adminid'])) {
    header('location:adminhome.php');
  }

  $error = "";
  if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);

    $query = "SELECT * FROM admin WHERE adusername='$username' AND password = '$password'";
    $sql = mysqli_query($conn,$query);

    if($row = $sql->fetch_assoc()) {
      $_SESSION['adminid'] = $row['adminid'];
      $_SESSION['adusername'] = $row['adusername'];
      header('location: adminhome.php');
      exit();
    }
    else {
      $error = "Invalid username password";
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tech-Connect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Khula" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
  </head>
  <body>
    <div class="login-section">
      <a href="adminhome.php">
        <div class="logo">
          <img src="../img/logo.png" alt="">
          <h2>Admin<span class="logo-span">Panel</span></h2>
        </div>
      </a>
      <label style="color:red" for="error"><?php echo $error ?></label>
      <form class="login-form" action="adminlogin.php" method="post">
        <input class="login-input" type="text" name="username" placeholder="username" value="aumtuhin"><br>
        <input class="login-input" type="password" name="pass"  placeholder="Password" value="12345"><br>
        <button class="login-btn" type="submit" name="submit">Signin</button>
      </form>
      <p><a href="#">Forget your password?</a></p>
    </div>
  </body>
</html>
