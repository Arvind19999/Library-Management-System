<?php
$page = 'books';
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>
<!-- ______________Stying for side navbar______________________-->
<style>
#activess{
    font-weight:800;
 }
.edit-btn{
  color:orange;
}
.Edit_btn{
  margin-top:0px !important;
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
<!-- ____________for searching button________________-->
<div class="search-form" style="padding-top:15px;">
<form action="user_books.php" method="post">
<div class="d-flex justify-content-end">
<?php 
inputComponent("search","","Search_bar","Search books","form-control text-muted w-10","text","","searchBook");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="search"> <i class="fa fa-search"></i> </button>
</div>
<!-- ____________Ending of searchig button________________-->
<!-- ____________Starting of delete button________________-->
<div class="d-flex justify-content-end">
<?php 
inputComponent("deleteBooks","","delete_bar","Enter book ID","form-control text-muted w-10","number","","deleteBook");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="Delete"> <i class="fa fa-trash-alt"></i> </button>
</div>
<!-- ____________Ending of delete books btn________________-->
</form>
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
  $res = mysqli_query($con,"SELECT * FROM books ORDER BY book_id ASC");
  echo"<table class='table table-bordered table-hover'";
echo"<tr>";
echo"<th style='background-color:#48cae4'>"; echo"ID";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Books";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Author";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Edition";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Department";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Quantity";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Status";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Edit";echo"</th>";
echo"</tr>";
while($row = mysqli_fetch_assoc($res)){
    echo"<tr>";
    echo"<td>"; echo $row['book_id'];echo"</td>";
    echo"<td>"; echo $row['bookName'];echo"</td>";
    echo"<td>"; echo $row['authorName'];echo"</td>";
    echo"<td>"; echo $row['editions'];echo"</td>";
    echo"<td>"; echo $row['bookStatus'];echo"</td>";
    echo"<td>"; echo $row['quantity'];echo"</td>";
    echo"<td>"; echo $row['department'];echo"</td>";
    echo"<td>"; ?> 
    
    <div class="container">
  
  <!-- Button to Open the Modal -->
  <button type="button" class="btn Edit_btn" data-toggle="modal" data-target="#myModal<?php echo $row['book_id']?>">
 <i class="fa fa-edit edit-btn">#</i>
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal<?php echo $row['book_id']?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-warning">
          <h4 class="modal-title">Update Books</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="#" method="post">
<div class="form-group">
    <label for="bookId">Book Id</label>
    <input type="number" class="form-control" id="bookId"  name ="BookId" value = "<?php echo $row['book_id'];?>">
  </div>
  <div class="form-group">
    <label for="bookName">Book Name</label>
    <input type="text" class="form-control" id="bookName"  name ="BookName" value = "<?php echo $row['bookName'];?>">
  </div>

<div class="form-group">
    <label for="authorName">Author Name</label>
    <input type="text" class="form-control" id="authorName"  name ="AuthorName" value = "<?php echo $row['authorName'];?>">
  </div>

  <div class="form-group">
    <label for="edition">Editions</label>
    <input type="text" class="form-control" id="edition"  name = "Editions" value = "<?php echo $row['editions'];?>">
  </div>

  <div class="form-group">
    <label for="bookStatus">Book Status</label>
    <input type="text" class="form-control" id="bookStatus"  name = "BookStatus" value = "<?php echo $row['bookStatus'];?>">
  </div>

  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="text" class="form-control" id="quantity"  name="Quantity" value = "<?php echo $row['quantity'];?>">
  </div>

  <div class="form-group">
    <label for="department">Department</label>
    <input type="text" class="form-control" id="department"  name="Department" value = "<?php echo $row['department'];?>">
  </div>

<div>
<button class="btn btn-outline-warning w-100 update-books-btn" type="submit" name="update-books" style="border-radius:20px;
margin-top:0px; margin-left:0px;">Update</button>
</div>
 <?php 
    if(isset($_POST["update-books"])){
      echo"The button is pressed";
    $bookId = $_POST["BookId"];
    $bookName = $_POST["BookName"];
    $authorName = $_POST["AuthorName"];
    $edition = $_POST["Editions"];
    $bookStatus = $_POST["BookStatus"];
    $quantity = $_POST["Quantity"];
    $department = $_POST["Department"];
    if($row['book_id'] == $bookId){
      $q = "UPDATE books SET bookName = '$bookName', authorName = '$authorName', editions = '$edition', bookStatus = '$bookStatus', quantity = '$quantity',
      department = '$department', book_id = '$bookId' WHERE book_id = '$bookId' ";
       if(mysqli_query($con,$q)){
         ?>
       <script>alert("Book Updated Successfully");</script>
      <?php
       }else{
         ?>
        <script>alert("Something went wrong <?php echo mysqli_error($con);?>");</script>
      <?php 
      }
    }
    }
    
    ?>
</form>

        </div>

      </div>
    </div>
  </div>
  
</div>

     <?php echo"</td>";
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



<?php
if(isset($_POST["Delete"])){
  $DELETEBOOKS = $_POST["deleteBook"];
  $sql = "SELECT book_id FROM books";
  $rest = mysqli_query($con,$sql);
  while($row = mysqli_fetch_assoc($rest)){
    $z[] = $row["book_id"];
  }
  if(in_array($DELETEBOOKS,$z)){
    $q = mysqli_query($con,"DELETE FROM books WHERE book_id = '$DELETEBOOKS'")
    ?>
  <script>alert("Book deleted successfully");</script>
  <?php
  }else{
    ?>
   <script>alert("book with that id doesn't exist");</script>
  <?php
  }
}
?>







