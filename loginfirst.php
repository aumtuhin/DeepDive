<?php
  session_start();
  if (isset($_SESSION['user'])) {
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tech-Connect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Khula" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <div class="login-section">
      <a href="index.php">
        <div class="logo">
          <img src="img\logo.png" alt="">
          <h2>Deep<span class="logo-span">Dive</span></h2>
        </div>
      </a>
      <form class="login-form" action="login.php" method="post">
        <input class="login-input" type="text" name="username" placeholder="username"><br>
        <input class="login-input" type="password" name="pass"  placeholder="Password"><br>
        <input id="check" class="remember-me" type="checkbox" name="remember" value="check"><label class="remember" for="check">Remember Me</label><br>
        <button class="login-btn" type="submit" name="submit">Signin</button>
      </form>
      <p><a href="#">Forget your password?</a></p>
    </div>
  </body>
</html>
