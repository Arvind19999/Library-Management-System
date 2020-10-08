<?php
// function dataBase(){
$server = "localhost";
$userName = "root";
$password = "";
$dbName = "lms";
// Establishing Connection with database
$con = mysqli_connect($server,$userName,$password);
// checking for connection
if(!$con){
    die("Failed to connect to database".mysqli_connect_error());
}
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if(mysqli_query($con,$sql)){
    // echo "database is created";
$con = mysqli_connect($server,$userName,$password,$dbName);
$sql ="CREATE TABLE IF NOT EXISTS students(
    fname varchar(15) not null, 
    lname varchar(15) not null,
    userName varchar(30) not null unique,
    rollNo int(10) not null, 
    phoneNo int(20) not null, 
    email varchar(30)not null, 
    passwords varchar(30),
    images varchar(100)
);";
// $sql ="CREATE TABLE IF NOT EXISTS books(
//     bookName varchar(25) not null, 
//     authorName varchar(15) not null,
//     editions varchar(30) not null,
//     bookStatus varchar(15) not null, 
//     quantity int(10) not null, 
//     department varchar(30),
//     book_id int(5) not null
// );";
// $sql ="CREATE TABLE IF NOT EXISTS comments(
//    comment_id int(50) not null auto_increment,
//    comment varchar(100)
// );";
// $sql ="CREATE TABLE IF NOT EXISTS admin_signup(
//    fname varchar(15),
//    lname varchar(15),
//    userName varchar(15),
//    phone int(15),
//    email varchar(50),
//    passwords varchar(30)
//  );";
if(mysqli_query($con,$sql)){
    // return $con;
    echo"Table bookss  is created";
    // return("table is created");
}else{
     echo"Table is not cerated ".mysqli_error($con);
}

}else{
    echo"database is not created";
}
// }
?>






