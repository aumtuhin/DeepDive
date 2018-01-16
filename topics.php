  <?php
    ob_start();
    session_start();
    include('headers.php');
    require 'function.php';
    $conn = dbcon();
  ?>

    <section id="topic-heading">
      <div class="container text-center">
        <h1>Available Topics</h1>
        <p><span>Home</span>/All topic</p>
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
                  $query = "SELECT * FROM post WHERE catid = 1 ORDER BY postid DESC";
                  $result = mysqli_query($conn,$query);
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
                  $query = "SELECT * FROM post WHERE catid = 2 ORDER BY postid DESC";
                  $result = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle'] ?></a></li>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="all-topic-content">
              <div class="all-topic-heading">
                <h4><i class="fa fa-camera-retro" aria-hidden="true"></i>Photography <span></span></h4>
              </div>
              <div class="list-group">
                <?php
                  $query = "SELECT * FROM post WHERE catid = 3 ORDER BY postid DESC";
                  $result = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle'] ?></a></li>
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
                <h4><i class="fa fa-heart" aria-hidden="true"></i>Graphic Design <span></span></h4>
              </div>
              <div class="list-group">
                <?php
                  $query = "SELECT * FROM post WHERE catid = 4 ORDER BY postid DESC";
                  $result = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle'] ?></a></li>
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
                  $query = "SELECT * FROM post WHERE catid = 5 ORDER BY postid DESC";
                  $result = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle'] ?></a></li>
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
                  $query = "SELECT * FROM post WHERE catid = 5 ORDER BY postid DESC";
                  $result = mysqli_query($conn,$query);
                  while ($row = mysqli_fetch_array($result)) {

                ?>
                <li><a href="viewpost.php?postid=<?php echo $row['postid']?>"><i class="fa fa-file-text" aria-hidden="true"></i><?php echo $row['posttitle'] ?></a></li>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--footer  -->
    <?php include 'footer.php'; ?>
