  <?php
    ob_start();
    session_start();
    include('headers.php');
    require 'function.php';
    $db= dbcon();
   ?>
    <!--welcome section  -->
    <section id="welcome">
      <div class="welcome-overlay">
        <div class="container text-center">
          <h1>DeepDive help-desk support</h1>
          <p>Welcome to the Helper Support Portal! Search your answers with the search box above, or if you're stuck you can create a support ticket.</p>
          <div class="search-form">
            <form action="search.php" method="post">
              <div class="form-group">
                <input id="input-help" type="text" class="form-control" name="searchitem" placeholder="How may I help you today?">
              </div>
              <button type="submit" class="btn btn-default btn-search" name="search">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php
    $query = "SELECT * FROM post";
    $result = mysqli_query($db,$query);
    $number_of_results = mysqli_num_rows($result);
     ?>
    <!--help posts  -->
    <section id="help-post">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-left">
            <div class="show-result">
              <p>Showing 1-5 of <?php echo $number_of_results; ?> Topics</p>
            </div>
          </div>
          <div class="col-md-6 text-right">
            <div class="popular-topic">
              <form action="index.php" method="post">
                <select class="select-filter" name="topic">
                  <option value="new">Newest</option>
                  <!-- <option value="popular">Popular</option>
                  <option value="old">Old</option> -->
                </select>
              </form>
            </div>
          </div>
        </div>
        <?php
        $result_per_page = 5;
        $number_of_results = mysqli_num_rows($result);
        $number_of_page = ceil($number_of_results/$result_per_page);
        if (!isset($_GET['page'])) {
          $page = 1;
        }else {
          $page = $_GET['page'];
        }

        $this_page_first_result = ($page-1)*$result_per_page;

        $query = "SELECT * FROM post  order by postid DESC LIMIT $this_page_first_result,$result_per_page";
        $result = mysqli_query($db,$query);

        while ($row = mysqli_fetch_array($result)){

        ?>
        <div class="main-topic text-left">
          <div class="row main-topic-content">
            <div class="col-md-3">
              <div class="user-info">
                <?php $tuhin= getUserInfo($row['userid'], $db);
                //echo $row['userid'];
                //var_dump($row['userid']);
                ?>
                <img src="img/<?php echo $tuhin['image'] ?>" alt="Profile">
                <p><?php echo $tuhin['name']; ?></p>
              </div>
            </div>
            <div class="col-md-9 text-left">
              <div class="post-content">
                <div class="post-tag">
                  <li><a><?php echo $row['tag1']; ?></a></li>
                  <li><a><?php echo $row['tag2']; ?></a></li>
                  <li><a><?php echo $row['tag3']; ?></a></li>
                </div>
                <a href="viewpost.php?postid=<?php echo $row['postid']?>"><h4><?php echo $row['posttitle']; ?></h4></a>
                <div class="post-date-time">
                  <li><?php echo getTotalComment($db,$row['postid']); ?> Voices</li>
                  <li><?php echo $row['postdate']; ?></li>
                  <li><?php echo getCat($row['catid'], $db); ?></li>
                </div>
                <p><?php echo $row['description']; ?></p>
                <a class="view-more" href="viewpost.php?postid=<?php echo $row['postid']?>">View full question <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
              </div>
            </div>
          </div>
          <div class="post-hr-line"></div>
        </div>
        <?php } ?>

        <div class="pagination-list">
          <div class="pagination-list-item">
            <li><i class="fa fa-angle-double-left" aria-hidden="true"></i></li>
            <?php
               for ($page=1; $page<=$number_of_page; $page++) {
                //  echo "<li>"."<a href='index.php?page='.'$page'>"."$page"."</a>"."</li>";
                echo '<li class="active">'.'<a href="index.php?page=' .$page .'">'.$page.'</a>'.'</li>';
               }
             ?>
            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
          </div>
        </div>
      </div>
    </section>

     <?php
       include('footer.php');
      ?>
