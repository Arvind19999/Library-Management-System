<?php
require_once "./header.php";
require_once "../components.php";
require_once "./connection.php";
?>
<!-- ______________Stying for side navbar______________________-->
<style>
/* body {
  font-family: "Lato", sans-serif;
} */

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
  back
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
  <a class="sideNav p-3 " href="./expired.php">Exired</a>
  <a class="sideNav p-3 " href="#">Fines</a>
</div>

<div id="main">
  <h2></h2>
  <span style="font-size:30px;cursor:pointer;margin-top:2rem;position:relative;top:25px;"
   onclick="openNav()">&#9776; </span>
  
<!-- ____________Starting of books page________________-->
<div class="search-form" style="padding-top:15px;">
<h2 class="display-4 books-heading">List Of Requested Books</h2>
<?php 
if(isset($_SESSION["login_user"])){
 $sql = "SELECT * FROM request_books WHERE userName = '$_SESSION[login_user]' AND approve = ''";
 $querys = mysqli_query($con,$sql);
 $result =mysqli_num_rows($querys);
 if($result == 0){
    echo"<p class='text-center pt-2' style='height:50px;width:55%;color:white;
    font-size:1.5rem;background-color:#48cae4;'>No Pending Requests</p>";
 }else{
     ?>
 <table class="table table-bordered">
 <tr>
 <th style='background-color:#48cae4'>Book Id</th>
 <th style='background-color:#48cae4'>Approve Status</th>
 <th style='background-color:#48cae4'>Issue date</th>
 <th style='background-color:#48cae4'>Return Date</th>
 </tr>
 <?php while($row = mysqli_fetch_assoc($querys)){
?>
<tr>
<td><?php echo $row["bookId"]; ?></td>
<td><?php echo $row["approve"]; ?></td>
<td><?php echo $row["issueDate"]; ?></td>
<td><?php echo $row["returnDate"]; ?></td></tr>
<?php
 }
 ?>
 </table>    
 <?php
 }
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

