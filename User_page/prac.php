<?php
$res = mysqli_query($con,"SELECT * FROM books ORDER BY book_id ASC");
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
?>



<?php
if(isset($_POST["admin_login"])){
    if(($_POST['adminname']=='') OR ($_POST['adminpassword']=='')){?>
  <script>alert("Please fill up all the fields");</script>
   <?php }else if(($_POST['adminname']=='Arbind99') && ($_POST['adminpassword']=='dbmsproject'))
   {?>
  <script> window.location="../User_page/feed_back.php";</script>
<?php   }else{?>
<script>alert("Invalid userName and password");</script>
<?php
}  
  }
  ?>


  <!-- for image session -->
  <?php echo'<img src="../images/'.$_SESSION["images"].'"alt="profile picture"
        style="height:35px;width:35px;border-radius:50%;padding:0px;margin:0px;">';
        ?>


<!-- for admin books section -->
<?php
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>

<div class="container search-form" style="padding-top:120px;">
<form action="user_books.php" method="post">
<div class="d-flex justify-content-end">
<?php inputComponent("search","","Search_bar","Search books","form-control text-muted w-10","text","","searchBook");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="search"> <i class="fa fa-search"></i> </button>
</div>
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














