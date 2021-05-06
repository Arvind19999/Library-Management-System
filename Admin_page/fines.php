<?php
$page = 'fines';
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>

<style>
#activess{
    font-weight:800;
 }

.requested-content .form-control{
  width:30%;
  background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2));
  color:white;
}
.form-position{
  position:relative;
  left:65rem;
}
.requested-content .btn{
  width:30%;
  margin:10px 0px;
  border-radius:20px;
  color:white;
}
/* <!-- ______________Stying for side navbar______________________--> */
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
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
  height:100vh;
}
tr{
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));  color:white;
}
th{
  color:black;
}
.sideNav{
  text-transform: uppercase;
}
/* CSS for fine portion*/
.fine{
    background-color:#dc3545;
    width:300px;
    height:50px;
    float:right;
    color:white;
    padding-top:8px;
    border-top-left-radius:30px;
    border-bottom-right-radius:30px;
    margin-left:30px;
}
.yellow{
    color:yellow;
    font-weight:bolder;
    font-size:1.9rem;
}
.display-3{
    font-size:1.7rem;
}
/* Ending of CSS for fine portion*/

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

<div class="search-form" style="padding-top:15px;">

<!-- ____________for Paid members________________-->
<form action="" method="post">
<div class="d-flex justify-content-end">
<?php 
inputComponent("paid_memebrs","","PAID_MEMBERS","Enter userName","form-control text-muted w-10","text","","Paid_members");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="paidMembers">PAID</button>
</div>
</form>
<!-- ____________Ending form for paid members________________-->
<!-- ____________for searching button________________-->
<form action="" method="post">
<div class="d-flex justify-content-end">
<?php 
inputComponent("search","","Search_bar","Enter userName","form-control text-muted w-10","text","","searchUser");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="userFineSearch"> <i class="fa fa-search"></i> </button>
</div>
</form>
<!-- ____________Ending of searchig button________________-->
<h2 class="display-4 books-heading text-center">Fines</h2>
<?php 
if(isset($_POST["userFineSearch"])){
  $USERNAME = $_POST["searchUser"];
  mysqli_query($con,"DELETE FROM fines WHERE Statuss = 'Paid'");
  $total_fine = 0;
  $q = mysqli_query($con,"SELECT * FROM fines WHERE UserName LIKE '%$USERNAME%'");
  if(mysqli_num_rows($q)==0){
    echo"<p class='text-center pt-2' style='height:50px;width:55%;color:white;
    font-size:1.5rem;background-color:#48cae4;margin-left:350px;'>You have No fines</p>";
    ?>
    <p class="fine display-3 text-center">Your Fine is :-Rs.<span class="yellow"> <?php echo 0;?> </span></p> 
    <?php
    $_SESSION["fine"] = 0;
  }else{
    echo"<table class='table table-bordered table-hover'";
    echo"<tr>";
    echo"<th style='background-color:#48cae4'>"; echo"BookId";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"userName";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"ReturnDate";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Day";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Fine";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Status";echo"</th>";
    echo"</tr>";
    while($row = mysqli_fetch_assoc($q)){
        echo"<tr>";
        echo"<td>"; echo $row['BookId'];echo"</td>";
        echo"<td>"; echo $row['UserName'];echo"</td>";
        echo"<td>"; echo $row['ReturnDate'];echo"</td>";
        echo"<td>"; echo $row['No_Of_Day'];echo"</td>";
        echo"<td>"; echo $row['Fine'];echo"</td>";
        echo"<td>"; echo $row['Statuss'];echo"</td>";
        echo"</tr>";
      $total_fine +=$row['Fine'];   
      }
      echo"</table>";
      ?>
      <p class="fine display-3 text-center">Your Fine is :-Rs.<span class="yellow"> <?php echo $total_fine;?> </span></p>
   <?php
$_SESSION['fine'] = $total_fine;
  }

}else{
  $res = mysqli_query($con,"SELECT * FROM fines WHERE statuss ='Not paid'");
  echo"<table class='table table-bordered table-hover'";
echo"<tr>";
echo"<th style='background-color:#48cae4'>"; echo"BookId";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"userName";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"ReturnDate";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Day";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Fine";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Status";echo"</th>";
echo"</tr>";
while($row = mysqli_fetch_assoc($res)){
    echo"<tr>";
    echo"<td>"; echo $row['BookId'];echo"</td>";
    echo"<td>"; echo $row['UserName'];echo"</td>";
    echo"<td>"; echo $row['ReturnDate'];echo"</td>";
    echo"<td>"; echo $row['No_Of_Day'];echo"</td>";
    echo"<td>"; echo $row['Fine'];echo"</td>";
    echo"<td>"; echo $row['Statuss'];echo"</td>";
    echo"</tr>";
    }
  echo"</table>";
}

?>
</div>
<!-- ____________Ending of books Page________________-->

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

<?php
if(isset($_POST["paidMembers"])){
  $PAIDMEMBERS = $_POST["Paid_members"];
  $sql = "UPDATE fines SET Statuss = 'Paid',Fine =0 WHERE UserName = '$PAIDMEMBERS'";
  if(mysqli_query($con,$sql)){
    mysqli_query($con,"DELETE FROM fines WHERE Statuss = 'Paid'");
  }
}
?>
<?php
echo "The total fine is ".$_SESSION['fine'];
// if(isset($_SESSION['login_user'] == $USERNAME))

?>



