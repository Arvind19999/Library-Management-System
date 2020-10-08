<?php
require_once "./header.php";
require_once "../components.php";
require_once "./connection.php";
?>
<style>
    .stdInfo{
        background-color:#0b5d1e;
        height:100vh;padding-top:140px;
    }
    .updateProfile{
        height:550px;
        /* background-color:red; */
    }
td{
    color:white;
}
</style>
<div class=stdInfo>
<div class="container updateProfile">
  <div class="d-flex justify-content-end">
  <?php 
    buttonComponent("btn btn-info","","submit","Edit-btn","Edit","Edit Profile");
    ?>
  </div>
<div class="imgSection">
 <img src="../images/profile_pic.png" alt="My_profile" style="margin-left:500px;height:100px;
 border-radius:50%;width:100px;">
 <h4 class="display-4 text-center" style="font-size:2.2rem;color:white;">Welcome<?php echo" ".$_SESSION["login_user"]; ?></h4>
</div>
<div class="stdContent">
<?php
  $res = mysqli_query($con,"SELECT fname,lname,lname,userName,rollNo,phoneNo,email,passwords FROM students WHERE userName = '$_SESSION[login_user]'");
while($row = mysqli_fetch_assoc($res)){?>
   <table class="table mt-5 table-bordered table:hover" style="background-color:#0b5d1e;">
   <tr>
       <td style="font-weight:bolder;">Fname</td>
       <td><?php echo $row["fname"];?></td>
   </tr>
   <tr>
   <td style="font-weight:bolder;">Lname</td>
    <td><?php echo $row["lname"];?></td>
   </tr>
   <tr>
   <td style="font-weight:bolder;">userName</td>
    <td><?php echo $row["userName"];?></td>
   </tr>
   <tr>
   <td style="font-weight:bolder;">RollNo.</td>
       <td><?php echo $row["rollNo"];?></td>
   </tr>
   <tr>
   <td style="font-weight:bolder;">Phone</td>
       <td><?php echo $row["phoneNo"];?></td>
   </tr>
   <tr>
   <td style="font-weight:bolder;">Email</td>
       <td><?php echo $row["email"];?></td>
   </tr>
   <tr>
   <td style="font-weight:bolder;">Password</td>
       <td><?php echo $row["passwords"];?></td>
   </tr>
   </table>
<?php
}
?>
</div>
</div> <!--endig ob update profile section -->
</div>