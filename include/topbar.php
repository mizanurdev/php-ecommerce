    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="#">About</a>
                    <a class="text-body mr-3" href="#">Help</a>
                    <a class="text-body mr-3" href="#">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <?php
                        if(isset($_SESSION['username'])){
                        ?>
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['username']?></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="./adminPanel/dashboard.php"><button class="dropdown-item" type="button">Dashboard</button></a>
                                <a href="./adminPanel/logout.php"><button class="dropdown-item" type="button">Logout</button></a>
                            </div>
                        <?php
                        }else{
                        ?>
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="./adminPanel/signin.php"><button class="dropdown-item" type="button">Sign in</button></a>
                                <a href="./adminPanel/signup.php"><button class="dropdown-item" type="button">Sign up</button></a>
                                <a href="./adminPanel/userCodeUpdate.php"><button class="dropdown-item" type="button">Verify Account</button></a>
                            </div>
                        <?php
                        }
                        ?>
                        
                    </div>
                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">BDT</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">USD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">BN</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Mini</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Mart</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Contact Us</p>
                <h5 class="m-0">+8801521422807</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->