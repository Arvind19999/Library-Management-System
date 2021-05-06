
<?php
$page = 'std_info';
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>
<style>
/*___________________________ Strating of side navBar styling ________________________*/
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
;
 
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
/* ______________________________Ending of side navBar styling ________________________________*/
</style>


<div>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a class="sideNav" href="./student_info.php" style="background-color:#48cae4;">
   <img src="../images/profile_pic.png" alt="My_profile"
   style="height:100px;
 border-radius:50%;width:100px;margin-left:30px;"><p class="lead ml-5 text-white"><?php echo $_SESSION["login_user"];?></p></a>
<a class="sideNav p-3 mt-5" href="./add_books.php">Add books</a>
  <a class="sideNav p-3 " href="./book_request.php">Book Request</a>
  <a class="sideNav p-3 " href="./request_status.php">Request Status</a>
  <a class="sideNav p-3 " href="./issue_info.php">Book Issue info</a>
  <a class="sideNav p-3 " href="./expired.php">Expired Lists</a>
</div>

<div id="main">
  <h2></h2>
  <span style="font-size:30px;cursor:pointer;margin-top:2rem;position:relative;top:25px;"
   onclick="openNav()">&#9776; </span>
  
<!-- ____________Starting of books page________________-->

<div class="search-form" style="padding-top:90px;">
<form action="student.php" method="post">
<div class="d-flex justify-content-end">
<?php inputComponent("search","","Search_bar","Search Students","form-control text-muted w-10","text","","searchStudents");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="search"> <i class="fa fa-search"></i> </button>
</div>
</form>
<!-- ____________Starting of delete button________________-->
<form action="" method="post">
<div class="d-flex justify-content-end">
<?php 
inputComponent("deleteStudents","","delete_bar","Enter student ID","form-control text-muted w-10","number","","deleteStudent");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="Delete"> <i class="fa fa-trash-alt"></i> </button>

</div>
</form>
<!-- ____________Ending of delete books btn________________-->

<h2 class="display-4 books-heading">List Of Students</h2>
<?php 
if(isset($_POST["search"])){
    // echo"The button is pressed";
  $STUDENTNAME = $_POST["searchStudents"];
  $q = mysqli_query($con,"SELECT * FROM students WHERE userName LIKE '%$STUDENTNAME%'");
  if(mysqli_num_rows($q)==0){
    echo"<p class='text-center pt-2' style='height:50px;width:55%;color:white;
    font-size:1.5rem;background-color:#48cae4;'>Sorry! No student with that name exist</p>";
  }else{
    echo"<table class='table table-bordered table-hover'";
    echo"<tr>";
    echo"<th style='background-color:#48cae4'>"; echo"ROLLNO.";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Fname";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Lname";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"userName";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Email";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Phone";echo"</th>";
    // echo"<th style='background-color:#48cae4'>"; echo"Status";echo"</th>";
    echo"</tr>";
    while($row = mysqli_fetch_assoc($q)){
        echo"<tr>";
        echo"<td>"; echo $row['rollNo'];echo"</td>";
        echo"<td>"; echo $row['fname'];echo"</td>";
        echo"<td>"; echo $row['lname'];echo"</td>";
        echo"<td>"; echo $row['userName'];echo"</td>";
        echo"<td>"; echo $row['email'];echo"</td>";
        echo"<td>"; echo $row['phoneNo'];echo"</td>";
        // echo"<td>"; echo $row['department'];echo"</td>";
        echo"</tr>";
        }
      echo"</table>";
  }

}else{
  $res = mysqli_query($con,"SELECT * FROM students ORDER BY rollNo ASC");
  echo"<table class='table table-bordered table-hover'";
echo"<tr>";
echo"<th style='background-color:#48cae4'>"; echo"ROLLNO.";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Fname";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Lname";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"userName";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Email";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Phone";echo"</th>";
echo"</tr>";
while($row = mysqli_fetch_assoc($res)){
    echo"<tr>";
    echo"<td>"; echo $row['rollNo'];echo"</td>";
    echo"<td>"; echo $row['fname'];echo"</td>";
    echo"<td>"; echo $row['lname'];echo"</td>";
    echo"<td>"; echo $row['userName'];echo"</td>";
    echo"<td>"; echo $row['email'];echo"</td>";
    echo"<td>"; echo $row['phoneNo'];echo"</td>";
    echo"</tr>";
    }
  echo"</table>";
}

?>
</div>


<!-- ____________Ending of books Page________________-->

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


<?php
if(isset($_POST["Delete"])){
  $DELETESTUDENTS = $_POST["deleteStudent"];
  $sql = "SELECT rollNo FROM students";
  $rest = mysqli_query($con,$sql);
  while($row = mysqli_fetch_assoc($rest)){
    $z[] = $row["rollNo"];
  }
  if(in_array($DELETESTUDENTS,$z)){
    $q = mysqli_query($con,"DELETE FROM students WHERE rollNo = '$DELETESTUDENTS'");
    ?>
  <script>alert("Book deleted successfully");</script>
  <?php
  }else{
    ?>
   <script>alert("book with that id doesn't exist");</script>
  <?php
  }
}
?>













