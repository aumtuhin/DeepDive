<?php
   session_start();
   include '../function.php';
   $conn = dbcon();
   include 'adminheader.php';
   if (!isset($_SESSION['adminid'])) {
     header('location: adminlogin.php');
   }

   if (isset($_GET['userid'])) {
     $userid = $_GET['userid'];
     $sql = "DELETE FROM user WHERE userid = '$userid';";
     $result = mysqli_query($conn,$sql);
     if ($result) {
       header('location:adminhome.php');
       echo '<h3 class="text-center delete-messege">Deleted</h3>';
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
  $query = "SELECT * FROM user";
  $result = mysqli_query($conn,$query);
  $num_of_user = mysqli_num_rows($result);
?>
<section id="total">
  <div class="container">
    <div class="total-users text-center">
      <h3>Total <?php echo $num_of_user; ?> users</h3>
    </div>
    <div class="form-group">
      <form class="" action="" method="post">
        <input class="form-control" type="text" name="searchuser" placeholder="search..">
      </form>
    </div>
    <div class="user-table">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $search_result = "";
            if (isset($_POST['searchuser'])) {
              $search_user = $_POST['searchuser'];
              $query = "SELECT * FROM user WHERE name LIKE'%$search_user%' OR username LIKE'%$search_user%' OR email LIKE'%$search_user%' LIMIT 0,8";
              $result = mysqli_query($conn,$query);
              $num_of_result = mysqli_num_rows($result);

            }
            else {
              $query = "SELECT * FROM user LIMIT 0,8";
              $result = mysqli_query($conn,$query);
            }
              while ($row = mysqli_fetch_array($result)) {

           ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td ><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><a href="adminhome.php?userid=<?php echo $row['userid']?>"><button class="btn-delete" data-toggle="confirmation"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php include 'adminfooter.php'; ?>
