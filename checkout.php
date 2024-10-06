<?php require_once("include/header.php") ?>
<?php require_once("include/topbar.php") ?>
<?php require_once("include/navbar.php") ?>
<?php require_once("include/navbar.php") ?>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<?php
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
    $query = "SELECT * FROM user where id=$user_id";
    $sql = $conn->query($query);
    $value = $sql->fetch_assoc();
}
?>

<!-- Checkout Start -->
<div class="container-fluid">
    <form action="ssl/checkout_hosted.php" method="post" enctype="multipart/form-data">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control"  name="first_name" value="<?php if(isset($_SESSION['id'])){ echo $value['first_name']; } ?>"  type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" name="last_name" value="<?php if(isset($_SESSION['id'])){ echo $value['last_name'];} ?>"  type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" value="<?php if(isset($_SESSION['id'])){ echo $value['email'];} ?>"  type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" name="cell" value="<?php if(isset($_SESSION['id'])){ echo $value['cell'];} ?>"  type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" name="address_one" value="<?php if(isset($_SESSION['id'])){ echo $value['address_one'];} ?>"  type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" name="address_two" value="<?php if(isset($_SESSION['id'])){ echo $value['address_two'];} ?>"  type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select name="country_id"  class="custom-select" required>
                     
                                <?php
                                if(isset($_SESSION['id'])){
                                ?>
                                <option value="<?php if(isset($_SESSION['id'])){ echo $value['country_id'];} ?>"><?php if(isset($_SESSION['id'])){ echo $value['country_id'];} ?></option>
                                <option value="2">Bangladesh</option>
                                <option value="3">India</option>
                                <?php
                                }else{
                                ?>
                                <option disable>-- Select Country --</option>
                                <option value="2">Bangladesh</option>
                                <option value="3">India</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <select name="city_id"  class="custom-select" required>
                                <?php
                                if(isset($_SESSION['id'])){
                                ?>
                                <option value="<?php if(isset($_SESSION['id'])){ echo $value['city_id'];} ?>"><?php if(isset($_SESSION['id'])){ echo $value['city_id'];} ?></option>
                                <option value="2">Dhaka</option>
                                <option value="3">Kolkata</option>
                                <?php
                                }else{
                                ?>
                                <option disable>-- Select City --</option>
                                <option value="2">Dhaka</option>
                                <option value="3">Kolkata</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <select name="state_id"  class="custom-select" required>
                                <?php
                                if(isset($_SESSION['id'])){
                                ?>
                                <option value="<?php if(isset($_SESSION['id'])){ echo $value['state_id'];} ?>"><?php if(isset($_SESSION['id'])){ echo $value['state_id'];} ?></option>
                                <option value="2">Mugda</option>
                                <option value="3">Gariahat</option>
                                <?php
                                }else{
                                ?>
                                <option disable>-- Select State --</option>
                                <option value="2">Mugda</option>
                                <option value="3">Gariahat</option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input name="zip_code" value="<?php if(isset($_SESSION['id'])){ echo $value['zip_code'];} ?>" class="form-control" type="text" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <?php
                                if(isset($_SESSION['id'])){
                                ?>
                                <?php
                                }else{
                                ?>
                                <input name="account" value="yes" type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php
                        if(isset($_SESSION['cart'])){
                            $serial = 1;
                            $total = 0;
                            foreach($_SESSION['cart'] as $single_cart){
                                $total += $single_cart['price']*$single_cart['qty'];
                        ?>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $serial.". ". $single_cart['product_name'];?><?php echo " (".$single_cart['qty']."Pcs)";?></p>
                            <p><?php echo $single_cart['price']*$single_cart['qty'];?> Tk</p>
                        </div>
                        <?php
                        $serial++;
                            }}
                        ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><?php echo isset($_SESSION['cart']) ? $total . " Tk" : 0 ." Tk"; ?></h6>
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
                            <input type="hidden" name="amount" value="<?php echo $subTotal ?>">
                            <h5><?php echo isset($_SESSION['cart']) && $subTotal != 0 ? $subTotal . " Tk" : "0 Tk"; ?></h5>   
                        </div>
                        <div class="my-3">
                            <a class="btn btn-dark font-weight-bold py-2" href="shop.php"><i class="fas fa-step-forward"></i> Continue Shopping</a>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input name="payment_type" value="ssl" type="radio" class="custom-control-input" id="ssl" required>
                                <label class="custom-control-label" for="ssl">SSL Commerz</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input name="payment_type" value="cod"  type="radio" class="custom-control-input" id="cod" required>
                                <label class="custom-control-label" for="cod">Cash On Delivery</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Checkout End -->

<?php require_once("include/footer.php") ?>