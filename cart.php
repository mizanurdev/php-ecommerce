<?php 
require_once("include/header.php");
require_once("include/topbar.php");
require_once("include/navbar.php");

if(isset($_GET['msg'])){
    echo $_GET['msg'];
}
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Sl</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                <?php
                if(isset($_SESSION['cart'])){
                    $serial = 1;
                    $total = 0;
                    foreach($_SESSION['cart'] as $single_cart){
                        $total += $single_cart['price'] * $single_cart['qty'];
                ?>
                    <form action="cartUpdate.php" method="post">
                    <input type="hidden" name="pro_id" value="<?php echo $single_cart['pro_id'];?>">
                    <tr>
                        <td class="align-middle"><?php echo $serial; ?></td>
                        <td class="align-middle"><img src="<?php echo "./adminPanel/" . $single_cart['image']; ?>" alt="" style="width: 50px;"></td>
                        <td class="align-middle"><?php echo $single_cart['product_name']; ?></td>
                        <td class="align-middle"><?php echo $single_cart['price']; ?></td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="qty" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $single_cart['qty']; ?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle"><?php echo $single_cart['price'] * $single_cart['qty']; ?></td>
                        <td class="align-middle"><button type="submit" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></button></td>
                        <td class="align-middle"><a class="btn btn-sm btn-danger" href="cartItemRemove.php?id=<?php echo $single_cart['pro_id']; ?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                    </form>
                <?php
                        $serial++;
                    }
                }
                ?>
                </tbody>
            </table>
            <div class="my-3 float-right">
                <a class="btn btn-dark font-weight-bold py-2" href="shop.php"><i class="fas fa-step-forward"></i> Continue Shopping</a>
            </div>
        </div>
        
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6><?php echo isset($_SESSION['cart']) ? $total . " Tk" : "0 Tk"; ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium"><?php echo isset($_SESSION['cart']) && $total != 0 ? ($delivery = 60) . " Tk" : ($delivery = 0) . " Tk"; ?></h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <?php
                            $total = isset($total) ? (is_numeric($total) ? $total : 0) : 0;
                            $delivery = isset($delivery) ? (is_numeric($delivery) ? $delivery : 0) : 0;
                            $subTotal = $total + $delivery;
                        ?>
                        <h5><?php echo isset($_SESSION['cart']) && $subTotal != 0 ? $subTotal . " Tk" : "0 Tk"; ?></h5>                     
                    </div>
                    <a href="checkout.php"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

<?php require_once("include/footer.php") ?>
