<?php
   session_start();
   if(isset($_GET['remove'])){
      session_destroy();
      header("location: index.php");
      exit();
   }
?>