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
        height:750px;
        background-color:rgb(0 123 255 / 12%);
        width:65%;
        margin:auto;
        box-shadow: 3px 3px 9px -3px rgba(0,0,0,0.5);
    }
    .updateContent .form-control{
        width:100%;
    }
    .fa{
  position: relative;
  top:-30px;
  left:10px;
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
  <a class="sideNav p-3 " href="#">Delete books</a>
  <a class="sideNav p-3 " href="#">notification</a>
  <a class="sideNav p-3 " href="#">sdt Mgs</a>
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
<p class="lead text-center text-white">Update Books</p>
<form action="add_books.php" method="post">
<div class = "d-felx flex-row">
<?php 
// dataBase();
inputComponent("book_id","Book ID","book-id","Enter book id ","form-control","number","","book-id");
inputComponent("bookName","Book Name","bookName-id","Enter bookname","form-control","text","","bookName");
inputComponent("authorName","Author Name","authorName-id","Enter authorname","form-control","text","","authorName");
inputComponent("edition","Edition","edition-id","Enter book edition","form-control","text","","bookEdition");
inputComponent("bookStatus","Book Status","bookStatus-id","Enter book status","form-control","text","","bookStatus");
inputComponent("quantity","Quantity","quantity-id","Enter book quantitiy","form-control","text","","bookQuantity");
inputComponent("department","Department","department-id","Enter department name","form-control","text","","departmentName");
buttonComponent("btn btn-outline-dark","width:100%;border-radius:20px;","submit","Add-book","addBook-id","Add Book");
?>
</form>
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

<?php
if(isset($_POST["Add-book"])){
  echo"The button is clicked";
  $ID          = $_POST["book-id"];
  $BOOKNAME    = $_POST["bookName"];
  $AUTHORNAME  = $_POST["authorName"];
  $EDITION     = $_POST["bookEdition"];
  $BOOKSTATUS  = $_POST["bookStatus"];
  $QUANTITY    = $_POST["bookQuantity"];
  $DEPARTMENT  = $_POST["departmentName"];
 
  
    // Inserting data in table
if(!empty($ID) && !empty($BOOKNAME) && !empty($AUTHORNAME) && !empty($EDITION) && !empty($BOOKSTATUS) && !empty($QUANTITY) && !empty($DEPARTMENT)){
    $sql = "INSERT INTO books (bookName, authorName, editions, bookStatus, quantity, department, book_id)
    VALUES ('$BOOKNAME','$AUTHORNAME','$EDITION','$BOOKSTATUS','$QUANTITY','$DEPARTMENT','$ID')";
        if(mysqli_query($con,$sql)){ ?>

          <script>alert("Book Added Sussessfully");</script>
        <?php
        }
        else {
          ?>
          <script>alert("Error in Book addition");</script>
        <?php
        }
  }
else{ ?>
      <script>alert("Fill Up All the Fields");</script>
    <?php
    }              
  }

?>





