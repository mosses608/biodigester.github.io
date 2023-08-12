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

$id=$_GET['id'];

//SQL
$sql="SELECT * FROM prototype_table1 WHERE id='$id'";
$result=$conn->query($sql);

if(mysqli_num_rows($result)>0){
    echo "<center>";
    echo "<div class='container'>";
    echo "<p>Administrators Dashboard</p>";
    echo "</div>";
    echo "<table>";
    echo "<tr><th>Id</th><th>Contact</th><th>Email</th><th>Gender</th><th>Nationality</th><th>Password</th></tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['contact']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['nationality']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "</tr>";
        echo "<div class='update-delete'>";
        echo "
        <button class='update'>Update</button>";
        echo "<br>";
        echo "
        <button class='delete'>Delete</button>";
        echo "</div>";
    }
    echo "</table>";
    echo "</div>";
    echo "</center>";
}else
{
    echo "<p>Customer does not exist</p>";
}


$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Customer</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <style>
        .update-delete .update{
            background-color: #ddd;
            color: blue;
            border-radius: 10px;
        }
        .update-delete .delete{
            background-color: #ddd;
            color: red;
            border-radius: 10px;
        }
        .update-delete button{
            display: block;
            font-size: 20px;
            padding-top: 15px;
            padding: 10px;
        }
        .update-delete{
            position: absolute;
            top: 10%;
            right: 18%;
        }
        .container{
            background-color:#333;
            padding:2px;
            font-size:20px;
            color:#FFFFFF;
        }
        .container p{
            font-size:20px;
        }
        *{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        th{
            padding:15px;
            border:1px solid black;
        }
        td{
            padding:20px;
            border:1px solid black;
        }
    </style>
    <center>
    <form action="update.php" method="post" class="updateData">
        <input type="number" name="id" id="" placeholder="Enter Id"><br><br>
        <label for="contact">Phone Number</label><br>
            <input type="number" name="contact" id="phoneNumber" placeholder="Enter phone number" required><br><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder="Enter email" required><br><br>
            <label for="gender">Gender</label><br>
            <select name="gender" id="ender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><br>
            <label for="nationality">Nationality</label><br>
            <input type="text" name="nationality" id="nationality" placeholder="Enter your nationality" required><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="pass" placeholder="Enter password" required><br><br>
            <label for="confirm pass">Confirm Password</label><br>
            <input type="password" name="password1" id="pass1" placeholder="Confirm your password" required><br><br>
        <button type="submit">Update</button>
    </form>
    <form action="delete.php" method="post" class="deleteData">
        <input type="number" name="id" id="" placeholder="Enter Id"><br><br>
        <button type="submit">Delete</button>
    </form>

    <div class="warning">
        <p>Are you sure, you want to delete?</p>
        <button class="yes">Yes</button>
        <button class="no">No</button>
    </div>




</center>
    <style>
        .warning p{
            color: red;
        }
        .deleteData input{
            width: 350px;
            padding: 10px;
        }
        .deleteData button{
            padding: 10px;
            width: 40%;
            color: #FFFFFF;
            background-color: green;
        }
        .deleteData{
            background-color: #ddd;
            padding: 10px;
            display: none;
            width: 25%;
            border-radius: 10px;
            border: 1px solid black;
        }
        .updateData button{
            padding: 10px;
            width: 40%;
            color: #FFFFFF;
            background-color: green;
        }
        .updateData input,select{
            width: 350px;
            padding: 10px;
        }
        .updateData{
            background-color: #ddd;
            padding: 10px;
            width: 25%;
            display: none;
            border-radius: 10px;
            border: 1px solid black;
        }
        .warning button{
            padding-left: 50px;
            border: none;
            background-color: inherit;
        }
        .warning{
            display: none;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid black;
            background-color: #ddd;
            width: 320px;
        }
        .active{
            display: block;
        }
    </style>
    <script>
        var updateButton=document.querySelector('.update');
        var updateData=document.querySelector('.updateData');
        var deleteButton=document.querySelector('.delete');
        var warningClass=document.querySelector('.warning');
        var yesButton=document.querySelector('.yes');
        var deleteData=document.querySelector('.deleteData');
        var noButton=document.querySelector('.no');
        //add event listeners to the update button
        updateButton.addEventListener('click', function(){
            updateData.classList.toggle('active');
        });
        //add event listeners to delete button
        deleteButton.addEventListener('click', function(){
            warningClass.classList.toggle('active');
        });
        //add event listener to warning yes class
        yesButton.addEventListener('click', function(){
            warningClass.style.display='none';
            deleteData.classList.toggle('active');
        });
        //add event listener to warning no class
        noButton.addEventListener('click', function(){
            warningClass.style.display='none';
        })
    </script>
</body>
</html>
</body>
</html>