<?php
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>
<style>
    .stdInfo{
        background-color:#0b5d1e;
        height:800px;padding-top:140px;
    }
    .updateProfile{
        height:550px;
  
    }
td{
    color:white;
}
form{
    margin-left:300px;
}
label{
    color:white;
}
.form-control{
    width:60%;
}
.btn{
    width:485px;
    margin-top:15px;
    border-radius:20px;
}
</style>

<?php
if($_SESSION["login_user"]){
    $sql = "SELECT * FROM admin_signup WHERE userName = '$_SESSION[login_user]'";
    $res = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($res)){
        $first = $row["fname"];
        $last = $row["lname"];
        $userName= $row["userName"];
        $phoneNo = $row["phone"];
        $Email= $row["email"];
        $Passwordss = $row["passwords"];
    }
}
?>
<div class=stdInfo>
<div class="container updateProfile">

<div class="imgSection">
 <img src="../images/profile_pic.png" alt="My_profile" style="margin-left:500px;height:100px;
 border-radius:50%;width:100px;">
 <h4 class="display-4 text-center" style="font-size:2.2rem;color:white;">Welcome<?php echo" ".$_SESSION["login_user"];?></h4>
</div>
<form action="" method="post">
<div class="form-group">
    <label for="Fname"><strong>FirstName</strong></label>
    <input type="text" class="form-control" id="first_name" placeholder="" name ="firstNames" value = "<?php echo $first;?>">
  </div>
  <div class="form-group">
    <label for="LName"><strong>LastName</strong></label>
    <input type="text" class="form-control" id="last_name" placeholder="" name ="lastNames" value = "<?php echo $last;?>">
  </div>

<div class="form-group">
    <label for="userName"><strong>userName</strong></label>
    <input type="text" class="form-control" id="user_name" placeholder="" name ="userNames" value = "<?php echo $userName;?>">
  </div>

  <div class="form-group">
    <label for="phoneno"><strong>PhoneNo<strong></label>
    <input type="text" class="form-control" id="phone" placeholder="" name = "phoneNos" value = "<?php echo $phoneNo;?>">
  </div>

  <div class="form-group">
    <label for="email"><strong>Email<strong></label>
    <input type="text" class="form-control" id="email" placeholder="" name = "emails" value = "<?php echo $Email;?>">
  </div>

  <div class="form-group">
    <label for="passwords"><strong>Password<strong></label>
    <input type="text" class="form-control" id="passwords" placeholder="" name="passwords" value = "<?php echo $Passwordss;?>">
  </div>

<button class="btn btn-info" type="submit" name="update-profile">Save</button>
</form>
</div> <!--endig ob update profile section -->
</div>
<?php
if(isset($_POST["update-profile"])){
  $first = $_POST["firstNames"];
  $last = $_POST["lastNames"];
  $userName= $_POST["userNames"];
  $phoneNo = $_POST["phoneNos"];
  $Email= $_POST["emails"];
  $Passwordss = $_POST["passwords"];
  $q = "UPDATE admin_signup SET fname = '$first',lname ='$last',userName='$userName',phone='$phoneNo',
   email='$Email',passwords='$Passwordss' WHERE userName='$_SESSION[login_user]'";
   if(mysqli_query($con,$q)){
     ?>
   <script>alert("Profile Updated Successfully");</script>
  <?php
   }else{
     ?>
    <script>alert("Something went wrong");</script>
  <?php 
  }
}
 ?>



