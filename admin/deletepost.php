<?php
   session_start();
   include '../function.php';
   $conn = dbcon();
   include 'adminheader.php';
   if (!isset($_SESSION['adminid'])) {
     header('location: adminlogin.php');
   }
   if (isset($_GET['postid'])) {
     $postid = $_GET['postid'];
     $sql = "DELETE FROM post WHERE postid = '$postid'";
     $sql2 = "DELETE FROM comment WHERE postid = '$postid'";
     $result = mysqli_query($conn,$sql);
     $result2 = mysqli_query($conn,$sql2);
     if ($result && $result2) {
       header('location:deletepost.php');
     }
   }
 ?>
<style>
.total-users{
  width: 25%;
  margin: 0 auto;
}
.total-users h3{
  padding: 30px;
  background: #AED581;
  color: #F9FBE7;
}
.btn-delete{
  background: transparent;
  outline: none;
  border: none;
  color: #e74c3c;
  font-size: 20px;
  transition: .3s;
}
.btn-delete i:hover{
  color: red;
}
.form-control{
  width: 20%;
}
.delete-messege{
  color: green;
}
thead tr th{
  color: #D32F2F;
  font-size: 16px;
}
</style>

<?php
  $query = "SELECT * FROM post";
  $result = mysqli_query($conn,$query);
  $num_of_user = mysqli_num_rows($result);
?>
<section id="total">
  <div class="container">
    <div class="total-users text-center">
      <h3>Total <?php echo $num_of_user; ?> posts</h3>
    </div>
    <div class="form-group">
      <form class="" action="deletepost.php" method="post">
        <input class="form-control" type="text" name="searchpost" placeholder="search..">
      </form>
    </div>
    <div class="user-table">
      <table class="table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Username</th>
            <th>Catagory</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (isset($_POST['searchpost'])) {
              $search_post = $_POST['searchpost'];
              $query = "SELECT * FROM post,user WHERE posttitle LIKE'%$search_post%' OR description LIKE'%$search_post%' LIMIT 0,8";
              $result = mysqli_query($conn,$query);
              $num_of_result = mysqli_num_rows($result);

            }
            else {
              $query = "SELECT * FROM post LIMIT 0,8";
              $result = mysqli_query($conn,$query);
            }
              while ($row = mysqli_fetch_array($result)) {

           ?>
          <tr>
            <td><?php echo $row['posttitle']; ?></td>
            <td><?php echo getUserName($row['userid'],$conn);?></td>
            <td><?php echo getCat($row['catid'],$conn); ?></td>
            <td><a href="deletepost.php?postid=<?php echo $row['postid']?>"><button class="btn-delete" data-toggle="confirmation"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php include 'adminfooter.php'; ?>
