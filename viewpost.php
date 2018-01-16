    <?php
      ob_start();
      session_start();
      include('headers.php');

      if (!isset($_SESSION['user'])) {
        header('location:loginfirst.php');
        die;
      }
    ?>
    <?php
      require('function.php');
      $conn = dbcon();
      if (isset($_GET['postid'])) {
        $postid = $_GET['postid'];
        $sql = "SELECT * FROM post WHERE postid='$postid'";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($result)){

          $postid = $row['postid'];
          $userid = $row['userid'];
    ?>

    <section id="topic-heading">
      <div class="container text-center">
        <h1><?php echo $row['posttitle']; ?></h1>
        <p><span>Home</span>/<span>Topic</span>/<?php echo $row['posttitle']; ?></p>
      </div>
    </section>

    <section id="view-post">
      <div class="container">
        <div class="post-content">
          <div class="row">
            <div class="col-md-2 text-center">
              <div class="user-info">
                <?php $tuhin= getUserInfo($row['userid'], $conn);
                //echo $row['userid'];
                //var_dump($row['userid']);
                ?>
                <img src="img/<?php echo $tuhin['image'];?>" alt="">
                <p><?php echo $tuhin['name']; ?></p>
              </div>
            </div>
            <div class="col-md-10">
              <div class="post-content">
                <h4 style="font-size:22px;"><?php echo $row['posttitle']; ?></h4>
                <div class="post-date-time">
                  <li><?php echo getTotalComment($conn,$row['postid']); ?> Voices</li>
                  <li><?php echo $row['postdate'] ?></li>
                  <li><?php echo getCat($row['catid'], $conn); ?></li>
                </div>
                <p><?php echo $row['description'] ?></p>
              </div>
              <div class="post-tag" style="margin-top:30px;">
                <li><a href="#"><?php echo $row['tag1']; ?></a></li>
                <li><a href="#"><?php echo $row['tag2']; ?></a></li>
                <li><a href="#"><?php echo $row['tag3']; ?></a></li>
              </div>
              <div class="reply-btn">
                <a class="btn btn-primary" href="#post-reply" onclick="commentfocus();">Reply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
     }
   }
    ?>


    <?php
      $cmntsql = "SELECT * FROM comment WHERE postid = '$postid'";
      $cmntquery = mysqli_query($conn,$cmntsql);
      while ($row = mysqli_fetch_array($cmntquery)){

     ?>
    <!--post-comment  -->
    <section id="post-comment">
      <div class="container">
        <div class="comment-content">
          <div class="row">
            <div class="col-md-2">
              <div class="user-info">
                <?php $tuhin= getUserInfo($row['userid'], $conn);
                //echo $row['userid'];
                //var_dump($row['userid']);
                ?>
                <img src="img/<?php echo $tuhin['image'];?>" alt="">
                <p><?php echo $tuhin['name']; ?></p>
              </div>
            </div>
            <div class="col-md-10">
              <p class="comment-date"><?php echo $row['cmntdate'] ?></p>
              <p><?php echo $row['comment'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>

    <!--post-reply  -->
    <section id="post-reply">
      <div class="container">
        <div class="reply-content">
          <div class="row">
            <div class="col-md-2">
              <div class="user-info">
                <?php
                if (isset($_SESSION['user']) && $_SESSION['user'] == true) {


                 $tuhin= getUserInfo($_SESSION['user'], $conn);
                //echo $row['userid'];
                //var_dump($row['userid']);
                ?>
                <img src="img/<?php echo $tuhin['image'];?>" alt="">
                <p><?php echo $tuhin['name']; ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-10">
              <p class="comment-date"><?php echo date("d-m-y"); ?></p>
              <form action="comment.php" method="POST" onsubmit=" return validate();">
                <div class="form-group">
                  <textarea id="post-comment-box" class="comment-box" name="cmntbox" rows="8" placeholder="Write a comment....."></textarea>
                </div>
                <input type='hidden' name='postid' value='<?php echo $postid;?>'/>
                <button type="submit" class="btn btn-primary" name="reply">Reply</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>



    <!--footer  -->
    <?php include('footer.php'); ?>

    <script>
      function validate(){
        var comment = document.getElementById('post-comment-box').value;
        if (comment == "") {
          document.getElementById('post-comment-box').style.outline = "1px solid red";
          comment.focus();
           return false;
        }
      }
    </script>
