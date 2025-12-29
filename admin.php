<?php
include('./header_base.php');

// if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] === 'user')
// {
//     header('Location: index.php');
//     exit();
// }
$query = 'SELECT * FROM `contact_us`';
$result = mysqli_query($conn, $query);

$cquery = "SELECT * FROM `categories`";
$res = mysqli_query($conn, $cquery);

$user_query = "SELECT * FROM `user`";
$user_result = mysqli_query($conn, $user_query);
?>
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-md-4">
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
                            <button class="btn btn-success"><a href="register.php" class="text-white text-decoration-none">Create <i class="fa-solid fa-circle-plus"></i></a></button>
                        </div>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 0;
                                while ($user_rows = mysqli_fetch_assoc($user_result)) {
                                    $sno++;
                                ?>
                                    <tr>
                                        <td><?php echo   $sno; ?></td>
                                        <td><?php echo   $user_rows['name']; ?></td>
                                        <td><?php echo   $user_rows['email']; ?></td>
                                        <td><?php echo   $user_rows['password']; ?></td>
                                        <td><a class="text-success me-1"><i class="fa-solid fa-check"></i></a><a class="text-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                                    <!-- <i class="fa-solid fa-xmark"></i> -->
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include("./footer_base.php");
?>