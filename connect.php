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

 ?>