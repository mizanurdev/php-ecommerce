<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;                    
require '../adminPanel/PHPMailer/src/Exception.php';
require '../adminPanel/PHPMailer/src/PHPMailer.php';
require '../adminPanel/PHPMailer/src/SMTP.php';
require_once("../db/config.php");
class OrderTransaction {
    private $conn;

    public function __construct($db_conn) {
        $this->conn = $db_conn;
    }

    public function getRecordQuery($tran_id) {
        $sql = "SELECT * FROM orders WHERE order_number='$tran_id'";
        return $sql;
    }

    public function saveTransactionQuery($post_data) {
        // Extract and prepare data from $post_data
        $first_name  = $post_data['cus_first_name'];
        $last_name  = $post_data['cus_last_name'];
        $full_name = $post_data['cus_name'];
        $email  = $post_data['cus_email'];
        $cell  = $post_data['cus_phone'];
        $address_one  = $post_data['cus_add1'];
        $address_two  = $post_data['cus_add2'];
        $country_id  = $post_data['cus_country'];
        $city_id  = $post_data['cus_city'];
        $state_id  = $post_data['cus_state'];
        $zip_code  = $post_data['cus_postcode'];
        $transaction_id = $post_data['tran_id'];

        if (isset($post_data['cus_account'])) {
            $account  = $post_data['cus_account']; // yes
            if ($account == "yes") {
                $code = rand(1,1000000);
                $generate = rand(1, 1000000);
                $password = md5($generate);
                $sendPassword = md5($password);
                $username = $post_data['cus_first_name'].time();
                $url = "http://localhost:8080/my-projects/backend/php/php-ecommerce/adminPanel/userCodeUpdate.php?code={$code}";
            }
        }else{
            $password = " ";
            $username = "cus".time();
        }

        if(isset($_SESSION['id'])){
            $customer_id = $_SESSION['id'];
        }else{
            $query = "INSERT INTO user(name,username,password,code,first_name,last_name,email,cell,address_one,address_two,country_id,city_id,state_id,zip_code)
            VALUES('$full_name','$username','$password','$code','$first_name','$last_name','$email','$cell','$address_one','$address_two',$country_id,$city_id,$state_id,'$zip_code');";
            $sql = $this->conn->query($query);
            $customer_id = $this->conn->insert_id;

            if($sql && $account == "yes"){
                //mail start
                $mail = new PHPMailer(true);                              
                try {
                    $mail->isSMTP(); // using SMTP protocol                                     
                    $mail->Host = 'sandbox.smtp.mailtrap.io'; // SMTP host as gmail 
                    $mail->SMTPAuth = true;  // enable smtp authentication                             
                    $mail->Username = 'cd55d7e9fcbefa';  // sender gmail host              
                    $mail->Password = 'd78d6b12bca2c3'; // sender gmail host password  
                    $mail->Port = 2525;   // port for SMTP   
                    $mail->SMTPSecure = 'tls';  // for encrypted connection                           
                    $mail->isHTML(true); 
                    $mail->setFrom('mizancse2018@gmail.com', "Minimart"); // sender's email and name
                    $mail->addAddress($email,$first_name);  // receiver's email and name
                    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
                    $mail->Subject = 'Email verification From Minimart';
                    $mail->Body = "
                        Your Username is: {$username} <br>
                        Your Password is: {$generate} <br>
                        Your Verification Code is: {$code} <br>
                        <a href='{$url}' style='display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px;'>Verify Your Account</a>
                    ";
                    $mail->send();

                            // echo 'Message has been sent';
                        } catch (Exception $e) { // handle error.
                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                        }
                //mail end
                // header("location: userCodeUpdate.php?msg=save");
            }
        }

        if (isset($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $single_cart) {
                // $order_number = "SSLCZ_TEST_" . uniqid();
                $product_name = $single_cart['product_name'];
                $product_id = $single_cart['pro_id'];
                $product_price = $single_cart['price'];
                $product_qty = $single_cart['qty'];

                $total = $single_cart['price'] * $single_cart['qty'];

                $product_total = $total;
                $product_discount = 0;
                $product_ship_charge = 60;
                $product_grand_total = $total + $product_ship_charge;

                if (isset($post_data['payment_type'])) {
                    $payment_type  = $post_data['payment_type'];  // ssl // cod
                }

                $sql = "INSERT INTO orders(order_number,product_name,product_id,product_price,product_qty,product_total,product_discount,product_ship_charge,product_grand_total,payment_type,customer_id)
                VALUES('$transaction_id','$product_name',$product_id,$product_price,$product_qty,$product_total,$product_discount,$product_ship_charge,$product_grand_total,'$payment_type','$customer_id');";
                
                $this->conn->query($sql);
            }
        }  
    }

    public function updateTransactionQuery($transaction_id, $type = 'Success') {
        $sql = "UPDATE orders SET status='$type' WHERE order_number='$transaction_id'";
        return $sql;
    }
}


