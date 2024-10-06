<?php
  session_start();
  if(isset($_SESSION['username'])){
    require_once('include/header.php');
    require_once('include/aside.php');
    require_once('include/topbar.php');
    require_once("../db/config.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $query = "SELECT * FROM product where id=$id";
    $sql = $conn->query($query);
?>
<div class="row">
    <div class="col-xl-12">
        <!-- Products Inventory -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Product Details</h2>
            </div>
            
            <div class="card-body">
                <table id="productsTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Feature Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sell Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $serial = 1;
                    if($sql->num_rows){
                        $rows = $sql->fetch_assoc()
                        ?>
                        <tr>
                            <td><?php echo $serial++; ?></td>
                            <td class="py-0">
                                <img src="<?php echo $rows['feature_image']; ?>" alt="Product Image">
                            </td>
                            <td><?php echo $rows['name']; ?></td>
                            <td><?php echo $rows['price']; ?></td>
                            <td><?php echo $rows['sell_price']; ?></td>
                            <td><?php echo $rows['cat_id']; ?></td>
                            <td><?php echo $rows['brand_id']; ?></td>
                        </tr>
                        <?php
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