<?php
include('./header_base.php');

if (!$_SESSION['isLogin']) {
    header('Location:login.php');
}

$productquery = "SELECT * FROM `product`";
$productresult = mysqli_query($conn, $productquery);
?>
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <a class="list-group-item border-0 text-success mb-1" href="product_admin.php">Product</a>
                    <a class="list-group-item text-success border-0 mb-1" href="categories_Admin.php">Categories</a>
                    <a class="list-group-item text-success border-0 mb-1" href="support_admin.php">Support</a>
                    <a class="list-group-item text-success border-0 mb-1" href="#">Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row text-end border-bottom pb-2">
                        <div class=" offset-10 col-lg-2">
                            <button class="btn btn-success"><a href="product_create.php" class="text-white text-decoration-none">Create <i class="fa-solid fa-circle-plus"></i></a></button>
                        </div>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Srno</th>
                                    <th>Product_name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>GST</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 0;
                                while ($productrows = mysqli_fetch_assoc($productresult)) {
                                    $sno++;
                                ?>
                                    <tr>
                                        <td><?php echo   $sno; ?></td>
                                        <td><?php echo $productrows['product name'] ?></td>
                                        <td><?php echo $productrows['image'] ?></td>
                                        <td><?php echo $productrows['description'] ?></td>
                                        <td><?php echo $productrows['quantity'] ?></td>
                                        <td><?php echo $productrows['category'] ?></td>
                                        <td><?php echo $productrows['price'] ?></td>
                                        <td><?php echo $productrows['gst'] ?></td>
                                        <td><a class="text-success ms-2" href="product_update.php?id=<?php echo $productrows['id']; ?>"><i class="fa-solid fa-pen"></i></a><a class="text-danger ms-2" href="product_delete.php?id=<?php echo $productrows['id']; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include("./footer_base.php");
?>