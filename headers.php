<?php
  if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DeepDive Helper Forum</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <style>
    .btn .btn-link{
      text-decoration: none;
      text-align: center;
      margin: auto;
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
            <a class="navbar-brand" href="index.php">
              <div class="">
                <img src="img/logo.png" alt="">
              </div>
            </a>
            <!-- <a class="navbar-brand" href="#"><i class="flaticon-facebook-messenger-logo"></i></a> -->
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">Home</a></li>
              <li><a href="newpost.php">Ask a question</a></li>
              <li><a href="topics.php">Support Topics</a></li>
              <?php
                if (isset($_SESSION['user']) == false) {

               ?>
              <li><a href="#" data-toggle="modal" data-target="#signup">Create Account</a></li>
              <li><a href="" data-toggle="modal" data-target="#login"><span class="login-icon"><i class="fa fa-lock" aria-hidden="true"></i></span>Login</a></li>
              <?php } else {

              ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Profile <span class="caret"></span></a>
                <ul class="dropdown-menu text-center">
                  <li><a href="userprofile.php">View Profile</a></li>
                  <li><a href="newpost.php">Post a question</a></li>
                  <li><a href="editprofile.php">Eidit Profile</a></li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <form action="headers.php" method="post">
                      <button class="btn btn-link logout" type="submit" name="logout">Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
              <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </section>
    <!--signup-->
     <div class="container">
       <!-- Modal -->
       <div class="modal fade" id="signup" role="dialog">
         <div class="modal-dialog">

           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Creat account</h4>
             </div>
             <div class="modal-body">
               <form id="reg_form" action="signup.php" method="POST">
                 <div class="form-group">
                   <span class="signup-error" id="errorname">Name length must be 5! No special chars allowed</span>
                   <input type="text" class="form-control" id="form_name" placeholder="Full Name" name="name">
                 </div>
                 <div class="form-group">
                    <span class="signup-error" id="errorusername">username al least 5 chars</span>
                   <input type="text" class="form-control" id="form_username" placeholder="Username" name="username">
                 </div>
                 <div class="form-group">
                    <span class="signup-error" id="erroremail">Invalid email format</span>
                   <input type="email" class="form-control" id="form_email" placeholder="Email" name="email">
                 </div>
                 <div class="form-group">
                    <span class="signup-error" id="errorpass">Pasword must 6 chars</span>
                   <input type="password" class="form-control" id="form_pwd" placeholder="Password" name="pass">
                 </div>
                 <div class="form-group">
                    <span class="signup-error" id="errorconpass">Password not match</span>
                   <input type="password" class="form-control" id="form_conpwd" placeholder="Confirm password">
                 </div>
                 <button type="submit" class="btn btn-default" name="submit">Signup</button>
               </form>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
           </div>
         </div>
       </div>
     </div>

     <!--login-->
     <div class="container">
       <!-- Modal -->
       <div class="modal fade" id="login" role="dialog">
         <div class="modal-dialog">

           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Login</h4>
             </div>
             <div class="modal-body">
               <form id="reg_form" action="login.php" method="POST">
                 <div class="form-group">
                   <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                 </div>
                 <div class="form-group">
                   <input type="password" class="form-control" id="pwd" placeholder="Password" name="pass">
                 </div>
                 <div class="form-group">
                    <label style="cursor:pointer; color:grey;"><input type="checkbox" name="remember" value="check"> Remember me</label>
                 </div>
                 <button type="submit" class="btn btn-default" name="submit">Login</button>
               </form>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
           </div>
         </div>
       </div>
     </div>
