<?php require_once("include/header.php") ?>
<?php require_once("include/topbar.php") ?>
<?php require_once("include/navbar.php") ?>
<?php require_once("filter.php") ?>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shop List</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
            <div class="bg-light p-4 mb-30">
                <form action="" method="post">
                    <?php
                    // Array to hold price range labels and their corresponding count queries
                    $priceRanges = array(
                        "all" => "All Price",
                        "0-10000" => "0 - 10000 Tk",
                        "10001-20000" => "10001 - 20000 Tk",
                        "20001-30000" => "20001 - 30000 Tk",
                        "30001-40000" => "30001 - 40000 Tk",
                        "40001-50000" => "40001 - 50000 Tk",
                        "50001-100000" => "50001 - 100000 Tk"
                    );
                    
                    foreach ($priceRanges as $range => $label) {
                        // Construct count query dynamically for each price range
                        $countQuery = "SELECT COUNT(*) AS count FROM product";
                        if ($range !== "all") {
                            list($min, $max) = explode("-", $range);
                            $countQuery .= " WHERE sell_price BETWEEN $min AND $max";
                        }
                        $countResult = $conn->query($countQuery);
                        $countRow = $countResult->fetch_assoc();
                        $count = $countRow['count'];
                        ?>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" name="price_range" value="<?php echo $range; ?>" id="price-<?php echo $range; ?>" <?php echo $selectedPriceRange == $range ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="price-<?php echo $range; ?>"><?php echo $label; ?></label>
                            <span class="badge border font-weight-normal"><?php echo $count; ?> Products</span>
                        </div>
                        <?php
                    }
                    ?>
                    <button class="btn btn-primary mt-2" type="submit">Filter Products</button>
                </form>
            </div>
            <!-- Price End -->
        </div>
        <!-- Shop Sidebar End -->

        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if ($sql->num_rows > 0) {
                    while ($rows = $sql->fetch_assoc()) {
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-10000" src="<?php echo "./adminPanel/" . $rows['feature_image'] ?>" alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href="cartSave.php?id=<?php echo $rows['id'] ?>"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="#"><i class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="#"><i class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="productDetails.php?id=<?php echo $rows['id'] ?>"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="#"><?php echo $rows['name'] ?></a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5><?php echo $rows['sell_price'] ?>Tk</h5>
                                        <h6 class="text-muted ml-2"><del><?php echo $rows['price'] ?>Tk</del></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small class="fa fa-star text-primary mr-1"></small>
                                        <small>(99)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

<?php require_once("include/footer.php") ?>
