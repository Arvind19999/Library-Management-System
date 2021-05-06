<?php
$page='home';
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>
<style>
#activess{
  font-weight:800;
}
.fa-book{
  font-size:80px;
  padding:15px;
  margin:15px;
}
.fa-user{
  font-size:80px;
  padding:15px;
  margin:15px;
}
.fa-users{
  font-size:80px;
  padding:15px;
  margin:15px;
}
.borders{
  border:3px black solid;
  border-radius:10px;
}
.fine{
  font-size:80px;
  padding:15px;
  margin:15px;
  /* font-weight:bold; */
}
/*___________________________ Strating of side navBar styling ________________________*/
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
  
<!-- ____________Starting of Home Page________________-->

<div class="mt-5 container">
<?php 
$res1 = mysqli_query($con,"SELECT * from books");
$result1 = 0;
$sum1 = 0;
while($row1 = mysqli_fetch_assoc($res1)){
  $result1 = $row1["quantity"];
  $sum1 += $result1; 
}
?>
<i class="fa fa-book borders text-center"> <br> Books <span><br><?php echo $sum1;?></span> </i>

<?php 
$res2 = mysqli_query($con,"SELECT * from admin_signup");
$result2 = 0;
$sum2 = 0;
while($row2 = mysqli_fetch_assoc($res2)){
  $result2 = $row2["userName"];
  $sum2 += 1;
}
?>
<i class="fa fa-user borders text-center"> <br> Admins <span><br><?php echo $sum2;?></span> </i>


<?php 
$res3 = mysqli_query($con,"SELECT * from students");
$result3 = 0;
$sum3 = 0;
while($row3 = mysqli_fetch_assoc($res3)){
  $result3 = $row3["userName"];
  $sum3 += 1;
}
?>
<i class="fa fa-users borders text-center"> <br>Students <span><br><?php echo $sum3;?></span> </i>


<?php 
$res4 = mysqli_query($con,"SELECT * from fines");
$result4 = 0;
$sum4 = 0;
while($row4 = mysqli_fetch_assoc($res4)){
  $result4 = $row4["Fine"];
  $sum4 += $result4;
}
?>
<i class="fa fa-none borders fine text-center">Total Fines  <span><br><?php echo $sum4;?></span></i>
</div>


<!-- ____________Ending of Home Page________________-->

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





