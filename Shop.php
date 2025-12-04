<?php
include('./Connect.php');

$productquery = "SELECT * FROM `product`";
$productresult = mysqli_query($conn, $productquery);

$cquery = "SELECT * FROM `categories`";
$res = mysqli_query($conn, $cquery);
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
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <?php
    include("./Nav.php");
    ?>
    <section class=" pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <a class="list-group-item border-0 text-success pb-2" href="Shop.php">Product</a>
                            <div class="row">
                                <div class="col-lg-8">
                                    <a class="list-group-item text-success border-0 pb-2">Categories</a>
                                </div>
                                <div class="col-lg-4 text-end pe-2" id="dropdown">
                                    <i class="fa-solid fa-circle-chevron-up"></i>
                                </div>
                            </div>
                            <div id="catelist" class="row">
                                <ul class="list-unstyled">
                                    <?php while ($rows = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <li>
                                            <?php echo $rows['category name'] ?>
                                        </li>
                                    <?php
                                    } ?>
                                </ul>
                            </div>
                            <div class="row pb-2">
                                <div class="col-lg-8">
                                    <a class="list-group-item text-success border-0" href="categories.php">Gender</a>
                                </div>
                                <div class="col-lg-4 text-end pe-2" id="dropdown2">
                                    <i class="fa-solid fa-circle-chevron-down"></i>
                                </div>
                            </div>
                            <div id="genderlist" class="row d-none">
                                <ul class="list-unstyled">
                                    <li class="row ms-1">Men</li>
                                    <li class="row ms-1">Women</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="h3 fw-lighter">All Men's Women's</p>
                            </div>
                            <div class="col-6">
                                <select class="form-control " name="cate" id="cate">
                                    <option selected>Featured</option>
                                    <option>AtoZ</option>
                                    <option>item</option>
                                </select>
                            </div>
                        </div>
                        <div class="row text-center">
                            <?php
                            while ($productrows = mysqli_fetch_assoc($productresult)) {
                            ?>
                                <div class="col-lg-4 mb-5" id="product">
                                    <div class="card product-wap mb-4 rounded-0" id="productcard">
                                        <div class="position-relative">
                                            <img src="./productimage/<?php echo $productrows['image']; ?>" class="card-img rounded-0 img-fluid">
                                            <ul class="list-unstyled start-0 end-0" id="actionBtns">
                                                <li id="heart">
                                                    <button class="text-white bg-success opacity-75 p-2 border-0 mb-1 rounded">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="text-white bg-success opacity-75 p-2 border-0 mb-1 rounded">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class="text-white bg-success opacity-75 p-2 border-0 mb-1 rounded">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                    </button>
                                                </li>
                                                <!-- #region<li> <i class="fa-solid fa-heart"></i>top: 39%!important;</li>-->
                                            </ul>
                                        </div>
                                        <div class="card-body p-2 bg-white w-100 h-100">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <p class=" h3 text-start card-title fw-light"><?php echo $productrows['product name']; ?></p>
                                                    <p class="card-text text-start"><?php echo $productrows['description']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8 offset-2">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-duotone fa-solid fa-star text-secandary opacity-50"></i>
                                                    <i class="fa-duotone fa-solid fa-star text-secandary opacity-50"></i>
                                                </div>
                                            </div>
                                            <div class="row text-center fw-lighter pt-1">
                                                <p class="h6 fw-light"><?php echo '$' . $productrows['price'] . '.00'; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include("./Footer.php");
    ?>
    <script>
        $(document).ready(function() {

            $('#dropdown i').on('click', function() {
                $(this).toggleClass('fa-circle-chevron-up fa-circle-chevron-down')
                $('#catelist').toggleClass('d-none')
            })
            $('#dropdown2 i').on('click', function() {
                $(this).toggleClass('fa-circle-chevron-down fa-circle-chevron-up')
                $('#genderlist').toggleClass('d-none')
            })
            $('#productcard ul').on('click', function() {
                $('#heart i').toggleClass('fa-regular fa-solid')
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>