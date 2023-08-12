<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Comments Page</title>
</head>
<body>
    <center>
        <div class="container">
            <p>View Comments Dashboard</p>
        </div>
    </center>
    <style>
        *{
            box-sizing: border-box;
            padding: 0%;
            margin: 0%;
        }
        .container{
            background-color: #333;
            color: #FFFFFF;
            width: 100%;
            text-align: center;
        }
        .container p{
            padding: 10px;
            color: #FFFFFF;
            font-size: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        th{
            padding:15px;
            font-size: 20px;
            font-weight: 600;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border:1px solid black;
        }
        td{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding:20px;
            border:1px solid black;
        }
        td:hover{
            background-color: #ddd;
            color: blue;
        }
        
    </style>
</body>
</html>











<?php
require 'connect.php';

//SQL
$sql="SELECT * FROM comments_table";
$result=$conn->query($sql);

if($result){
    echo "<center>";
    echo "<table>";
    echo "<tr><th>Email</th><th>Comments</th>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['comment']."</td>";
        echo "</tr>";
    }
    echo "<table>";
    echo "</center>";
}else{
    echo "<p>Comments are not available</p>";
}

//close connection
$conn->close();

?>