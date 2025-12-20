<?php
include('./connect.php');
$userLoginRequired = ['product_cart.php','checkout.php','admin.php'];
$isLogin = $_SESSION['isLogin'] ?? false;

if (!$isLogin && in_array(basename($_SERVER['PHP_SELF']), $userLoginRequired))
{
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
<?php
if (!in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'register.php' ,'forgot_password.php'])) {
?>
<nav class="navbar navbar-expand-lg p-0 bg-dark navbar-light d-none d-lg-block" id="top">
    <div class="container">
        <div class="row">
             <span class="text-light fs-6 fw-lighter d-flex align-items-center">
                 <div class="d-flex align-items-center me-2">
                     <span> <i class="fa-solid fa-envelope me-1"></i></span>
                     <p class="h6 m-0 fw-lighter"> info@company.com</p>
                 </div>
                 <div class="d-flex align-items-center ms-2">
                     <i class="fa-solid fa-phone me-1 "></i>
                     <p class="h6 m-0 fw-lighter"> 010-020-0340</p>
                 </div>
             </span>
        </div>
        <div class="row">
             <span class="text-end text-light fs-6 fw-lighter">
                 <div class="col-12 d-flex ">
                     <span class=" bg-dark text-light ps-1 pe-1 text-center me-2">
                         <i class="fa-brands fa-facebook-f me-1"></i>
                         <i class="fa-brands fa-instagram me-1"></i>
                         <i class="fa-brands fa-twitter me-1"></i>
                         <i class="fa-brands fa-linkedin-in me-1"></i>
                     </span>
                 </div>
             </span>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg shadow">
    <div class="container">
        <a class="navbar-brand fs-1 text-success fw-medium" href="#">Zay</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <div class="mx-auto">
                <ul class="navbar-nav" id="headerNav">
                    <li class="nav-item px-5">
                        <a class="nav-link text-black" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item px-5">
                        <a class="nav-link text-black" href="about.php">About</a>
                    </li>
                    <li class="nav-item px-5">
                        <a class="nav-link text-black" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item px-5">
                        <a class="nav-link text-black" href="contact.php">Contact</a>
                    </li>
                    <?php
                    if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] === 'admin') {
                        ?>
                        <li class="nav-item px-5">
                            <a class="nav-link text-black" name="admin" href="admin.php">Admin</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="d-flex my-2 mb-2 align-items-center">
                 <span class="me-2 p-1">
                     <i class="fa-solid fa-magnifying-glass"></i>
                 </span>
                <span class="me-2 p-1">
                     <a href="product_cart.php" class="text-black"><i class="fa-sharp fa-solid fa-cart-arrow-down"></i></a>
                 </span>

                <span class="me-2 p-1">
                     <div class="dropdown">
                         <a class="btn btn-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             <i class="fa-solid fa-user"></i>
                         </a>
                         <?php  if ($isLogin) {
                             ?>
                             <ul class="dropdown-menu">
                                 <li><a class="dropdown-item text-success" href="#">Account</a></li>
                                 <li><a class="dropdown-item text-success" href="logout.php">Log out</a></li>
                             </ul>
                             <?php
                         } else {
                             ?>
                             <ul class="dropdown-menu">
                                 <li><a class="dropdown-item text-success" href="login.php">Login</a></li>
                                 <li><a class="dropdown-item text-success" href="register.php">Register</a></li>
                             </ul>
                             <?php
                         } ?>
                     </div>
                 </span>
            </div>
        </div>
    </div>
</nav>
<?php
}
?>