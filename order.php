<?php
session_start();
require_once("../db/config.php");

$first_name  = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$full_name = $first_name . " " . $last_name;
$email  = $_POST['email'];
$cell  = $_POST['cell'];
$address_one  = $_POST['address_one'];
$address_two  = $_POST['address_two'];
$country_id  = $_POST['country_id'];
$city_id  = $_POST['city_id'];
$state_id  = $_POST['state_id'];
$zip_code  = $_POST['zip_code'];

$generate = rand(1, 1000000);
if (isset($_POST['account'])) {
    $account  = $_POST['account']; // yes
    if ($account == "yes") {
        $password = md5($generate);
    }
} else {
    $password = " ";
}

$query = "INSERT INTO user(name,password,first_name,last_name,email,cell,address_one,address_two,country_id,city_id,state_id,zip_code)
VALUES('$full_name','$password','$first_name','$last_name','$email','$cell','$address_one','$address_two',$country_id,$city_id,$state_id,'$zip_code');";
$conn->query($query);
$customer_id = $conn->insert_id;

if (isset($_SESSION['cart'])) {
    $total = 0;
    foreach ($_SESSION['cart'] as $single_cart) {
        $order_number = "SSLCZ_TEST_" . uniqid();
        $product_name = $single_cart['product_name'];
        $product_id = $single_cart['pro_id'];
        $product_price = $single_cart['price'];
        $product_qty = $single_cart['qty'];

        $total += $single_cart['price'] * $single_cart['qty'];

        $product_total = $total;
        $product_discount = 0;
        $product_ship_charge = 60;
        $product_grand_total = $total + $product_ship_charge;

        if (isset($_POST['payment'])) {
            $payment_type  = $_POST['payment'];  // ssl // cod
        }

        $order_query = "INSERT INTO orders(order_number,product_name,product_id,product_price,product_qty,product_total,product_discount,product_ship_charge,payment_type,customer_id)
        VALUES('$order_number','$product_name',$product_id,$product_price,$product_qty,$product_total,$product_discount,$product_ship_charge,'$payment_type','$customer_id');";

        $conn->query($order_query);
    }
}

?>
