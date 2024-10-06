<?php
    require_once("../db/config.php");
    require_once("../function/helper/fileUpload.php");

    $file = $_FILES['image'];
    $directory = 'assets/images/';

    $name = $_POST['name'];
    $url = fileUpload($file,$directory);

    $insertQuery = "INSERT INTO category(name,image) VALUES('$name','$url')";
    $sql = $conn->query($insertQuery);
    if($sql){
        header("location: categoryAll.php?msg=save successfull");
    }else{
        header("location: categoryAll.php?msg=save failure");
    }
?>