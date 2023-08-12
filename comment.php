<?php
require 'connect.php';

//Get User Inputs From The Form
$email=$_POST['email'];
$comment=$_POST['comment'];

//SQL
$sql="CREATE TABLE IF NOT EXISTS comments_table(id INT(6)UNSIGNED AUTO_INCREMENT PRIMARY KEY,email VARCHAR(50)NOT NULL,comment TEXT(250)NOT NULL)";
$conn->query($sql);

//INSERT DATA INTO THE TABLE
$sql="INSERT INTO comments_table(email,comment)VALUES('$email','$comment')";
$result=$conn->query($sql);

if($result){
    echo "<p>Comment sent successfully</p>";
}else{
    echo "<p>Failed to send comment</p>";
}

$conn->close();

?>