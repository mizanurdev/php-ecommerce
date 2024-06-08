<?php
require_once ("../db/config.php");
require_once ("../function/helper/fileUpload.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch current image URL from the database
    $currentImageQuery = "SELECT feature_image FROM product WHERE id = $id";
    $currentImageResult = $conn->query($currentImageQuery);

    if ($currentImageResult->num_rows > 0) {
        $currentImageRow = $currentImageResult->fetch_assoc();
        $currentImage = $currentImageRow['feature_image'];
    } else {
        // Handle the case where the user is not found
        die("User not found.");
    }
}

$name = $_POST['name'];
$price = $_POST['price'];
$sell_price = $_POST['sell_price'];
$cat_id = $_POST['cat_id'];
$brand_id = $_POST['brand_id'];

if (isset($_FILES['feature_image']) && $_FILES['feature_image']['error'] == UPLOAD_ERR_OK) {
    $file = $_FILES['feature_image'];
    $directory = 'assets/images/';
    $url = fileUpload($file, $directory);
} else {
    $url = $currentImage;
}

// Unlink the previous image
if (isset($currentImage) && !empty($currentImage)) {
    $filePath = $directory . basename($currentImage);
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

$query = "UPDATE product SET name = '$name',price = '$price',sell_price = '$sell_price',cat_id = '$cat_id',brand_id = '$brand_id',feature_image ='$url' WHERE id = $id;";
$sql = $conn->query($query);
if ($sql) {
    header("location: productAll.php?");
} else {
    header("location: productAll.php");
}

?>