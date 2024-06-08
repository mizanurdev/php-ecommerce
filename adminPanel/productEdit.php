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

    $query = "SELECT * FROM product WHERE id = $id;";
    $sql = $conn->query($query);
    $product = $sql->fetch_assoc();
?>

<div class="row">
    <div class="col-xl-12">
        <!-- Basic Examples -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Product</h2>
            </div>

            <div class="card-body">
                <form action="productUpdate.php?id=<?php echo $product['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Product Name</label>
                        <input type="text" name="name" value="<?php echo $product['name'] ?>" class="form-control" id="exampleFormControlInput2" placeholder="Enter Product Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Product Price</label>
                        <input type="text" name="price" value="<?php echo $product['price'] ?>" class="form-control" id="exampleFormControlInput2" placeholder="Enter Product Price">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Product Sell Price</label>
                        <input type="text" name="sell_price" value="<?php echo $product['sell_price'] ?>" class="form-control" id="exampleFormControlInput2" placeholder="Enter Product Sell Price">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Product Category</label>
                        <select name="cat_id" class="form-control" id="exampleFormControlInput2">
                            <!-- <option>--select category--</option> -->
                            <?php
                            $query = "SELECT * FROM category";
                            $sql = $conn->query($query);
                            if($sql->num_rows > 0){
                                while($category = $sql->fetch_assoc()){
                                    $selected = ($category['id'] == $product['cat_id']) ? 'selected' : '';
                                    ?> 
                                    <option value="<?php echo $category['id'] ?>" <?php echo $selected ?>><?php echo $category['name'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Product Brand</label>
                        <select name="brand_id" class="form-control" id="exampleFormControlInput2">
                            <!-- <option>--select brand--</option> -->
                            <?php
                            $query = "SELECT * FROM brand";
                            $sql = $conn->query($query);
                            if($sql->num_rows > 0){
                                while($brand = $sql->fetch_assoc()){
                                    $selected = ($brand['id'] == $product['brand_id']) ? 'selected' : '';
                                    ?> 
                                    <option value="<?php echo $brand['id'] ?>" <?php echo $selected ?>><?php echo $brand['name'] ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Product Feature Image</label>
                        <div>
                            <img src="<?php echo $product['feature_image'] ?>" alt="image" width="100px" height="100px">
                        </div>
                        <input type="file" name="feature_image" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-footer mt-6">
                        <button type="submit" class="btn btn-primary btn-pill">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require_once('include/footer.php');
} else {
    $message = 'Sorry please login first';
    header("Location: signin.php?message=".urlencode($message));
}
?>
