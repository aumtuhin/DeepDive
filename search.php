<?php
   ob_start();
   session_start();
   include 'function.php';
   include 'headers.php';
   $conn = dbcon();
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
     <!--help posts  -->
      <section id="help-post">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Search Results</h2>
            </div>
          </div>

          <?php
          if (isset($_POST['search'])) {
            $search  = mysqli_real_escape_string($conn,$_POST['searchitem']);
            if (empty($search)) {
                echo '<h3 class="text-center" style="color:#e67e22">Oopps!! please write something!!</h3>';
            }
            else {
            $query = "SELECT * FROM  post WHERE posttitle LIKE'%$search%' OR description LIKE'%$search%' OR tag1 LIKE'%$search%' OR tag2 LIKE'%$search%' OR tag3 LIKE'%$search%' ";
            $result = mysqli_query($conn,$query);
            $query_result = mysqli_num_rows($result);

            if ($query_result > 0) {
              echo '<h3 class="text-center" style="color:#7f8c8d">Search result for <span style="color:#e67e22">'.$search.'</span></h3>';
              while ($row=mysqli_fetch_assoc($result)) {

             ?>
          <div style="padding-top:20px;" class="main-topic text-left">
            <div style="margin-top:0; padding:20px;" class="row main-topic-content">
              <div class="col-md-12 text-left">
                <div class="post-content">
                  <div class="post-tag">
                    <li><a href="#"><?php echo $row['tag1']; ?></a></li>
                    <li><a href="#"><?php echo $row['tag1']; ?></a></li>
                    <li><a href="#"><?php echo $row['tag1']; ?></a></li>
                  </div>
                  <a href="viewpost.php?postid=<?php echo $row['postid']?>"><h4><?php echo $row['posttitle']; ?></h4></a>
                  <div class="post-date-time">
                    <li><?php echo getTotalComment($conn,$row['postid']); ?> Voices</li>
                    <li><?php echo $row['postdate']; ?></li>
                    <li><?php echo getCat($row['catid'], $conn); ?></li>
                  </div>
                  <p><?php echo $row['description']; ?></p>
                  <a class="view-more" href="viewpost.php?postid=<?php echo $row['postid']?>">View full question <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                </div>
              </div>
            </div>
            <div class="post-hr-line"></div>
          </div>
          <?php } }else {
            echo '<h3 class="text-center">Oppss!!!No search result</h3>';
          } } } ?>
        </div>
      </section>



 <?php include 'footer.php'; ?>
