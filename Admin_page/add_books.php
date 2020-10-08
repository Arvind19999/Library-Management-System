<?php
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>
<style>
    /*______________ Starting of add books styling _________________*/
    
    .update-password{
    padding-top:90px;
    height:100%;
    background-color:#e9efee;
    margin:-28px;
}
.updateContent{
        height:550px;
        background-color:rgb(0 123 255 / 12%);
        width:65%;
        margin:auto;
        box-shadow: 3px 3px 9px -3px rgba(0,0,0,0.5);
    }
    .updateContent .form-control{
        width:100%;
    }
    .fa{
  position: relative;
  top:-30px;
  left:10px;
}
.form-group{
    margin-left:150px;
    margin-right:150px;
}
    /* ______________________Ending of add books styling ______________________*/
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
  <a class="sideNav p-3 " href="#">Delete books</a>
  <a class="sideNav p-3 " href="#">notification</a>
  <a class="sideNav p-3 " href="#">sdt Mgs</a>
</div>

<div id="main">
  <h2></h2>
  <span style="font-size:30px;cursor:pointer;margin-top:2rem;position:relative;top:25px;"
   onclick="openNav()">&#9776; </span>
  
<!-- ____________Starting of books page________________-->
<div class="search-form" style="padding-top:15px;">

<div class="update-password">
<div class="container">
<div class="updateContent m-auto">
<h4 class="display-4 text-center text-white">Linrary Management System</h4>
<p class="lead text-center text-white">Update Books</p>
<form action="#" method="post">
<?php 
inputComponent("name","userName","userNames","Enter your user name","form-control pl-4","text","fa fa-user","userName");

buttonComponent("btn btn-outline-dark","width:100%;border-radius:20px;","submit","update-password","Update","Change Password");
?>
</form>
</div>
</div>
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













