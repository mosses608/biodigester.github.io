<?php
//define database connection parameters
$server_name="127.0.0.1";
$username="root";
$password="";
$dbname="prototype_db";

//connect to database
$conn=mysqli_connect($server_name,$username,$password);

//check connection if exists or not
if(!$conn){
    die("Connection Failed!" . mysqli_connect_error());
}
//create database
$sql="CREATE DATABASE IF NOT EXISTS prototype_db";
$conn->query($sql);
//select the database

$conn->select_db($dbname);

//create table in the selected database
$sql="CREATE TABLE IF NOT EXISTS prototype_table1(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,contact VARCHAR(20)NOT NULL,email VARCHAR(70) NOT NULL,gender TEXT(10) NOT NULL,nationality TEXT(15) NOT NULL,password VARCHAR(40) NOT NULL,password1 VARCHAR(40) NOT NULL)";
$conn->query($sql);

//get user inputs from the form
//$id=$_POST['id'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$nationality=$_POST['nationality'];
$password=$_POST['password'];
$password1=$_POST['password1'];

$password==$password1;
if($password!=$password1){
    echo "<p>Confirm your password correctly</p>";
}else if($password==$password1){
    $sql="INSERT INTO prototype_table1(contact,email,gender,nationality,password,password1) VALUES('$contact','$email','$gender','$nationality','$password','$password1')";
    $conn->query($sql);
    print "<p>You are successfully added</p>";
}else{
    print "<p>You are unsuccessfully added</p>";
}
//close connection
mysqli_close($conn);
?>