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
$sql = "CREATE TABLE IF NOT EXISTS students(
    fname varchar(15) not null, 
    lname varchar(15) not null,
    userName varchar(30) not null unique,
    rollNo int(10) not null, 
    phoneNo int(20) not null, 
    email varchar(30)not null, 
    passwords password
);";
// if(mysqli_query($con,$sql)){
//     return $con;
    // echo"Table is created";
    // return("table is created");
// }else{
//     echo"Table is not cerated".mysqli_error($con);
// }

}else{
    echo"database is not created";
}
// }
?>






