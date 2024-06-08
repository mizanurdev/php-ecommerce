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
    $query = "SELECT * FROM user WHERE id = $id;";
    $sql = $conn->query($query);
    $row = $sql->fetch_assoc();
?>
<div class="row">
    <div class="col-xl-12">
        <!-- Basic Examples -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Edit User</h2>
            </div>

            <div class="card-body">
                <form action="userUpdate.php?id=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Name</label>
                        <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" id="exampleFormControlInput2" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Username</label>
                        <input type="text" name="username" value="<?php echo $row['username'] ?>" class="form-control" id="exampleFormControlInput2" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">User Image</label>
                        <div>
                            <img src="<?php echo $row['image'] ?>" alt="image" width="100px" height="100px">
                        </div>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">First Name</label>
                        <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" class="form-control" id="exampleFormControlInput2" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Last Name</label>
                        <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" class="form-control" id="exampleFormControlInput2" >
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Phone</label>
                        <input type="text" name="cell" value="<?php echo $row['cell'] ?>" class="form-control" id="exampleFormControlInput2" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Address One</label>
                        <input type="text" name="address_one" value="<?php echo $row['address_one'] ?>" class="form-control" id="exampleFormControlInput2" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput2">Address Two</label>
                        <input type="text" name="address_two" value="<?php echo $row['address_two'] ?>" class="form-control" id="exampleFormControlInput2" >
                    </div>

                    
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Zip Code</label>
                        <input type="text" name="zip_code" value="<?php echo $row['zip_code'] ?>" class="form-control" id="exampleFormControlInput2" >
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