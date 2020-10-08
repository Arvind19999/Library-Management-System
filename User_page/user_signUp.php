<?php 
require_once "./connection.php";
require_once "./header.php";
require_once "../components.php";

// $con = dataBase();
?>
<div class="container signUp-login-content">
  <div class="d-flex justify-space-between signUp-login" style="width:80%;height:105vh;">
    <div class="register-img">
      <div class="py-4 px-2">
      <h3 class="text-white text-center" style="font-size:2rem;font-weight:bold;">SignUp</h3>
    <p class="text-white  text-center">SignUp here to connect with us and widen your knowledge with this books....</p> 
<a href="user_logIn.php"><?php 
buttonComponent("btn btn-dark w-100","border-radius:20px;margin-top:350px;","submit","signUp-btn","signUp-id","Have An Account? LogIn");
?></a>    
  </div>
    </div>
    <div class="p-4 signUp-content w-50">
<form name="Registrstion" action="user_signUp.php" method="post">
<?php
inputComponent("fname","First Name","fName","Enter your fname","form-control text-muted px-4","text","fa fa-user icon","fname");
inputComponent("lname","Last Name","lName","Enter your lname","form-control text-muted px-4","text","fa fa-user icon","lname");
inputComponent("name","Enter userName","Name","Enter your name","form-control text-muted px-4","text","fa fa-user icon","username");
inputComponent("roll","Roll No.","Roll","Enter your rol no.","form-control text-muted px-4","number","fa fa-lock icon","roll_no");
inputComponent("number","Phone","Number","Enter your number","form-control text-muted px-4","number","fa fa-phone icon","phone_no");
inputComponent("email","E-mail","Email","eaxmple@gmail.com","form-control text-muted px-4","email","fa fa-envelope icon","email");
inputComponent("password","Password","Password","Password","form-control text-muted px-4","password","fa fa-lock icon","passwords");
buttonComponent("btn btn-outline-primary w-100","border-radius:20px;","submit","signUp-btn","signUp-id","SignUp");

?>

</form>
    </div>
  </div>
  </div>
  <?php
// Clicking on signup button to insert data
  if(isset($_POST["signUp-btn"])){
    // checking for if any field is empty
    $FNAME = $_POST["fname"];
    $LNAME = $_POST["lname"];
    $USERNAME = $_POST["username"];
    $ROLLNO = $_POST["roll_no"];
    $PHONENO = $_POST["phone_no"];
    $EMAIL = $_POST["email"];
    $PASSCODE = $_POST["passwords"];
    $count = 0;
    $sql = "SELECT userName FROM students";
    $res = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($res)){
     if($row['userName']==$_POST['username']){
       $count++;
     }
      }  //Endingf while loop
  if($count == 0){
    // Inserting data in table
    if($FNAME && $LNAME && $USERNAME && $ROLLNO && $PHONENO && $EMAIL && $PASSCODE){
    $sql = "INSERT INTO students VALUES('$FNAME','$LNAME','$USERNAME',
    '$ROLLNO','$PHONENO','$EMAIL','$PASSCODE','profile_pic.png')";
  if(mysqli_query($con,$sql)){?>
 <script type="text/javascript">
 alert("Registration is completed");
 </script>
   <?php
  }else{
    echo"data is not inserted".mysqli_error($con);
  }
  }else{
   ?>
   <script>
   alert("Please fill all the fields");
   </script>
   <?php
  }
  }else{
    ?>
<script>
alert("userName:-<?php echo$_POST['username'] ?> already exists");
</script>
<?php  }
}

?>




