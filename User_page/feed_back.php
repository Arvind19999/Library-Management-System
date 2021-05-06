
<?php
$page = 'feedback';
require_once "./header.php";
require_once "../components.php";
require_once "./connection.php";
?>
<!-- ______________Stying for side navbar______________________-->
<style>
#activess{
    font-weight:800;
 }
.sidenav {
  height: 100%;
  margin-top:78px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#f8f9fa;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  border-top:2px blue solid;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size:1.1rem;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sideNav:hover {
  color: black;
  background-color:#48cae4;
}

.sidenav .closebtn {
  position: absolute;
  top: -28px;
  right: -5px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
.sideNav{
  text-transform: uppercase;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>
<!-- ____________Ending of side navBar styling________________-->

<!-- ____________Code for side navbar ________________-->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a class="sideNav" href="./student_info.php" style="background-color:#48cae4;">
   <img src="../images/profile_pic.png" alt="My_profile"
   style="height:100px;
 border-radius:50%;width:100px;margin-left:30px;"><p class="lead ml-5 text-white"><?php echo $_SESSION["login_user"];?></p></a>
  <a class="sideNav p-3 mt-5" href="./user_books.php">Books</a>
  <a class="sideNav p-3 " href="./book_request.php">Book Request</a>
  <a class="sideNav p-3 " href="./expired.php">Expired</a>
  <a class="sideNav p-3 " href="#">Fines</a>
</div>

<div id="main">
  <h2></h2>
  <span style="font-size:30px;cursor:pointer;margin-top:2rem;position:relative;top:25px;"
   onclick="openNav()">&#9776; </span>
  

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
    $sql = "INSERT INTO comments VALUES ('','$COMMENTS','$_SESSION[login_user]')";
    if(mysqli_query($con,$sql)){
     $q = "SELECT * FROM comments ORDER BY comment_id DESC";
      $res = mysqli_query($con,$q);
      while($row = mysqli_fetch_assoc($res)){
        echo"<table class='table table-bordered feedback_table'>";
        echo"<tr>";
        echo"<td>"; echo $row['comment'].'     ~by:-'.$row['userName']; echo"<td>";
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
      echo"<td>"; echo $row['comment'].'     ~by:-'.$row['userName']; echo"<td>";
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


</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<!-- ____________Ending code for  side navBar ________________-->












