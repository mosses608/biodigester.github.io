
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
</head>
<body>
<style>
    .container form button{
        display: block;
    }
        .container{
            background-color:#333;
            padding:20px;
            width:100%;
            font-size:20px;
            color:#FFFFFF;
        }
        .container p{
            font-size:20px;
        }
        *{
            box-sizing:border-box;
            margin: 0%;
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
        form{
                   position: absolute;
                   top: 10%;
                   margin-left: 35%;
                }
                form input{
                    font-size: 18px;
                    text-align: center;
                    width: 500px;
                    height: 50px;
                }
                .search{
                    position: absolute;
                    cursor: pointer;
                    left: 86%;
                    background-color: orange;
                    top: 1%;
                    width: 70px;
                    height: 50px;
                    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                    font-size: 20px;
                }
                table{
                    margin-top: 5%;
                }
    </style>
            <style>
                .ActionButton{
                    position: absolute;
                    right: 2%;
                    top: 2%;
                    display: none;
                    color: #FFFFFF;
                    font-size: 20px;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background-color: inherit;
                    border: none;
                }
                .actions button{
                    padding: 10px;
                    border: none;
                    display: inline;
                    font-size: 16px;
                    background-color: inherit;
                    color: #FFFFFF;
                }
                .actions{
                    background-color: #333;
                    padding: 10px;
                    border-bottom-right-radius: 20px;
                    border-bottom-left-radius: 20px;
                    position: absolute;
                    border: none;
                    right: 0%;
                    color: #FFFFFF;
                }
                .actions .uploadAction{
                    top: 10%;
                }
                .actions .updateAction{
                    top: 10%;
                }
                .active{
                    display: block;
                }
                .viewClass{
                    background-color: #333;
                    color: #FFFFFF;
                    border-bottom-left-radius: 20px;
                    border-bottom-right-radius: 20px;
                    border: none;float: left;
                    font-size: 16px;
                    padding: 10px;
                }
                .viewClass button{
                    color: #FFFFFF;
                    border: none;
                    padding: 10px;
                    background-color: inherit;
                    font-size: 16px;
                }
            </style>
            
</body>
</html>







<?php 
require 'connect.php';

//require 'admin.php';

$sql="SELECT * FROM prototype_table1";
$result=$conn->query($sql);

if(mysqli_num_rows($result)>0){
    echo "<center>";
    echo "<div class='container' id='container'>";
    echo "<p id='paragraph'>Administrators Dashboard</p>";
    echo "<button class='ActionButton'>Actions</button>";
    echo "</div>";
    echo " <div class='actions' id='actions'>";
    echo "<button class='uploadAction'>Upload Image</button>";
    echo " <button class='updateAction'>Update Image</button>";
    echo "</div>";
    echo "<div class='viewClass' id='viewClass'>";
    echo "<button class='uploadAction'>View Images</button>";
    echo " <button class='updateAction'><a href='viewComment.php'>View Comments</a></button>";
    echo "</div>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<form action='search_customer.php' method='get' class='searchView' id='searchView'>";
    echo "<input type='number' name='id' id='inputValue' placeholder='Search a customer by Id' required><br>";
    echo " <button type='submit' class='search'>search</button>";
    echo "</form>";
    echo "<table id='data_table'>";
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
    }
    echo "</table>";
    echo "</div>";
    echo "</center>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
</head>
<body>
<center>
            <!--UPLOAD IMAGES FORM-->
            <form action="upload.php" method="post" class="upload_Images" enctype="multipart/form-data">
                <input type="file" name="image" id="" required accept="images/*"><br><br>
                <button type="submit">upload</button>
            </form>
            </center>
            <style>
                @media(max-width:360px){
                    #paragraph{}
                    #container{
                        padding: 20px;
                        width: 825px;
                    }
                    #container p{
                        font-size: 22px;
                        padding: 10px;
                    }
                    #actions{
                        padding: 5px;
                        position: absolute;
                        right: -100%;
                        float: right;
                    }
                    #actions button{
                        font-size: 14px;
                    }
                    #viewClass{
                        padding: 5px;
                        margin-left: 20%;
                    }
                    #viewClass button{
                        font-size: 14px;
                    }
                    #data_table{
                        margin-top: 10%;
                    }
                    #inputValue{
                        padding: 1px;
                        width: 300px;
                    }
                    #searchView{
                        position: absolute;
                        top: 10%;
                        display: none;
                        left: 37%;
                    }
                }
                @media(max-width:412px){
                    #container{
                        padding: 10px;
                        width: 825px;
                    }
                    #container p{
                        font-size: 18px;
                    }
                    #searchView{
                        display: none;
                        position: absolute;
                        top: 10%;
                        padding: 2px;
                        left: 37%;
                    }
                    #actions{
                        margin-right: -29%;
                        width: 300px;
                        padding: 2px;
                    }
                    #viewClass{
                        margin-left: 0%;
                        padding: 2px;
                    }
                    
                }
                @media(max-width:820px){
                    #container{
                        padding: 10px;
                    }
                    #actions, #viewClass{
                        padding: 2px;
                    }
                    #searchView{
                        position: absolute;
                        left: -4.5%;
                        top: 7%;
                    }
                    #searchView input{
                        padding: 1px;
                        width: 300px;
                    }
                }
                @media(max-width:1024px){
                    #searchView{
                        position: absolute;
                        top: 19%;
                        left: -9%;
                    }
                }
            </style>
           <style>
            a{
                text-decoration: none;
                color: #FFFFFF;
            }
            .uploadAction{
                text-decoration: none;
            }
            .upload_Images{
                background-color: #ddd;
                padding: 10px;
                display: none;
                position: absolute;
                top: 20%;
                left: 1%;
            }
            .upload_Images button{
                background-color: green;
                color: #FFFFFF;
                padding: 10px;
                font-size: 18px;
                width: 100px;
            }
            .upload_Images input{
                padding: 10px;
            }
            .active{
                display: block;
            }
           </style>
           <script>
            var button=document.querySelector('.uploadAction');
            var holder=document.querySelector('.upload_Images');
            button.addEventListener('click', function(){
                holder.classList.toggle('active');
            });
           </script>
</body>
</html>