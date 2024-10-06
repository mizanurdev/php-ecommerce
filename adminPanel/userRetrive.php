<?php
  session_start();
  if(isset($_SESSION['username'])){
    require_once('include/header.php');
    require_once('include/aside.php');
    require_once('include/topbar.php');
    require_once("../db/config.php");
    $query = "SELECT * FROM user";
    $sql = $conn->query($query);

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
    }

    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin'){
        $query = "SELECT * FROM user";
        $sql = $conn->query($query);
    }else if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'customer'){
        $query = "SELECT * FROM user WHERE id = '$user_id' ";
        $sql = $conn->query($query);
    }
?>
<div class="row">
    <div class="col-xl-12">
        <!-- Products Inventory -->
        <div class="card card-default">
            <div class="card-header">
                <h2>All User</h2>
            </div>
            
            <div class="card-body">
                <table id="productsTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $serial = 1;
                    if($sql->num_rows){
                        while($rows = $sql->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $serial++; ?></td>
                                <td class="py-0">
                                    <img src="<?php echo $rows['image']; ?>" alt="User Image">
                                </td>
                                <td><?php echo $rows['name']; ?></td>
                                <td><?php echo $rows['username']; ?></td>
                                <td><?php echo $rows['email']; ?></td>
                                <td>
                                    <?php
                                     if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin'){
                                        ?>
                                    <a href="userDetails.php?id=<?php echo $rows['id'] ?>"><i class="mdi mdi-eye-outline mr-2"></i></a>
                                    <a href="userEdit.php?id=<?php echo $rows['id'] ?>"><i class="mdi mdi-border-color mr-2"></i></a>
                                    <a href="userDelete.php?id=<?php echo $rows['id'] ?>" onclick="return confirm('are you sure?')"><i class="mdi mdi-trash-can-outline mr-2"></i></a>
                                    <?php
                                     }else if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'customer'){
                                        ?>
                                        <a href="userDetails.php?id=<?php echo $rows['id'] ?>"><i class="mdi mdi-eye-outline mr-2"></i></a>
                                        <a href="userEdit.php?id=<?php echo $rows['id'] ?>"><i class="mdi mdi-border-color mr-2"></i></a>
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