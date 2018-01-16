<?php
  session_start();
  header('index.php');
  require('function.php');
  $conn = dbcon();
  if (isset($_POST['submit'])) {

    $posttittle = $_POST['posttittle'];
    $catid = $_POST['catagory'];
    $description = $_POST['description'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $postdate = date("d-m-y");
    $tag1 = $_POST['tag1'];
    $tag2 = $_POST['tag2'];
    $tag3 = $_POST['tag3'];

    if (!empty($posttittle) && !empty($description) && !empty($catid)){
      $query = "INSERT INTO post (posttitle,catid,postdate,tag1,tag2,tag3,description,userid)
      VALUES ('$posttittle',$catid,'$postdate','$tag1','$tag2','$tag3','$description',{$_SESSION['user']})";
      $sql = mysqli_query($conn,$query);
      if ($sql) {
        $sql = "SELECT postid FROM post";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query)) {
          $lastpostid = $row['postid'];
        }
        header("location:viewpost.php?postid={$lastpostid}");
        exit();
      }
    }
    else {
      header('location:newpost.php');
      exit();
    }
  }
?>
