<!-- ____________Starting of books page________________-->
<!-- ____________for searching button________________-->
<div class="search-form" style="padding-top:15px;">
<form action="user_books.php" method="post">
<div class="d-flex justify-content-end">
<?php 
inputComponent("search","","Search_bar","Enter userName","form-control text-muted w-10","text","","searchUser");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="userFineSearch"> <i class="fa fa-search"></i> </button>
</div>
<!-- ____________Ending of searchig button________________-->

</form>
<h2 class="display-4 books-heading text-center">Fines</h2>
<?php 
if(isset($_POST["userFineSearch"])){
  $USERNAME = $_POST["searchUser"];
  $q = mysqli_query($con,"SELECT * FROM fines WHERE UserName LIKE '%$USERNAME%'");
  if(mysqli_num_rows($q)==0){
    echo"<p class='text-center pt-2' style='height:50px;width:55%;color:white;
    font-size:1.5rem;background-color:#48cae4;'>Sorry! No books with that name exist</p>";
  }else{
    echo"<table class='table table-bordered table-hover'";
    echo"<tr>";
    echo"<th style='background-color:#48cae4'>"; echo"BookId";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"userName";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"ReturnDate";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Fine";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Day";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Status";echo"</th>";
    echo"</tr>";
    while($row = mysqli_fetch_assoc($q)){
        echo"<tr>";
        echo"<td>"; echo $row['BookId'];echo"</td>";
        echo"<td>"; echo $row['UserName'];echo"</td>";
        echo"<td>"; echo $row['ReturnDate'];echo"</td>";
        echo"<td>"; echo $row['No_Of_Day'];echo"</td>";
        echo"<td>"; echo $row['Fine'];echo"</td>";
        echo"<td>"; echo $row['Statuss'];echo"</td>";
        echo"</tr>";
        }
      echo"</table>";


      
  }

}else{
  $res = mysqli_query($con,"SELECT * FROM fines WHERE statuss ='Not paid'");
  echo"<table class='table table-bordered table-hover'";
echo"<tr>";
echo"<th style='background-color:#48cae4'>"; echo"BookId";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"userName";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"ReturnDate";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Fine";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Day";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Status";echo"</th>";
echo"</tr>";
while($row = mysqli_fetch_assoc($res)){
    echo"<tr>";
    echo"<td>"; echo $row['BookId'];echo"</td>";
    echo"<td>"; echo $row['UserName'];echo"</td>";
    echo"<td>"; echo $row['ReturnDate'];echo"</td>";
    echo"<td>"; echo $row['No_Of_Day'];echo"</td>";
    echo"<td>"; echo $row['Fine'];echo"</td>";
    echo"<td>"; echo $row['Statuss'];echo"</td>";
    echo"</tr>";
    }
  echo"</table>";
}

?>
</div>