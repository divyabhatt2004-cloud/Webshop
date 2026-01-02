<?php
include('./header_base.php');

$id = $_SESSION["user_id"] ?? 0;

$product_query = "SELECT * FROM `product`";
$product_result = mysqli_query($conn, $product_query);
// $product_rows = mysqli_fetch_assoc($product_result);

$category_query = "SELECT * FROM `categories`";
$category_result = mysqli_query($conn, $category_query);

$fav_Query = "SELECT product_id FROM wishlist WHERE user_id = '$id'";
$fav_Result = mysqli_query($conn, $fav_Query);
$allFav = mysqli_fetch_all($fav_Result, MYSQLI_ASSOC);
$favProductIds = array_column($allFav, 'product_id');


// $chec= $product_rows['id'] == $fav_rows[0][2];
// echo $chec;
?>
    <section class=" pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>
                                    <a class="d-flex justify-content-between text-decoration-none border-0 text-success pb-2"
                                       href="shop.php">Product</a>
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
                            // while($fav_rows = mysqli_fetch_assoc($fav_Result) ){
                            while ($product_row = mysqli_fetch_assoc($product_result)) {

                                ?>
                                <div class="col-md-4 mb-5" id="product">
                                    <div class="card product-wap mb-4 rounded-0" id="productcard">
                                        <div class="position-relative">
                                            <img src="./productimage/<?php echo $product_row['image']; ?>"
                                                 class="card-img rounded-0 img-fluid">
                                            <ul class="list-unstyled start-0 end-0" id="actionBtns">
                                                <li>
                                                    <?php if (!empty($favProductIds) && in_array($product_row['id'], $favProductIds)) { ?>
                                                        <a href="remove_to_wishlist.php?id=<?php echo $product_row['id']; ?>"
                                                           class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded">
                                                            <i class="fa-solid fa-heart text-danger"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="add_to_wishlist.php?id=<?php echo $product_row['id']; ?>"
                                                           class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </a>
                                                    <?php } ?>
                                                </li>
                                                <li>
                                                    <a href="./product_detail.php?id=<?php echo $product_row['id']; ?>"
                                                       class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded"
                                                       href="add_to_cart.php?id=<?php echo $product_row['id']; ?>">
                                                        <i class="fa-solid fa-cart-plus"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body p-2 bg-white w-100 h-100">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <p class=" h3 text-start card-title fw-light"><?php echo $product_row['product name']; ?></p>
                                                    <p class="card-text text-start"><?php echo $product_row['description']; ?></p>
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
                                                <p class="h6 fw-light"><?php echo '$' . $product_row['price'] . '.00'; ?></p>
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
    <script>
        $(document).ready(function () {

            $('#dropdown i').on('click', function () {
                $(this).toggleClass('fa-circle-chevron-up fa-circle-chevron-down')
                $('#catelist').toggleClass('d-none')
            })
            $('#dropdown2 i').on('click', function () {
                $(this).toggleClass('fa-circle-chevron-down fa-circle-chevron-up')
                $('#genderlist').toggleClass('d-none')
            })
            //  $('#heart').on('click', function() {
            //     $(this).toggleClass('fa-regular fa-solid')
            // })
        })
    </script>
<?php
include("./footer_base.php");
?>