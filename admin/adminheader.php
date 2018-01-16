<?php
   if (!isset($_SESSION['adusername'])) {
     header('location: adminlogin.php');
   }
   if (isset($_POST['logout'])) {
     session_start();
     session_unset();
     session_destroy();
     header('location:adminlogin.php');
   }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DeepDive Helper Forum</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/flaticon.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/adstyle.css">
  </head>
  <style>
    .btn .btn-link{
      text-decoration: none;
      text-align: center;
      margin: auto;
      display: inline-block;
    }
    .btn .btn-link:hover{
      text-decoration: none;
    }
  </style>
  <body>

    <section id="header">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="adminhome.php">
              <div class="">
                <img src="../img/dashboard.png" alt="">
              </div>
            </a>
            <!-- <a class="navbar-brand" href="#"><i class="flaticon-facebook-messenger-logo"></i></a> -->
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="deletepost.php">Delete Posts</a></li>
              <li><a href="adminhome.php">Delete Users</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['adusername']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu text-center">
                  <li class="text-center">
                    <form action="adminheader.php" method="post">
                      <button class="btn btn-info logout" type="submit" name="logout">Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </section>
