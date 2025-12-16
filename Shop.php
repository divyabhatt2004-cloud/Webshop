<?php
include('./Connect.php');

$product_query = "SELECT * FROM `product`";
$product_result = mysqli_query($conn, $product_query);

$category_query = "SELECT * FROM `categories`";
$category_result = mysqli_query($conn, $category_query);
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
        <p id="demo"></p>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>
                                    <a class="d-flex justify-content-between text-decoration-none border-0 text-success pb-2" href="Shop.php">Product</a>
                                </li>
                                <li id="dropdown">
                                    <a class="d-flex justify-content-between text-decoration-none text-success border-0 pb-2">Categories
                                        <i class="fa-solid fa-circle-chevron-up text-black"></i>
                                    </a>
                                </li>
                                <div id="catelist" class="row mb-1">
                                    <ul class="list-unstyled">
                                        <?php while ($category_rows = mysqli_fetch_assoc($category_result)) {
                                        ?>
                                            <li>
                                                <?php echo $category_rows['category name'] ?>
                                            </li>
                                        <?php
                                        } ?>
                                    </ul>
                                </div>
                                <li id="dropdown2">
                                    <a class="d-flex justify-content-between text-decoration-none text-success border-0">Gender
                                        <i class="fa-solid fa-circle-chevron-down text-black"></i>
                                    </a>
                                </li>
                                <div id="genderlist" class="row d-none">
                                    <ul class="list-unstyled">
                                        <li class="row ms-1">Men</li>
                                        <li class="row ms-1">Women</li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="container">
                        <div class="row mb-3 mt-3">
                            <div class="col-6">
                                <p class="h3 fw-light">All Men's Women's</p>
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
                            while ($product_rows = mysqli_fetch_assoc($product_result)) {
                            ?>
                                <div class="col-md-4 mb-5" id="product">
                                    <div class="card product-wap mb-4 rounded-0" id="productcard">
                                        <div class="position-relative">
                                            <img src="./productimage/<?php echo $product_rows['image']; ?>" class="card-img rounded-0 img-fluid">
                                            <ul class="list-unstyled start-0 end-0" id="actionBtns">
                                                <li>
                                                    <a class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded">
                                                        <i class="fa-regular fa-heart" id="heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="./product_detail.php?id=<?php echo $product_rows['id']; ?>"
                                                        class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded" href="add_to_cart.php?id=<?php echo $product_rows['id']; ?>">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body p-2 bg-white w-100 h-100">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <p class=" h3 text-start card-title fw-light"><?php echo $product_rows['product name']; ?></p>
                                                    <p class="card-text text-start"><?php echo $product_rows['description']; ?></p>
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
                                                <p class="h6 fw-light"><?php echo '$' . $product_rows['price'] . '.00'; ?></p>
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
            $('#heart').on('click', function() {
                $(this).toggleClass('fa-regular fa-solid')
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>