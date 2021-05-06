<?php
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>
<!-- ______________Stying for side navbar______________________-->
<style>
/* body {
  font-family: "Lato", sans-serif;
} */

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
  <a class="sideNav p-3 " href="./expired.php">Expired List</a>
</div>

<div id="main">
  <h2></h2>
  <span style="font-size:30px;cursor:pointer;margin-top:2rem;position:relative;top:25px;"
   onclick="openNav()">&#9776; </span>
  
<!-- ____________Starting of books page________________-->
<!-- ____________for searching button________________-->
<div class="search-form" style="padding-top:15px;">

<!-- ____________Ending of delete books btn________________-->
</form>
<h2 class="display-4 books-heading text-center">List Of Borrowed Books</h2>
<?php 
if(isset($_SESSION["login_user"])){
  $c  =0;
  $q = mysqli_query($con,"SELECT students.userName,rollNo,books.book_id,authorName,editions,quantity,department,issueDate,returnDate FROM students 
  INNER JOIN request_books ON students.userName = request_books.userName INNER JOIN books ON request_books.bookId = books.book_id WHERE request_books.approve = 'Yes'");
 
    echo"<table class='table table-bordered table-hover'";
    echo"<tr>";
    echo"<th style='background-color:#48cae4'>"; echo"userName";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"RollNo";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Book_Id";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"authorName";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Editions";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Quantity";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Department";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"issueDate";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"returnDate";echo"</th>";
    echo"</tr>";
    
    while($row = mysqli_fetch_assoc($q)){
        $d = date("yy-m-d");
           
       if($d>$row['returnDate']) {
         $c = $c+1;
         $exp = '<p class="bg-danger" style ="color:yellow;">Expired</p>';
         mysqli_query($con,"UPDATE request_books SET approve = '$exp' WHERE returnDate = '$row[returnDate]' AND approve = 'Yes' LIMIT $c");
         echo "  ".$d;
        }   
        echo"<tr>";
        echo"<td>"; echo $row['userName'];echo"</td>";
        echo"<td>"; echo $row['rollNo'];echo"</td>";
        echo"<td>"; echo $row['book_id'];echo"</td>";
        echo"<td>"; echo $row['authorName'];echo"</td>";
        echo"<td>"; echo $row['editions'];echo"</td>";
        echo"<td>"; echo $row['quantity'];echo"</td>";
        echo"<td>"; echo $row['department'];echo"</td>";
        echo"<td>"; echo $row['issueDate'];echo"</td>";
        echo"<td>"; echo $row['returnDate'];echo"</td>";
        echo"</tr>";
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







