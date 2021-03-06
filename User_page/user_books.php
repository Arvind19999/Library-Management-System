<?php
$page = 'books';
require_once "./header.php";
require_once "../components.php";
require_once "./connection.php";
?>
<!-- ______________Stying for side navbar______________________-->
<style>
#activess{
    font-weight:800;
 }

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
  back
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

</style>
<!-- ____________Ending of side navBar styling________________-->

<!-- ____________Code for side navbar ________________-->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a class="sideNav" href="./student_info.php" style="background-color:#48cae4;">
   <img src="../images/profile_pic.png" alt="My_profile"
   style="height:100px;
 border-radius:50%;width:100px;margin-left:30px;"><p class="lead ml-5 text-white"><?php echo $_SESSION["login_user"];?></p></a>
  <a class="sideNav p-3 mt-5" href="./user_books.php">Books</a>
  <a class="sideNav p-3 " href="./book_request.php">Book Request</a>
  <a class="sideNav p-3 " href="./expired.php">Expired</a>
  <a class="sideNav p-3 " href="#">Fines</a>
</div>

<div id="main">
  <h2></h2>
  <span style="font-size:30px;cursor:pointer;margin-top:2rem;position:relative;top:25px;"
   onclick="openNav()">&#9776; </span>
  
<!-- ____________Starting of books page________________-->
<div class="search-form" style="padding-top:15px;">
<!-- ____________For Searching________________-->
<form action="user_books.php" method="post">
<div class="d-flex justify-content-end">
<?php inputComponent("search","","Search_bar","Search books","form-control text-muted w-10","text","","searchBook");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="search"> <i class="fa fa-search"></i> </button>
</div>
</form>
<!-- ____________For Requesting for books________________-->
<form action="user_books.php" method="post">
<div class="d-flex justify-content-end">
<?php inputComponent("request","","request_bar","Enter book Id","form-control text-muted w-10","text","","requestBook");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="request"> Request </button>
</div>
</form>
<!-- ____________Ending request________________-->
<h2 class="display-4 books-heading">List Of Books</h2>
<?php 
if(isset($_POST["search"])){
  $BOOKNAME = $_POST["searchBook"];
  $q = mysqli_query($con,"SELECT * FROM books WHERE bookName LIKE '%$BOOKNAME%'");
  if(mysqli_num_rows($q)==0){
    echo"<p class='text-center pt-2' style='height:50px;width:55%;color:white;
    font-size:1.5rem;background-color:#48cae4;'>Sorry! No books with that name exist</p>";
  }else{
    echo"<table class='table table-bordered table-hover'";
    echo"<tr>";
    echo"<th style='background-color:#48cae4'>"; echo"ID";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Books";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Author";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Edition";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Department";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Quantity";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Status";echo"</th>";echo"</tr>";
    while($row = mysqli_fetch_assoc($q)){
        echo"<tr>";
        echo"<td>"; echo $row['book_id'];echo"</td>";
        echo"<td>"; echo $row['bookName'];echo"</td>";
        echo"<td>"; echo $row['authorName'];echo"</td>";
        echo"<td>"; echo $row['editions'];echo"</td>";
        echo"<td>"; echo $row['bookStatus'];echo"</td>";
        echo"<td>"; echo $row['quantity'];echo"</td>";
        echo"<td>"; echo $row['department'];echo"</td>";echo"</tr>";
        }
      echo"</table>";
  }

}else{
  $res = mysqli_query($con,"SELECT * FROM books ORDER BY book_id DESC");
echo"<table class='table table-bordered table-hover'";
echo"<tr>";
echo"<th style='background-color:#48cae4'>"; echo"ID";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Books";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Author";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Edition";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Department";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Quantity";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Status";echo"</th>";echo"</tr>";
while($row = mysqli_fetch_assoc($res)){
    echo"<tr>";
    echo"<td>"; echo $row['book_id'];echo"</td>";
    echo"<td>"; echo $row['bookName'];echo"</td>";
    echo"<td>"; echo $row['authorName'];echo"</td>";
    echo"<td>"; echo $row['editions'];echo"</td>";
    echo"<td>"; echo $row['bookStatus'];echo"</td>";
    echo"<td>"; echo $row['quantity'];echo"</td>";
    echo"<td>"; echo $row['department'];echo"</td>";echo"</tr>";
    }
  echo"</table>";
  
}

?>
</div>
<!-- ____________Ending of books Page________________-->

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
<!-- ____________Ending code for  side navBar ________________-->



<?php
if(isset($_POST["request"])){
$z = array();
  $REQUESTS = $_POST["requestBook"];
  $sql = "SELECT book_id FROM books";
  $rest = mysqli_query($con,$sql);
  while($row = mysqli_fetch_assoc($rest)){
    $z[] = $row["book_id"];
  }
  if(in_array($REQUESTS,$z)){
$inserts  ="INSERT INTO request_books VALUES('$REQUESTS','$_SESSION[login_user]','','','')";
mysqli_query($con,$inserts);
?>
<script>alert("Book is requested");
// window.location="./issue_info.php";
</script>
  <?php 
  }else{
    ?>
<script>alert("Please enter valid book Id");</script>
  <?php
  }
}
?>









