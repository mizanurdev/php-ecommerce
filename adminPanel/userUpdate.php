<?php
require_once ("../db/config.php");
require_once ("../function/helper/fileUpload.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch current image URL from the database
    $currentImageQuery = "SELECT image FROM user WHERE id = $id";
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
$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$cell = $_POST['cell'];
$address_one = $_POST['address_one'];
$address_two = $_POST['address_two'];
$zip_code = $_POST['zip_code'];


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

$query = "UPDATE user SET name = '$name', username= '$username',image ='$url',first_name='$first_name',last_name='$last_name',address_one='$address_one',address_two='$address_two',zip_code='$zip_code', cell='$cell' WHERE id = $id;";
$sql = $conn->query($query);
if ($sql) {
    header("location: userRetrive.php?");
} else {
    header("location: userEdit.php");
}

?>