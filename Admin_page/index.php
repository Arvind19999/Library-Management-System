<?php
$page = 'adminLogin';
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
session_start();
?>

<style>
#activess{
  font-weight:800;
}
</style>
<div class="container signUp-login-content">
  <div class="signUp-login">
  <div class="admin-img"><h4 class="display-4 text-white text-center"
  style="font-size:2rem; padding-top:80px;">
  Admin Login Form</h4></div>
    <div class="container p-4 ml-5 adminClass">
    <form action="" method="post">

      <?php
    inputComponent("name","Enter userName","Name","userAdmin","form-control text-muted px-4","text","fa fa-user icon","adminname");
    inputComponent("password","Password","Password","Password","form-control text-muted px-4","password","fa fa-lock icon","adminpassword");
    buttonComponent("btn btn-outline-dark w-75","transition-delay:0.1s;margin:0px; border-radius:20px;","submit","admin_login","admin_id","Loign");
    // dataBase();
     ?>
     
</div>
</form>
    </div>
  </div>

  <?php
if(isset($_POST["admin_login"])){
  $USERNAME = $_POST["adminname"];
  $PASSWORD = $_POST["adminpassword"];
  $count = 0;
  $sql = "SELECT * FROM admin_signup WHERE userName = '$USERNAME' AND passwords = '$PASSWORD'";
  $row = mysqli_fetch_assoc($sql);
  $res = mysqli_query($con,$sql);
  $count = mysqli_num_rows($res);
  if($count == 1){
    $_SESSION["login_user"] = $USERNAME;
    $_SESSION["images"] = $row["images"]; 
    ?>
   <script> window.location="./header.php"</script>
<?php
 }else if(($USERNAME == "") OR ($PASSWORD == "")){
  ?>
  <script>alert("Please fill up all the fields");</script>
<?php
}else{?>
   <script>alert("Invalid userName and password");</script>
<?php
}
}
?>