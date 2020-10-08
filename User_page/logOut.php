<?php
session_start();
if(isset($_SESSION["login_user"])){
unset($_SESSION["login_user"]);
header("location:./user_logIn.php");
}
?>
<!-- <script> window.location="./user_logIn.php" </script> -->