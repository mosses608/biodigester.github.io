<?php
//define db connection parameters
$host="127.0.0.1";
$username="root";
$password="";
$dbname="prototype_db";

//connect to database
$conn=mysqli_connect($host,$username,$password,$dbname);

//check connection if exists or not
if(!$conn){
    die("Connection Failed!" . mysqli_connect_error());
}

//get user inputs from the form
$id=$_POST['id'];

//SQL
$sql="DELETE FROM prototype_table1 WHERE id='$id'";
$result=$conn->query($sql);

if($result){
    echo "<p>Deleted successfully</p>";
}else{
    echo "<p>Failed to delete</p>";
}



?>