<?php
    session_start();
    session_unset();
    $message = 'Logout Sucessful';
    header("Location: ../frontEnd/index.php?message=".urlencode($message));
    exit();
?>
