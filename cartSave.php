<?php
require_once("./db/config.php");
session_start();

if(isset($_GET['id'])){
   $proid = $_GET['id'];

   $query = "SELECT * FROM product where id=$proid";
   $sql = $conn->query($query);
   $rows=$sql->fetch_assoc();

   if(!empty($_SESSION['cart'])){
      $pro_id_check =   array_column($_SESSION['cart'],'pro_id');

      if(in_array($proid,$pro_id_check)){
         $_SESSION['cart'][$proid]['qty'] += 1;
      }
      else{
         $item =  [  
            'pro_id' => $_GET['id'],
            'product_name' => $rows['name'],
            'price'        => $rows['sell_price'],
            'image'        => $rows['feature_image'],
            'qty'    => 1  
         ]; 
         $_SESSION['cart'][$proid]= $item;
        //  header("location: index.php"); 
      }
   }
   else{
      $item =  [  
            'pro_id' => $_GET['id'],
            'product_name' => $rows['name'],
            'price'        => $rows['sell_price'],
            'image'        => $rows['feature_image'],
            'qty'    => 1  
      ];  
      $_SESSION['cart'][$proid]= $item;
    //   header("location: index.php");
   }
   header("location: cart.php");
   exit();
}
?>