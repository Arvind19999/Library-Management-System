<?php
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>


<div class="feedback">
<div class="feedback_content">
<h3 class="mr-auto">You can have your feedback here....</h3>
<div>
    <form action="" method="post">
<textarea name="comments" id="feedback" class="form-control mb-3" placeholder="Enter your feedback" cols="30" rows="3"></textarea>
<?php buttonComponent("btn btn-info","","submit","submit_comment","comment_id","Submit");
    ?>
    </form>
    <!-- div for providing srollbar to feedback data -->
    <div class="scroll">   
  <?php
if(isset($_POST["submit_comment"])){
    $COMMENTS = $_POST["comments"];
    $sql = "INSERT INTO comments VALUES ('','$COMMENTS')";
    if(mysqli_query($con,$sql)){
     $q = "SELECT * FROM comments ORDER BY comment_id DESC";
      $res = mysqli_query($con,$q);
      while($row = mysqli_fetch_assoc($res)){
        echo"<table class='table table-bordered feedback_table'>";
        echo"<tr>";
        echo"<td>"; echo $row['comment']; echo"<td>";
        echo"</tr>";
        echo"</table>";
    }
    }
 
}
else{
    $q = "SELECT * FROM comments ORDER BY comment_id DESC";
    $res = mysqli_query($con,$q);
    while($row = mysqli_fetch_assoc($res)){
      echo"<table class='table table-bordered'>";
      echo"<tr>";
      echo"<td>"; echo $row['comment']; echo"<td>";
      echo"</tr>";
      echo"</table>";
  }
}
    
?>
  </div>
<!-- ending of scroll div -->
</div>
</div>
</div>
