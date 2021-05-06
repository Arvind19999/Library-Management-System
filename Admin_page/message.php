<?php
$page = 'message';
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>

<style>
#activess{
    font-weight:800;
 }
 .lead{
  font-size:1.1rem;
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
  background-color:#27bac063;
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
.left{
    background-color:#96a0a9;
    height:600px;;
    width:350px;
    margin-top:15px;
    border-radius:12px;
    overflow:auto;
 }
.right{
    background-color:#96a0a9;
    height:600px;
    width:600px;
    margin-top:15px;
    border-radius:12px;
}
.user-chat-content:hover{
    background-color:black;
    transition:0.8s;
}
tr .images{
  text-align:center;
  padding-right:0px;
  width:10px;
}
#tables:hover{
cursor:pointer;

}
tr:hover{
  background-color:black !important;
  transition:0.8s !important;
  color:white !important;
}
.mgs-content{
  /* background-color:red; */
  height:470px;
  overflow:auto;
}
.right-lower-part .btn{
width:150px;
margin-bottom:2px;
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
  
<!-- __________________________________Starting of message Page____________________________________-->

<div class="container  d-flex">
<!-- __________________________________For left side div____________________________________-->
<div class="mr-3 left">
<!-- ___________________For left from_____________________-->

<form action="" method="post">
<div class="d-flex container mt-3 mb-2">
<input type="text" name="shows"  id="SHOW" placeholder="Student Name" class="form-control">
<button class="btn btn-info ml-2 mr-2" type="submit" name="displays" style="width:100px;">Show</button>
</div>
</form>
<br>
<!-- ___________________Ending of left from_____________________-->
<?php
$sql1 = mysqli_query($con,"SELECT userName FROM messages WHERE sender = 'student' GROUP BY userName");
?>
<table class="table table-hover" id ="tables">
<?php
while($row1 = mysqli_fetch_assoc($sql1)){
  ?>
  <tr>
  <td class="images">
  <img src="../images/profile_pic.png" alt="profile picture"
style="height:45px;width:45px;border-radius:50%;border:3px black solid;padding:0px;margin:0px;">
  </td>
  <td class="lead pt-2">
  <?php echo $row1["userName"]; ?>
  </td>
  </tr>
<?php
}
?>
</table>

</div>

<!-- __________________________________For right side div____________________________________-->
<div class="ml-3 right">
<?php 
if(isset($_POST["displays"])){
  $_SESSION["name"] = $_POST["shows"];
  ?>
<!-- <h3 class="text-center text-white bg-dark py-2 mt-3"><?php echo $_SESSION["name"];?></h3> -->
<?php
}
if(isset($_SESSION["name"])){
  ?>
<h3 class="text-center text-white bg-dark py-2 mt-3"><?php echo $_SESSION["name"];?></h3>
<?php
}
?>
<div class="mgs-content">
<?php
if(isset($_POST["Send"])){
  mysqli_query($con,"INSERT INTO messages VALUES ('','$_SESSION[name]','$_POST[messages]','no','admin')");
  $res = mysqli_query($con,"SELECT * FROM messages WHERE userName ='$_SESSION[name]'");
  while($row = mysqli_fetch_assoc($res)){
    if($row['sender'] == 'student'){
      ?>
    <div class="d-flex">
 <p class="lead pl-2 text-white" style="background-color:#192c6ff0;width:90%;height:50px;border-radius:5px;"> <?php echo $row['messages'];?></p>
 <img src ="../images/profile_pic.png" alt="profile picture"
 class="ml-2 mr-2" style="height:50px;width:50px;border-radius:50%;padding:0px;margin:0px;">
 </div> 
 <?php
    }else{
     ?>
      <div class="d-flex flex-row-reverse">
 <p class="lead pl-2 text-white" style="background-color:#692642e0;width:90%;height:50px;border-radius:5px;"><?php echo $row['messages']?></p>
 <img src ="../images/profile_pic.png" alt="profile picture"
 class="ml-2 mr-2" style="height:50px;width:50px;border-radius:50%;padding:0px;margin:0px;">
 </div>
 <?php
   }
  }
  // mysqli_query($con,"UPDATE message SET statuss ='yes' WHERE sender='admin' AND userName ='$_SESSION[login_user]'");
 } else{
   $res = mysqli_query($con,"SELECT * FROM messages WHERE userName ='$_SESSION[name]'");
     while($row = mysqli_fetch_assoc($res)){
       if($row['sender'] == 'student'){
         ?>
       <div class="d-flex">
 <p class="lead pl-2 text-white" style="background-color:#192c6ff0;width:90%;height:50px;border-radius:5px;"> <?php echo $row['messages'];?></p>
 <img src ="../images/profile_pic.png" alt="profile picture"
   class="ml-2 mr-2" style="height:50px;width:50px;border-radius:50%;padding:0px;margin:0px;">
 </div> 
 <?php
       }else{
         ?>
          <div class="d-flex flex-row-reverse">
 <p class="lead pl-2 text-white" style="background-color:#692642e0;width:90%;height:50px;border-radius:5px;"><?php echo $row['messages']?></p>
 <img src ="../images/profile_pic.png" alt="profile picture"
 class="ml-2 mr-2" style="height:50px;width:50px;border-radius:50%;padding:0px;margin:0px;">
 </div>
    <?php
       }
     }
    //  mysqli_query($con,"UPDATE message SET statuss ='yes' WHERE sender='admin' AND userName ='$_SESSION[login_user]'");
   }

?>

</div>


  <!-- _____________________For sending button code______________________________________-->
  <form action="" method="post">
  <div class="d-flex container mt-2 mb-2 right-lower-part">
  <input type="text" name="messages" id="Message" class="form-control m-1" placeholder="Write message...">
  <button class="btn btn-info m-1" type="submit" name="Send"> <i class="fa fa-paper-plane m-1" aria-hidden="true"></i>Send</button>
  </div>
  </form>
  
  <!-- _____________________Ending for sending button code______________________________________-->
  


<!-- _____________________For showing userName at thew top______________________________________-->

<!-- _____________________Message content______________________________________-->
</div>
<!-- __________________________________Ending of rigth side div____________________________________-->
</div>
<!-- __________________________________Ending of message Page____________________________________-->

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

<script>
var tables = document.getElementById("tables"),eIndex;
for(var i = 0; i<tables.rows.length;i++){
  tables.rows[i].onclick = function(){
    rIndex = this.rowIndex;
    document.getElementById("SHOW").value = this.cells[1].innerHTML;
  }
}
</script>