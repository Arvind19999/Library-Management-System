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
.container{
  height:800px;
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
  <a class="sideNav p-3 " href="./book_request.php">Book Request</a>
  <a class="sideNav p-3 " href="./request_status.php">Request Status</a>
  <a class="sideNav p-3 " href="./issue_info.php">Book Issue info</a>
  <a class="sideNav p-3 " href="./expired.php">Expired Lists</a>
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
<p class="lead text-center text-white">Book Approval Form</p>
<form action="./request_status.php" method="post">
<div cleass = "d-felx flex-row">
<?php 
// dataBase();
inputComponent("book_id","Book ID","book-id","Enter book id ","form-control","number","","book-id");
inputComponent("userName","userName","user-id","Enter userName","form-control","text","","userName");
inputComponent("approveStatus","Approve","approve-id","Yes or No","form-control","text","","approveStatus");
inputComponent("issueDate","issueDate","issueDate-id","Enter issueDate","form-control","text","","issueDate");
inputComponent("returnDate","returnDate","returnDate-id","Enter returnDate","form-control","text","","returnDate");
buttonComponent("btn btn-outline-dark","width:100%;border-radius:20px;","submit","approve-status","addBook-id","Submit");
?>
</form>
<?php
if(isset($_POST["approve-status"])){
  $ID          = $_POST["book-id"];
  $USERNAME    = $_POST["userName"];
  $APPROVESTATUS  = $_POST["approveStatus"];
  $ISSUEDATE     = $_POST["issueDate"];
  $RETURNDATE  = $_POST["returnDate"];
// $sql = "UPDATE request_books SET approve = '$APPROVESTATUS',issueDate = '$ISSUEDATE',returnDate = '$RETURNDATE' 
// WHERE bookId = '$ID' AND userName = '$USERNAME'";

// $z = "SELECT approve FROM request_books WHERE bookId = '$ID' AND userName = '$USERNAME'";
// $res = mysqli_query($con,$z);
if($APPROVESTATUS == "Yes"){
  $sql = "UPDATE request_books SET approve = '$APPROVESTATUS',issueDate = '$ISSUEDATE',returnDate = '$RETURNDATE' 
WHERE bookId = '$ID' AND userName = '$USERNAME'";
mysqli_query($con,$sql);
  $q ="UPDATE books SET quantity = quantity-1  WHERE book_id = '$ID'";
  mysqli_query($con,$q);

  $t = "SELECT quantity FROM books WHERE book_id ='$ID'";
$res=   mysqli_query($con,$t);
while($row = mysqli_fetch_assoc($res)){
if($row["quantity"] == 0){
  $ql ="UPDATE books SET bookStatus = 'not Available'  WHERE book_id = '$ID'";
  mysqli_query($con,$ql);
}
}
?>
  <script>alert("Book Approval Message is sent");</script>
<?php
}else if($APPROVESTATUS == "No"){
  $sql = "UPDATE request_books SET approve = '$APPROVESTATUS',issueDate = '$ISSUEDATE',returnDate = '$RETURNDATE' 
WHERE bookId = '$ID' AND userName = '$USERNAME'";
  mysqli_query($con,$sql);
  $q ="UPDATE books SET quantity = quantity  WHERE book_id = '$ID'";
  mysqli_query($con,$q);
  ?>
<script>alert("Book is not approved");</script>
<?php
}else{
  ?>
 <script>alert("Fill the data correctly");</script>
<?php
}
// echo mysqli_num_rows($res);
// $arr = array();
// while($row = mysqli_fetch_assoc($res)){
// $arr[]  = $row["approve"];
// }
// if(in_array("Yes",$arr)){
//   echo"appropval is  sent";
// }else{
//   echo"Applroval is not sent";
// }

}
?>
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