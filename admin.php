<?php
$sever_name="127.0.0.1";
$username="root";
$password="";
$dbname="prototype_db";

$conn=mysqli_connect($sever_name,$username,$password);

if(!$conn){
    die("Connection Failed!" . mysqli_connect_error());
}

//create database
$sql="CREATE DATABASE IF NOT EXISTS prototype_db";
$conn->query($sql);

//SELECT THE DATABASE CREATED
$conn->select_db($dbname);

//CREATE TABLE
$sql="CREATE TABLE IF NOT EXISTS admins_data(username VARCHAR(30)NOT NULL, password VARCHAR(30)NOT NULL)";
$conn->query($sql);

//get user inputs for the form
$username=$_POST['username'];
$password=$_POST['password'];

//INSERT DATA
$sql="INSERT INTO admins_data(username,password)VALUES('muddy','@123')";
$conn->query($sql);

//SELECT ALL ENTERED CREDENTIALS
$sql="SELECT * FROM admins_data WHERE username='$username' AND password='$password'";
$result=$conn->query($sql);

if(mysqli_num_rows($result)>0){
    header("Location:StaffLogin.php");
}else{
    echo "<p>Incorrect username or password</p>";
}
 ?>