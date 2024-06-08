<?php
    require_once("../db/config.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $query = "DELETE FROM brand WHERE id = $id;";
    if($sql = $conn->query($query)){
        header("location: brandAll.php?msg=delete successfull");
    }else{
        echo "sorry";
    }
?>