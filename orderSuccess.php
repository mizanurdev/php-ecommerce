<?php
session_start();
require_once("./db/config.php");

if (isset($_POST['tran_id'])) {
    $tran_id = $_POST['tran_id'];
    if(isset($_POST['first_name'])){
        $name = $_POST['first_name'];
    }else{
        $name = "Customer";
    }

    if(isset($_POST['payment_type']) && $_POST['payment_type'] == "cod"){
        $sql = "UPDATE orders SET status = 'processing', payment_status = 'pending' WHERE order_number='$tran_id'";
        $conn->query($sql);

    }else{
        $sql = "UPDATE orders SET status = 'processing', payment_status = 'paid' WHERE order_number='$tran_id'";
        $conn->query($sql);
    }



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .confirmation-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 40px;
            width: 90%;
            max-width: 400px;
        }

        .confirmation-box .checkmark {
            font-size: 50px;
            color: #ffd333;
            margin-bottom: 20px;
        }

        .confirmation-box h1 {
            font-size: 22px;
            margin: 0;
            color: #333;
        }

        .confirmation-box h2 {
            font-size: 24px;
            margin: 10px 0;
            color: #333;
        }

        .confirmation-box p {
            color: #666;
            margin-bottom: 20px;
        }

        .confirmation-box button {
            background-color: #ffd333;
            color: black;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .confirmation-box button:hover {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <div class="confirmation-box">
            <div class="checkmark">&#10004;</div>
            <h1>Hey <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>,</h1>
            <h2>Your Order is Confirmed!</h2>
            <h4>Order Number is : <?php echo htmlspecialchars($tran_id, ENT_QUOTES, 'UTF-8'); ?></h4>
            <p>We will send you a shipping confirmation email as soon as your order ships.</p>
            <a href="index.php"><button>Continue Shopping</button></a>
        </div>
    </div>
</body>
</html>
<?php
}