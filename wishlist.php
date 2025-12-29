<?php
ob_start();
include('./header_base.php');
$id = $_SESSION["user_id"];

$fav_Query = "SELECT * FROM `wishlist` WHERE `user_id`= '$id'";
$fav_Result = mysqli_query($conn, $fav_Query);

?>
<section class="container pt-5 pb-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <!-- <div class="row">
                 <div class="card justify-content-center"> -->
                <div class="card-body rounded-circle bg-light border border-black w-50 p-5 m-auto mt-3 mb-3">
                    <img src="" class="card-img rounded-circle img-fluid w-50 p-5">
                </div>
                <!-- </div> -->
                <!-- <img src="" class="card-img rounded-circle img-fluid" alt="user_img"> -->
                <!-- </div> -->
                <div class="card-body">
                    <a class="list-group-item border-0 text-success mb-1" href="account.php">Personal data</a>
                    <a class="list-group-item text-success border-0 mb-1" href="wishlist.php">Wishlist</a>
                    <a class="list-group-item text-success border-0 mb-1" href="#">Orders</a>
                    <a class="list-group-item text-success border-0 mb-1" href="change_password.php">Change password</a>
                    <a class="list-group-item text-success border-0 mb-1" href="logout.php">Log out</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row text-center">
                <?php
                while ($fav_row = mysqli_fetch_assoc($fav_Result)) {
                ?>
                    <div class="col-md-4 mb-5" id="product">
                        <div class="card product-wap mb-4 rounded-0" id="productcard">
                            <div class="position-relative">
                                <img src="./productimage/<?php echo $fav_row['image']; ?>" class="card-img rounded-0 img-fluid">
                                <ul class="list-unstyled start-0 end-0" id="actionBtns">
                                    <li>
                                        <a href="delete_from_wishlist.php?id=<?php echo $fav_row['product_id']; ?>" class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded">
                                            <i class="fa-solid fa-heart" id="heart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./product_detail.php?id=<?php echo $fav_row['product_id']; ?>"
                                            class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white btn btn-success opacity-75 p-2 border-0 mb-1 rounded"
                                            href="add_to_cart.php?id=<?php echo $fav_row['product_id']; ?>">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body p-2 bg-white w-100 h-100">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <p class=" h3 text-start card-title fw-light"><?php echo $fav_row['product_name']; ?></p>
                                        <p class="card-text text-start"><?php echo $fav_row['description']; ?></p>
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
                                    <p class="h6 fw-light"><?php echo '$' . $fav_row['price'] . '.00'; ?></p>
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
</section>
<script> 
    $(document).ready(function() {
        $('#heart').on('click', function() {
            $(this).toggleClass('fa-solid fa-regular')
        })
    })
</script>
<?php
include("./footer_base.php");
?>