<?php
    session_start();
    session_unset();
    $message = 'Logout Sucessful';
    header("Location: ../index.php?message=".urlencode($message));
    exit();
?>
