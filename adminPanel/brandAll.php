<?php
  session_start();
  if(isset($_SESSION['username'])){
    require_once('include/header.php');
    require_once('include/aside.php');
    require_once('include/topbar.php');
    require_once("../db/config.php");
    $query = "SELECT * FROM brand";
    $sql = $conn->query($query);
?>
<div class="row">
    <div class="col-xl-12">
        <!-- Products Inventory -->
        <div class="card card-default">
            <div class="card-header">
                <h2>All Brand</h2>
            </div>
            
            <div class="card-body">
                <table id="productsTable" class="table table-hover table-product" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Brand Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $serial = 1;
                    if($sql->num_rows>0){
                        while($rows = $sql->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $serial++; ?></td>
                                <td class="py-0">
                                    <img src="<?php echo $rows['image']; ?>" alt="Brand Image">
                                </td>
                                <td><?php echo $rows['name']; ?></td>
                                <td>
                                    <a href="brandDetails.php?id=<?php echo $rows['id'] ?>"><i class="mdi mdi-eye-outline mr-2"></i></a>
                                    <a href="brandEdit.php?id=<?php echo $rows['id'] ?>"><i class="mdi mdi-border-color mr-2"></i></a>
                                    <a href="brandDelete.php?id=<?php echo $rows['id'] ?>" onclick="return confirm('are you sure?')"><i class="mdi mdi-trash-can-outline mr-2"></i></a>
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