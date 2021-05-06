<?php
$page = 'message';
require_once "./header.php";
require_once "../components.php";
require_once "./connection.php";
// session_start();
?>
<!-- ______________Stying for side navbar______________________-->
<style>
#activess{
    font-weight:900 !important;
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
  padding: 10px;
  background-image: url("../images/message_background.png");
    background-repeat: no-repeat;
    background-size: cover;
    height:100vh;
}
.sideNav{
  text-transform: uppercase;
}
span{
color:yellow;
}
.box{
    height:600px;
    background-color:black;
    width:35%;
    margin:auto;
    /* opacity:0.5; */
}
.bg-admin{
    padding-top:7px;
    height:55px;
    background-color:#0dbab8c9;

}
.message-content{
    /* background-color:yellow; */
    height:480px;
    padding-top:-5px;
    overflow:auto;
}
.form-control{
  width:75%;
height :50px;
margin-right:5px;
margin-top:3px;
}
.btn{
  width:130px;
  font-weight:bolder;
 font-size:1.1rem;
 background-color:#0dbab8c9;
}
.lead{
  font-size:1.1rem;
}
p{
  padding-top:8px;
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

  <!-- ________________________Statrting of message part______________________________-->
   <div class="box text-white">
  <!-- ___________________________For admin heading_______________________________________-->
  <div class="headings"><h3 class="bg-admin text-center">Admin</h3></div>
  <!--____________________________for message body_________________________________________-->
<div class="message-content">
<!-- _____________________________________For Student side____________________________________ -->
<?php
    mysqli_query($con,"UPDATE messages SET statusss = 'yes' WHERE userName= '$_SESSION[login_user]' AND sender = 'admin'");

if(isset($_POST["Send"])){
  
 mysqli_query($con,"INSERT INTO messages VALUES ('','$_SESSION[login_user]','$_POST[messages]','no','student')");
 $res = mysqli_query($con,"SELECT * FROM messages WHERE userName ='$_SESSION[login_user]'");
 while($row = mysqli_fetch_assoc($res)){
   if($row['sender'] == 'student'){
     ?>
   <div class="d-flex">
<p class="lead pl-2" style="background-color:#192c6ff0;width:90%;height:50px;border-radius:5px;"> <?php echo $row['messages'];?></p>
<img src ="../images/profile_pic.png" alt="profile picture"
class="ml-2 mr-2" style="height:50px;width:50px;border-radius:50%;padding:0px;margin:0px;">
</div> 
<?php
   }else{
    ?>
     <div class="d-flex flex-row-reverse">
<p class="lead pl-2" style="background-color:#692642e0;width:90%;height:50px;border-radius:5px;"><?php echo $row['messages']?></p>
<img src ="../images/profile_pic.png" alt="profile picture"
class="ml-2 mr-2" style="height:50px;width:50px;border-radius:50%;padding:0px;margin:0px;">
</div>
<?php
  }
 }
 mysqli_query($con,"UPDATE message SET statuss ='yes' WHERE sender='admin' AND userName ='$_SESSION[login_user]'");
} else{
  $res = mysqli_query($con,"SELECT * FROM messages WHERE userName ='$_SESSION[login_user]'");
    while($row = mysqli_fetch_assoc($res)){
      if($row['sender'] == 'student'){
        ?>
      <div class="d-flex">
<p class="lead pl-2" style="background-color:#192c6ff0;width:90%;height:50px;border-radius:5px;"> <?php echo $row['messages'];?></p>
<img src ="../images/profile_pic.png" alt="profile picture"
  class="ml-2 mr-2" style="height:50px;width:50px;border-radius:50%;padding:0px;margin:0px;">
</div> 
<?php
      }else{
        ?>
         <div class="d-flex flex-row-reverse">
<p class="lead pl-2" style="background-color:#692642e0;width:90%;height:50px;border-radius:5px;"><?php echo $row['messages']?></p>
<img src ="../images/profile_pic.png" alt="profile picture"
class="ml-2 mr-2" style="height:50px;width:50px;border-radius:50%;padding:0px;margin:0px;">
</div>
   <?php
      }
    }
    mysqli_query($con,"UPDATE message SET statuss ='yes' WHERE sender='admin' AND userName ='$_SESSION[login_user]'");
  }
mysqli_query($con,"UPDATE message SET statuss ='yes' WHERE sender='admin' AND userName ='$_SESSION[login_user]'");
?>

<!--__________________________________________Ending For student side________________________________ -->

<!-- _________________________________________For admin side ___________________________________________-->

<!--________________________________________________Ending For admin side___________________________________ -->
</div>

<form action="" method="post">
<!-- ________________________________________________For sending message input and send button________________________________________________-->
<div class="d-flex">
<input type="text" name="messages" id="Message" class="form-control" placeholder="Write message...">
<button class="btn btn-info m-1" type="submit" name="Send"> <i class="fa fa-paper-plane m-1" aria-hidden="true"></i>Send</button>
</div>
</div>
<!-- __________________________________________________________Ending of message part________________________________________-->
</form>

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


