<?php
  header('index.php');
  function dbcon(){
    $conn = mysqli_connect('localhost','root','','deepdive2');
    return $conn;
  }
function getCat($catid,$db)
  {
    $query= "SELECT catname FROM catagory WHERE catid=$catid";
    $result = mysqli_query($db, $query);
    $result = mysqli_fetch_array($result);
    return $result['catname'];
  }
  function getUserInfo($userid,$db){
    $query2 = "SELECT name,image FROM user where userid={$userid}";
    $result2 = mysqli_query($db,$query2);
    $result2 = mysqli_fetch_array($result2);
    return $result2;
  }
  function getTotalComment($conn,$postid){
    $query = "SELECT * FROM comment WHERE postid = '$postid'";
    $result = mysqli_query($conn,$query);
    $num_of_comment  = mysqli_num_rows($result);
    return $num_of_comment;
  }

  function getUserName($userid,$db){
    $query= "SELECT * FROM user WHERE userid = $userid";
    $result = mysqli_query($db, $query);
    $result = mysqli_fetch_array($result);
    return $result['username'];
  }
?>
