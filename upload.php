<?php
require 'connect.php';

require 'create_upload_file_table.php';

if(isset($_POST['submit'])){
    $file=$_FILES['image']['tmp_name'];
    $fileData=file_get_contents($file);
    $fileName=$_FILES['image']['name'];

    //PREPARE AND EXECUTE SAL
    $sql="INSERT INTO uploaded_images_table(name,data)VALUES(?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ss",$fileName,$fileData);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo "<p>New Image Uploaded Successfully</p>";
    }else{
        echo "<p>Failed to upload Image</p>";
    }
    $stmt->close();
}else{
    echo "<p>No image uploaded</p>";
}

$conn->close();
?>