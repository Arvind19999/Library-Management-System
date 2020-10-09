<?php
session_start();
if(isset($_SESSION["login_user"])){
unset($_SESSION["login_user"]);
header("location:./index.php");
}
?>
<!-- <script> window.location="./index.php" </script> -->