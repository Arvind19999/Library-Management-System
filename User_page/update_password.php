<?php
require_once "./header.php";
require_once "./connection.php";
require_once "../components.php";
?>
<style>
    .update-password{
    padding-top:90px;
    height:100vh;
    background-color:#e9efee;
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
</style>

<div class="update-password">
<div class="container">
<div class="updateContent m-auto">
<h4 class="display-4 text-center text-white">Linrary Management System</h4>
<p class="lead text-center text-white">Update Your Password</p>
<form action="#" method="post">
<?php 
inputComponent("name","userName","userNames","Enter your user name","form-control pl-4","text","fa fa-user","userName");
inputComponent("email","Email","update-email","Enter your email","form-control pl-4","email","fa fa-envelope","email");
inputComponent("phone","PhoneNo","Phone","Enter your phone no.","form-control pl-4","number","fa fa-phone","phoneNo");
inputComponent("password","New Password","Password","Enter new password","form-control pl-4","password","fa fa-lock","passwords");
buttonComponent("btn btn-outline-dark","width:100%;border-radius:20px;","submit","update-password","Update","Change Password");
?>
</form>
</div>
</div>
</div>

<?php
if(isset($_POST["update-password"])){
    $USERNAME = $_POST["userName"];
    $EMAIL = $_POST["email"];
    $PHONENO = $_POST["phoneNo"];
    $PASSWORD = $_POST["passwords"];
$sql = "UPDATE students SET passwords = '$PASSWORD' WHERE username = '$USERNAME' AND email = '$EMAIL'";
if(mysqli_query($con,$sql)){?>
   <script>alert("Password Updated Successfully");</script>
<?php
}
}
?>