<?php 
require 'connect.php';

//get user inputs from the form
$id=$_POST['id'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$nationality=$_POST['nationality'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$password1=$_POST['password1'];
//  SQL

$password==$password1;
if($password!=$password1){
    echo "<p>Confirm password carefully</p>";
}

$sql="UPDATE prototype_table1 SET id='$id', contact='$contact',email='$email',nationality='$nationality',gender='$gender',password='$password' AND password1='$password1' WHERE id='$id'";
$result=$conn->query($sql);


if($result){
    echo "<p id='updated'>Updated successfully!</p>";
}else{
    echo "<p id='failed'>Failed to update customer</p>";
}

$conn->close();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updated Customer</title>
</head>
<body>
    <style>
        #updated,#failed{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</body>
</html>
