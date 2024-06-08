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
    $query = "SELECT * FROM category WHERE id = $id;";
    $sql = $conn->query($query);
    $row = $sql->fetch_assoc();
?>
<div class="row">
    <div class="col-xl-12">
        <!-- Basic Examples -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit Category</h2>
            </div>

            <div class="card-body">
                <form action="categoryUpdate.php?id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Name</label>
                        <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" id="exampleFormControlInput2" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Category Image</label>
                        <div>
                            <img src="<?php echo $row['image'] ?>" alt="image" width="100px" height="100px">
                        </div>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
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
  }else{
    $message = 'Sorry please login first';
    header("Location: signin.php?message=".urlencode($message));
}
?>