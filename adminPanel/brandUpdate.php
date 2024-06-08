<?php
require_once ("../db/config.php");
require_once ("../function/helper/fileUpload.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch current image URL from the database
    $currentImageQuery = "SELECT image FROM brand WHERE id = $id";
    $currentImageResult = $conn->query($currentImageQuery);

    if ($currentImageResult->num_rows > 0) {
        $currentImageRow = $currentImageResult->fetch_assoc();
        $currentImage = $currentImageRow['image'];
    } else {
        // Handle the case where the user is not found
        die("User not found.");
    }
}
$name = $_POST['name'];

if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $file = $_FILES['image'];
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

$query = "UPDATE brand SET name = '$name',image ='$url' WHERE id = $id;";
$sql = $conn->query($query);
if ($sql) {
    header("location: brandAll.php?");
} else {
    header("location: brandAll.php");
}

?>