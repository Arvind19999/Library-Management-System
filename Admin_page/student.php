<?php
require_once "./header.php";
require_once "../components.php";
require_once "../User_page/connection.php";
?>

<div class="container search-form" style="padding-top:90px;">
<form action="student.php" method="post">
<div class="d-flex justify-content-end">
<?php inputComponent("search","","Search_bar","Search Students","form-control text-muted w-10","text","","searchStudents");
?>
<button class="btn" 
style="background-color: #48cae4;"
type="submit" name="search"> <i class="fa fa-search"></i> </button>
</div>
</form>
<h2 class="display-4 books-heading">List Of Students</h2>
<?php 
if(isset($_POST["search"])){
    // echo"The button is pressed";
  $STUDENTNAME = $_POST["searchStudents"];
  $q = mysqli_query($con,"SELECT * FROM students WHERE userName LIKE '%$STUDENTNAME%'");
  if(mysqli_num_rows($q)==0){
    echo"<p class='text-center pt-2' style='height:50px;width:55%;color:white;
    font-size:1.5rem;background-color:#48cae4;'>Sorry! No student with that name exist</p>";
  }else{
    echo"<table class='table table-bordered table-hover'";
    echo"<tr>";
    echo"<th style='background-color:#48cae4'>"; echo"ROLLNO.";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Fname";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Lname";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"userName";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Email";echo"</th>";
    echo"<th style='background-color:#48cae4'>"; echo"Phone";echo"</th>";
    // echo"<th style='background-color:#48cae4'>"; echo"Status";echo"</th>";
    echo"</tr>";
    while($row = mysqli_fetch_assoc($q)){
        echo"<tr>";
        echo"<td>"; echo $row['rollNo'];echo"</td>";
        echo"<td>"; echo $row['fname'];echo"</td>";
        echo"<td>"; echo $row['lname'];echo"</td>";
        echo"<td>"; echo $row['userName'];echo"</td>";
        echo"<td>"; echo $row['email'];echo"</td>";
        echo"<td>"; echo $row['phoneNo'];echo"</td>";
        // echo"<td>"; echo $row['department'];echo"</td>";
        echo"</tr>";
        }
      echo"</table>";
  }

}else{
  $res = mysqli_query($con,"SELECT * FROM students ORDER BY rollNo ASC");
  echo"<table class='table table-bordered table-hover'";
echo"<tr>";
echo"<th style='background-color:#48cae4'>"; echo"ROLLNO.";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Fname";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Lname";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"userName";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Email";echo"</th>";
echo"<th style='background-color:#48cae4'>"; echo"Phone";echo"</th>";
echo"</tr>";
while($row = mysqli_fetch_assoc($res)){
    echo"<tr>";
    echo"<td>"; echo $row['rollNo'];echo"</td>";
    echo"<td>"; echo $row['fname'];echo"</td>";
    echo"<td>"; echo $row['lname'];echo"</td>";
    echo"<td>"; echo $row['userName'];echo"</td>";
    echo"<td>"; echo $row['email'];echo"</td>";
    echo"<td>"; echo $row['phoneNo'];echo"</td>";
    echo"</tr>";
    }
  echo"</table>";
}

?>
</div>














