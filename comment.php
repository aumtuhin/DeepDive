<?php
  session_start();
  require('function.php');
  $conn = dbcon();

  if (isset($_POST['reply'])) {
    $comment = mysqli_real_escape_string($conn, $_POST['cmntbox']);
    $userid = $_SESSION['user'];
    $postid = $_POST['postid'];
    $postdate = date("d-m-y");
    if ($comment==null) {
      $location = "location:viewpost.php?postid={$postid}";
      header($location);
      exit();
    }
    else {
      $sql = "INSERT INTO comment (comment,postid,userid,cmntdate) VALUES ('$comment',$postid,$userid,'$postdate')";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
        echo "Error while commenting";
      }
      else {
        // $location = "location:viewpost.php?postid={$postid}";
        header("location:viewpost.php?postid={$postid}");
      }
    }
  }
?>
