<?php
  ob_start();
  session_start();
  include('headers.php');
  require 'function.php';
  $db= dbcon();

  if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $institution =$_POST['institution'];
    // image uploading
    $filename = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];
    $image = move_uploaded_file($filetmp,"img/".$filename);

    if ($filename==null) {
      $query2 = "UPDATE user SET name='$name',email='$email',institution='$institution' WHERE userid = {$_SESSION['user']}";
      $sql2 = mysqli_query($db,$query2);
      if ($sql2) {
        echo "<p class='text-center' style='color:#2ecc71; font-size:20px;'>"."Profile successfully updated"."</p>";
      }
      else {
          echo "<p class='text-center' style='color:#2ecc71; font-size:20px;'>"."Update failed!!"."</p>";
      }
    }
    else {
      $query2 = "UPDATE user SET name='$name',email='$email',institution='$institution',image='$filename' WHERE userid = {$_SESSION['user']}";
      $sql2 = mysqli_query($db,$query2);
      if ($sql2) {
        echo "<p class='text-center' style='color:#2ecc71; font-size:20px;'>"."Profile successfully updated"."</p>";
      }
      else {
          echo "<p class='text-center' style='color:#2ecc71; font-size:20px;'>"."Update failed!!"."</p>";
      }
    }
  }
 ?>
    <style type="text/css">
      .imageup{
        text-align: center;
        margin: auto;
      }
      #user-profile{
        padding-bottom: 180px;
      }
      input{
        width: 100%;
        padding: 5px 12px;
        border: none;
        outline: none;
        color: #7f8c8d;
      }
    </style>
    <!--profile-->
    <?php
      $query = "SELECT * FROM user WHERE userid={$_SESSION['user']}";
      $result = mysqli_query($db,$query);
      while ($row = mysqli_fetch_array($result)){

    ?>
    <section id="user-profile">
      <div class="container">
        <div class="prifile-content">
          <div class="row">
              <div class="col-md-4 text-right">
                <div class="profile-pic">
                  <img src="img/<?php echo $row['image']; ?>" alt="Profile image">
                </div>
              </div>
            <div class="col-md-8">
              <div class="user-profile-info">
                <form action="editprofile.php" method="POST" enctype="multipart/form-data">
                  <table>
                    <tr>
                      <td class="info-label">Name:</td>
                      <td>
                        <input type="text" name="name" value="<?php echo $row['name'] ?>">
                      </td>
                    </tr>
                    <tr>
                      <td class="info-label">Username:</td>
                      <td>
                        <?php echo $row['username']; ?> <i style="color:#e74c3c;">You can't change username</i>
                      </td>
                    </tr>
                    <tr>
                      <td class="info-label">Email:</td>
                      <td>
                        <input type="email" name="email" value="<?php echo $row['email'] ?>">
                      </td>
                    </tr>
                    <tr>
                      <td class="info-label">Institution:</td>
                      <td>
                        <input type="text" name="institution" value="<?php echo $row['institution'] ?>" placeholder="Institution">
                      </td>
                    </tr>
                    <!-- <tr>
                      <td class="info-label">Skills:</td>
                      <td><span>Javascript</span><span>Jquery</span><span>AngularJS</span><span>PHP</span><span>HTML5</span><span>CSS3</span></td>
                    </tr> -->
                    <tr>
                      <td class="info-label">Upload Image:</td>
                      <td>
                        <input class="imageup" type="file" name="image" value="Upload">
                      </td>
                    </tr>
                    <tr>

                      <td>
                        <button class="btn btn-success" type="submit" name="update">Update</button>
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>



<?php
  include('footer.php');
?>
