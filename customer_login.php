<?php
require 'connect.php';

//get user inputs
$email=$_POST['email'];
$password=$_POST['password'];

//SQL
$sql="SELECT * FROM prototype_table1 WHERE email='$email' AND password='$password'";
$result=$conn->query($sql);

if(mysqli_num_rows($result)>0){
    echo "<center>";
    echo "<div class='container'>";
    echo "<p id='profile'>My Profile</p>";
    echo "</div>";
    echo "<table>";
    echo "<tr><th>Id</th><th>Contact</th><th>Email</th><th>Nationality</th><th>Gender</th><th>Password</th></tr>";
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['contact']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['nationality']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['password']."</td>";
        echo "</tr>";
        echo "<div class='update-delete'>";
        echo "
        <button class='update' id='update'>Update</button>";
        echo "<br>";
        echo "
        <button class='delete' id='delete'>Delete</button>";
        echo "</div>";
    }
    echo "</table>";
    echo "</center>";
}else{
    echo "<p>Incorrect username or password</p>";
}


//close connection
mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View profile</title>
</head>
<body>
    <style>
        @media(max-width:360px){
            #viewButton{
                position: absolute;
                top: 205px;
                color: #000000;
                font-weight: 700;
                border: 1px solid black;
            }
            #update,#delete{
                position: absolute;
                top: 140px;
                padding-left: 10px;
                padding-left: 10px;
                border-radius: 0rem;
            }
            .update{
                right: 8%;
            }
            .container{
                background-color: #333;
                width: 410px;
            }
            #updateData{
                position: absolute;
                left: 12%;
                border-radius: 0rem;
                padding: 10px;
                top: 35%;
                width: 300px;
                background-size: cover;
            }
            #updateData input,select{
                width: 250px;
            }
            #updateData select{
                width: 250px;
            }
            .warning{
                position: absolute;
                top: 40%;
                left: 12%;
            }
            #deleteDataForm{
                position: absolute;
                top: 40%;
                left: 12%;
                width: 300px;
                border-radius: 0rem;
                background-color: #ddd;
            }
            #deleteDataForm input{
                width: 200px;
            }
            
        }
        @media(max-width:412px){
            #viewButton{
                position: absolute;
                top: 205px;
                color: #000000;
                font-weight: 700;
                border: 1px solid black;
            }
            #update,#delete{
                position: absolute;
                top: 113px;
                border-radius: 0rem;
            }
            .update{
                right: 8%;
            }
            .container{
                background-color: #333;
                width: 410px;
            }
            #updateData{
                position: absolute;
                left: 12%;
                border-radius: 0rem;
                padding: 10px;
                top: 35%;
                width: 300px;
                background-size: cover;
            }
            #updateData input,select{
                width: 250px;
            }
            #updateData select{
                width: 250px;
            }
            .warning{
                position: absolute;
                top: 40%;
                left: 12%;
            }
            #deleteDataForm{
                position: absolute;
                top: 40%;
                left: 12%;
                width: 300px;
                border-radius: 0rem;
                background-color: #ddd;
            }
            #deleteDataForm input{
                width: 200px;
            }
            
        }
        @media(max-width:820px){
            #viewButton{
                position: absolute;
                top: 205px;
                color: #000000;
                font-weight: 700;
                border: 1px solid black;
            }
            #update,#delete{
                position: absolute;
                top: 113px;
                border-radius: 0rem;
            }
            .update{
                right: 8%;
            }
            .container{
                background-color: #333;
                width: 375px;
            }
            #updateData{
                position: absolute;
                left: 12%;
                border-radius: 0rem;
                padding: 10px;
                top: 35%;
                width: 300px;
                background-size: cover;
            }
            #updateData input,select{
                width: 250px;
            }
            #updateData select{
                width: 250px;
            }
            .warning{
                position: absolute;
                top: 40%;
                left: 12%;
            }
            #deleteDataForm{
                position: absolute;
                top: 40%;
                left: 12%;
                width: 300px;
                border-radius: 0rem;
                background-color: #ddd;
            }
            #deleteDataForm input{
                width: 200px;
            }
        }
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
    <form action="update.php" method="post" class="updateData" id="updateData">
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
    <form action="delete.php" method="post" class="deleteData" id="deleteDataForm">
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
    <div class="comments">
        <form action="viewComment.php" method="post" class="viewComment">
            <button type="submit" class="viewButton" id="viewButton">View Comments</button>
        </form>
        <style>
            .viewComment{
                padding: 10px;
            }
            .viewButton{
                padding: 10px;
                position: absolute;
                top: 2%;
                border: none;
                color: #FFFFFF;
                background-color: inherit;
                font-size: 18px;
                cursor: pointer;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
        </style>
    </div>
</body>
</html>