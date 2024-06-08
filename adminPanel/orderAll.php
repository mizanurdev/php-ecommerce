<?php
  session_start();
  if(isset($_SESSION['username'])){
    require_once('include/header.php');
    require_once('include/aside.php');
    require_once('include/topbar.php');
    require_once("../db/config.php");

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
    }

    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin'){
        $query = "SELECT * FROM orders";
        $sql = $conn->query($query);
    }else if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'customer'){
        $query = "SELECT * FROM orders WHERE customer_id = '$user_id' ";
        $sql = $conn->query($query);
    }
    
?>
<div class="row">
    <div class="col-xl-12">
        <!-- Products Inventory -->
        <div class="card card-default">
            <div class="card-header">
                <h2>All Orders</h2>
            </div>
            
            <div class="card-body">
                <table id="productsTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Order Number</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $serial = 1;
                    if($sql->num_rows>0){
                        while($rows = $sql->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $serial++; ?></td>
                                <td><?php echo $rows['order_number']; ?></td>
                                <td><?php echo $rows['product_name']; ?></td>
                                <td><?php echo $rows['product_price']; ?></td>
                                <td><?php echo $rows['product_qty']; ?></td>
                                <td><?php echo $rows['product_price'] * $rows['product_qty']; ?></td>
                                <td><?php echo $rows['payment_status']; ?></td>
                                <td><?php echo $rows['status']; ?></td>
                                <td>
                                    <?php
                                        if($rows['payment_status'] == 'pending'){
                                    ?>
                                        <a class="btn btn-danger" href="#">Make Payment</a>
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        echo "not found";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    require_once('include/footer.php');
  }else{
    $message = 'Sorry please login first';
    header("Location: signin.php?message=".urlencode($message));
}
?>