<?php 
// require_once "../components.php";
// require_once "./connection.php";
// require_once "./header.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">   
       <link rel="stylesheet" href="../style.css">
       <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

</head>
<body>
 <!-- Navbar for LMS --> 
<nav class="navbar navbar-expand-lg navbar-light bg-light" 
style="border-bottom:3px blue solid;position:fixed; width:100%;">
 <!-- <div class="container"> -->
 <a class="navbar-brand" href="#">
 <img src="../images/LMS_logo.png" class="img_logo" alt="Logo for LMS">
 <em> &nbsp;LMS</em></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <?php
     if(isset($_SESSION["login_user"])){
      ?>

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
         <a class="nav-link" href="#">home</a>
       </li>
        <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
         <a class="nav-link" href="./user_books.php">books</a>
       </li>
       <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
         <a class="nav-link" href="./feed_back.php">feedback</a>
       </li>
      </ul>
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
   <a class="nav-link" href="./student_info.php">
        <img src ="../images/profile_pic.png" alt="profile picture"
        style="height:35px;width:35px;border-radius:50%;padding:0px;margin:0px;">
        </a>
    </li>
     <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
      <a class="nav-link" href="./logOut.php">logme out</a>
    </li>
      </ul>
    <?php
    }else
    {
      ?>
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
         <a class="nav-link" href="../Admin_page/index.php">Admin Login</a>
       </li>
        <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
         <a class="nav-link" href="./user_logIn.php">User LogIn</a>
       </li>
       <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
         <a class="nav-link" href="./user_signUp.php">User SignUp</a>
       </li>
 
      </ul>  
<?php    
}
    
    ?>
    <!-- <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
     <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
        <a class="nav-link" href="../Admin_page/index.php">Admin Login</a>
      </li>
       <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
        <a class="nav-link" href="../User_page/user_logIn.php">User LogIn</a>
      </li>
      <li class="nav-item px-3 my-1" style="font-size:1.1rem; text-transform: uppercase;">
        <a class="nav-link" href="../User_page/User_signUp.php">User SignUp</a>
      </li>

     </ul> -->
  </div>
 <!-- </div> -->
</nav>



<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>