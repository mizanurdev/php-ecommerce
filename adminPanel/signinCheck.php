<?php
    require_once("../db/config.php");
    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    //db
    $query = "SELECT * FROM user WHERE username='$username' and password='$password' and status='approved'";
    $sql = $conn->query($query);
    if($sql->num_rows>0){
        $rows = $sql->fetch_assoc();
        $_SESSION['id'] = $rows['id'];
        $_SESSION['username'] = $rows['username'];
        $_SESSION['image'] = $rows['image'];
        $_SESSION['user_type'] = $rows['user_type'];
        header("location: dashboard.php");
    }else{
        $message = 'Please check your username or password or verified your account first';
        header("Location: signin.php?message=".urlencode($message));
    }
    exit();
?>