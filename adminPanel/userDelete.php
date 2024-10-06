<?php
    require_once("../db/config.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $query = "DELETE FROM user WHERE id = $id;";
    if($sql = $conn->query($query)){
        header("location: userRetrive.php?msg=delete successfull");
    }else{
        echo "sorry";
    }
?>