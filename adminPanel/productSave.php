<?php
    require_once("../db/config.php");
    require_once("../function/helper/fileUpload.php");

    $directory = 'assets/images/';
    $file = $_FILES['feature_image'];

    $name = $_POST['name'];
    $price = $_POST['price'];
    $sell_price = $_POST['sell_price'];
    $cat_id = $_POST['cat_id'];
    $brand_id = $_POST['brand_id'];
    $url = fileUpload($file,$directory);

    $insertQuery = "INSERT INTO product(name,price,sell_price,cat_id,brand_id,feature_image) VALUES('$name','$price','$sell_price','$cat_id','$brand_id','$url')";
    $sql = $conn->query($insertQuery);
    if($sql){
        header("location: productAll.php?msg=save successfull");
    }else{
        header("location: productAll.php?msg=save failure");
    }
?>