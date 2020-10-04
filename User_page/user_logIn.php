<?php 
require_once "../Admin_page/header.php";
require_once "../components.php";
?>

<div class="container signUp-login-content">
  <div class="d-flex justify-space-between signUp-login" style="width:75%;height:60vh;">
    <div class="login-img">
      <div class="py-4 px-2">
      <h3 class="text-white text-center" style="font-size:2rem;font-weight:bold;">LogIn</h3>
    <p class="text-white  text-center">LogIn here to connect with us and widen your knowledge with this books....</p> 
<a href="user_signUp.php"><?php 
buttonComponent("btn btn-dark w-100","border-radius:20px;margin-top:150px;","button","signUp-btn","signUp-id","Create An Account");
?></a>    
  </div>
    </div>
    <div class="p-4 signUp-content w-50">
<form action="" method="">
<?php 
inputComponent("name","Enter userName","Name","Enter your name","form-control text-muted px-4","text","fa fa-user icon","loginname");
inputComponent("password","Password","Password","Password","form-control text-muted px-4","password","fa fa-lock icon","loginpassword");
?>
<input type="checkbox" style="width:5%;" name="checkbox" id="checkbox1"><label for="checkbox">Remember Me</label>
<span class="ml-5" style="cursor:pointer;">Forget Password?</span>
<?php
buttonComponent("btn btn-outline-primary w-100 mt-4","border-radius:20px;","button","login-btn","logIn-id","LogIn");
?>

</form>
    </div>

  </div>
  </div>