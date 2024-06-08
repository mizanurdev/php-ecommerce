<?php
    require_once("../db/config.php");

    echo $code = $_POST['code'];
    echo $email = $_POST['email'];
    $queryUser = "SELECT * FROM user WHERE code = $code and email = '$email' ";
    $sqlUser = $conn->query($queryUser);
    $value = $sqlUser->fetch_assoc();
    if($value['status'] == 'pending'){
        $query = "UPDATE user SET status = 'approved' WHERE code = '$code' and email = '$email'";
        $sql = $conn->query($query);
        if($sql){
            header("location: signin.php?message=Verified now login");
        }else{
            header("location: signup.php");
        }
    }else{
        header("location: signin.php?message=Already verified now login");
    }

?>