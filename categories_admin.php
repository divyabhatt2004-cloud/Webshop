<?php
include('./header_base.php');

$categoryquery = "SELECT * FROM `categories`";
$categoryresult = mysqli_query($conn, $categoryquery);
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
                            <button class="btn btn-success"><a href="categories_create.php" class="text-white text-decoration-none">Create <i class="fa-solid fa-circle-plus"></i></a></button>
                        </div>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Srno</th>
                                    <th>Category name</th>
                                    <th>Category type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 0;
                                while ($categoryrows = mysqli_fetch_assoc($categoryresult)) {
                                    $sno++;
                                ?>
                                    <tr>
                                        <td><?php echo   $sno; ?></td>
                                        <td><?php echo $categoryrows['category name'] ?></td>
                                        <td><?php echo $categoryrows['category type'] ?></td>
                                        <td><?php echo $categoryrows['description'] ?></td>
                                        <td><a class="text-success ms-2" href="category_update.php?id=<?php echo $categoryrows['id']; ?>"><i class="fa-solid fa-pen"></i></a><a class="text-danger ms-2" href="categaory_delete.php?id=<?php echo $categoryrows['id']; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
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