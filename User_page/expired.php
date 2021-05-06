<?php
require_once "./header.php";
require_once "../components.php";
require_once "./connection.php";
?>

<style>
.btn{
    width:200px;
    border-radius:20px;
}
/*  ______________Stying for side navbar______________________ */
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
.fine{
    background-color:#dc3545;
    width:300px;
    height:50px;
    float:right;
    color:white;
    padding-top:8px;
    border-top-left-radius:30px;
    border-bottom-right-radius:30px;
}
.yellow{
    color:yellow;
    font-weight:bolder;
    font-size:1.9rem;
}
.display-3{
    font-size:1.7rem;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>
<!-- ____________Ending of side navBar styling________________-->


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
  
<!-- ____________Starting of books page________________-->
<!-- ____________for userName________________-->
<div class="search-form" style="padding-top:0px;">
<!-- ____________For calculating Fine________________-->
<?php
if(isset($_SESSION['login_user'])){
    $day= 0;
$exp = '<p class="bg-danger" style ="color:yellow;">Expired</p>';
$sql = "SELECT * FROM request_books WHERE userName ='$_SESSION[login_user]' AND approve ='$exp'";
$res = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($res)){
  $returnDate = strtotime($row['returnDate']);
  $currentDate =  strtotime(date('yy-m-d'));
    $diff = $currentDate-$returnDate;
    if($diff>=0){
        $day += $diff/(60*60*24);
        $_SESSION["day"] = $day;  ?>
  <?php
    }
}
}
?>
<?php
$a = mysqli_query($con,"SELECT * FROM fines WHERE userName ='$_SESSION[login_user]'");
$total_fines_of_std = 0;
$results = 0;
while($rows = mysqli_fetch_assoc($a)){
$results = $rows["Fine"];
$total_fines_of_std += $results;
}
?>
<p class="fine display-3 text-center">Your Fine is :-Rs.<span class="yellow"><?php echo $total_fines_of_std;?></span></p>
<!-- ____________Ending for calculating fine________________-->

<!-- ____________Starting of left Side form________________-->
<form action="" method= "post">
<div class=" ml-4 d-felx">
<button class="btn btn-outline-danger" type = "submit" name = "Expired-btn">Expired</button>
<button class="btn btn-outline-success" type = "submit" name = "Returned-btn">Returned</button>
</div>
</form>
<!-- ____________Ending of left Side form________________-->


<h2 class="display-4 books-heading text-center">Books Status</h2>
<?php 
if(isset($_SESSION["login_user"])){
    //For showing expired books 
  if(isset($_POST["Expired-btn"])){
    $exp = '<p class="bg-danger" style ="color:yellow;">Expired</p>';
  $q = mysqli_query($con,"SELECT * FROM request_books WHERE userName = '$_SESSION[login_user]' AND approve = '$exp'");
 //For showing returned books
}else if(isset($_POST["Returned-btn"])){
  $ret = '<p class="bg-success" style ="color:yellow;">Returned</p>';

$q = mysqli_query($con,"SELECT * FROM request_books WHERE userName = '$_SESSION[login_user]' AND approve = '$ret'");
}
else{
    //For showing both expired and returned books
  $q = mysqli_query($con,"SELECT * FROM request_books WHERE approve !='' AND approve != 'Yes'");
 
  }
  //Tablw for showing expired and returned books
  echo"<table class='table table-bordered table-hover'";
  echo"<tr>";
  echo"<th style='background-color:#48cae4'>"; echo"Book_Id";echo"</th>";
  echo"<th style='background-color:#48cae4'>"; echo"Approve Status";echo"</th>";
  echo"<th style='background-color:#48cae4'>"; echo"Issue_Date";echo"</th>";
  echo"<th style='background-color:#48cae4'>"; echo"Return_Date";echo"</th>";
  echo"</tr>";
  
  while($row = mysqli_fetch_assoc($q)){   
      echo"<tr>";
      echo"<td>"; echo $row['bookId'];echo"</td>";
      echo"<td>"; echo $row['approve'];echo"</td>";
      echo"<td>"; echo $row['issueDate'];echo"</td>";
      echo"<td>"; echo $row['returnDate'];echo"</td>";

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





