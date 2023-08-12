<?php
require 'connect.php';

//CREATE TABLE 
$sql="CREATE TABLE IF NOT EXISTS uploaded_images_table(id INT(6)UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(50)NOT NULL,data BLOB(254)NOT NULL)";
$conn->query($sql);


?>