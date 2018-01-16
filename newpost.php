<?php
  session_start();
  require 'function.php';
  $db= dbcon();
  if (!isset($_SESSION['user'])) {
    header('location:loginfirst.php');
  }
 ?>

   <?php include('headers.php'); ?>
    <section id="new-post">
      <div class="container">
        <h4>You are creating a new post.....</h4>
        <form id="post_form_question" action="post.php" method="post">
          <div class="form-group">
            <span class="post-eror" id="errortitle"></span>
            <input type="text" class="form-control" id="post-tittle" name="posttittle" placeholder="Post tittle....">
          </div>
          <div class="form-group form-inline">
            <p id="error-messege"></p>
            <label for="tag">Tag:</label>
            <input id="taginput1" type="text" name="tag1" placeholder="tag">
            <input id="taginput2" type="text" name="tag2" placeholder="tag2">
            <input id="taginput3" type="text" name="tag3" placeholder="tag3">
            <button id="add-tag" type="button" name="button" onclick="addTag();"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
          </div>
          <div class="form-group">
            <span class="post-eror" id="errorcatagory"></span>
            <select id="form_cat" class="form-control" name="catagory">
              <option value="null">Select a catagory</option>
              <?php
                $sql= "SELECT * FROM catagory";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)) {
              ?>

              <option value="<?php echo $row['catid'] ?>"><?php echo $row['catname'] ?></option>
              <?php } ?>
            </select>
          </div>
          <span class="post-eror" id="errorbody"></span>
          <textarea id="form_body" class="tinymce" name="description">Post Description..</textarea>
          <button type="submit" class="btn btn-default" name="submit">POST</button>
        </form>
      </div>
    </section>
    <?php
      include('footer.php');
     ?>
