<?php
include "./Connect.php";

$query = 'SELECT * FROM `contact_us`';
$result = mysqli_query($conn, $query);

$cquery = "SELECT * FROM `categories`";
$res = mysqli_query($conn, $cquery);

$user_query = "SELECT * FROM `user`";
$user_result = mysqli_query($conn, $user_query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
    include("./Nav.php");
    ?>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <a class="list-group-item border-0 text-success mb-1" href="Product_Admin.php">Product</a>
                        <a class="list-group-item text-success border-0 mb-1" href="Categories_Admin.php">Categories</a>
                        <a class="list-group-item text-success border-0 mb-1" href="Support_Admin.php">Support</a>
                        <a class="list-group-item text-success border-0 mb-1" href="#">Orders</a>
                        <a class="list-group-item text-success border-0 mb-1" href="#">Help?</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row text-end border-bottom pb-2">
                            <div class=" offset-10 col-lg-2">
                                <button class="btn btn-success"><a href="Register_User.php" class="text-white text-decoration-none">Create <i class="fa-solid fa-circle-plus"></i></a></button>
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
                                        </tr>
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
    include("./Footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>