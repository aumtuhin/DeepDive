<?php
  ob_start();
  session_start();
  include('headers.php');
  require 'function.php';
  $db= dbcon();
  if (!isset($_SESSION['user'])) {
    header('location:loginfirst.php');
    die;
  }

  $query = "SELECT * FROM user WHERE userid={$_SESSION['user']}";
  $result = mysqli_query($db,$query);
  while ($row = mysqli_fetch_array($result)){
 ?>
    <!--profile-->
    <section id="user-profile">
      <div class="container">
        <div class="prifile-content">
          <div class="row">
            <div class="col-md-4 text-right">
              <div class="profile-pic">
                <img class="img-circle" src="img/<?php echo $row['image']; ?>" alt="Profile image">
              </div>
            </div>
            <div class="col-md-8">
              <h4><?php echo $row['name']; ?></h4>
              <div class="user-profile-info">
                <table>
                  <tr>
                    <td class="info-label">Username:</td>
                    <td><?php echo $row['username']; ?></td>
                  </tr>
                  <tr>
                    <td class="info-label">Email:</td>
                    <td><?php echo $row['email']; ?></td>
                  </tr>
                  <tr>
                    <td class="info-label">Institution:</td>
                    <td><?php echo $row['institution']; ?></td>
                  </tr>
                  <!-- <tr>
                    <td class="info-label">Skills:</td>
                    <td><span>Javascript</span><span>Jquery</span><span>AngularJS</span><span>PHP</span><span>HTML5</span><span>CSS3</span></td>
                  </tr> -->
                </table>
                <a class="btn btn-default" href="editprofile.php?id=<?php echo $_SESSION['user'] ?>">Edit</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>

    <section id="user-profile-allpost">
      <div class="container text-center">
        <div class="allpost-heading">
          <h3>Your Posts</h3>
        </div>
      </div>
    </section>

    <!--all topic  -->
    <section id="all-topic">
      <div class="container text-left">
        <div class="row">
          <div class="col-md-4">
            <div class="all-topic-content">
              <div class="all-topic-heading">
                <h4><i class="fa fa-television" aria-hidden="true"></i>Web Development <span></span></h4>
              </div>
              <div class="list-group">
                <?php
                  $query = "SELECT * FROM post WHERE userid={$_SESSION['user']} AND catid = 1 ORDER BY postid DESC";
                  $result = mysqli_query($db,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle']; ?></a></li>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="all-topic-content">
              <div class="all-topic-heading">
                <h4><i class="fa fa-android" aria-hidden="true"></i>App Development <span></span></h4>
              </div>
              <div class="list-group">
                <?php
                  $query = "SELECT * FROM post WHERE userid={$_SESSION['user']} AND catid = 2 ORDER BY postid DESC";
                  $result = mysqli_query($db,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle']; ?></a></li>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="all-topic-content">
              <div class="all-topic-heading">
                <h4><i class="fa fa-camera-retro" aria-hidden="true"></i>Photography <span>(11)</span></h4>
              </div>
              <div class="list-group">
                <?php
                  $query = "SELECT * FROM post WHERE userid={$_SESSION['user']} AND catid = 3 ORDER BY postid DESC";
                  $result = mysqli_query($db,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle']; ?></a></li>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <!--second row-->
        <div class="row">
          <div class="col-md-4">
            <div class="all-topic-content">
              <div class="all-topic-heading">
                <h4><i class="fa fa-heart" aria-hidden="true"></i>Graphic Design <span></span</h4>
              </div>
              <div class="list-group">
                <?php
                  $query = "SELECT * FROM post WHERE userid={$_SESSION['user']} AND catid = 4 ORDER BY postid DESC";
                  $result = mysqli_query($db,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle']; ?></a></li>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="all-topic-content">
              <div class="all-topic-heading">
                <h4><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Tips Tricks <span></span></h4>
              </div>
              <div class="list-group">
                <?php
                  $query = "SELECT * FROM post WHERE userid={$_SESSION['user']} AND catid = 5 ORDER BY postid DESC";
                  $result = mysqli_query($db,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle']; ?></a></li>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="all-topic-content">
              <div class="all-topic-heading">
                <h4><i class="fa fa-wordpress" aria-hidden="true"></i>Wordpress <span></span></h4>
              </div>
              <div class="list-group">
                <?php
                  $query = "SELECT * FROM post WHERE userid={$_SESSION['user']} AND catid = 6 ORDER BY postid DESC";
                  $result = mysqli_query($db,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle']; ?></a></li>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
  include('footer.php');
?>
