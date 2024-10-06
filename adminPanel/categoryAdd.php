<?php
  session_start();
  if(isset($_SESSION['username'])){
    require_once('include/header.php');
    require_once('include/aside.php');
    require_once('include/topbar.php');
?>
<div class="row">
    <div class="col-xl-12">
        <!-- Basic Examples -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Add Category</h2>
            </div>

            <div class="card-body">
                <form action="categorySave.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Product Category Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput2" placeholder="Enter Product Category Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Product Image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-footer mt-6">
                        <button type="submit" class="btn btn-primary btn-pill">Save</button>
                    </div>
                </form>
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