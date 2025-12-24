<?php
ob_start();
include('./header_base.php');

$id = $_SESSION["user_id"];
$user_query = "SELECT * FROM `user_details` WHERE `user_id`= '$id'";
$user_result = mysqli_query($conn, $user_query);
$user_row = mysqli_fetch_assoc($user_result);

$Cart_Query = "SELECT * FROM `cart`";
$Cart_Result = mysqli_query($conn, $Cart_Query);
?>
<section class="bg-light bg-opacity-50">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-8">
            <div class="card mb-5 mt-5">
                <div class="card-body bg-success text-center p-5 shadow rounded">
                    <p class="h3 text-white">Thankyou for placing order</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <p class="h3 text-center mb-5">Order Details</p>
    </div>
    <div class="row">
        <div class="col-lg-4 offset-2 border">
            <p class="h5 fw-light">Order placed by:</p>
        </div>
        <div class="col-lg-4 border">
            <p class="h5 fw-light"> <span><?php echo $user_row['user_name']; ?><br></span>
                <span><?php echo $user_row['user_email']; ?></span>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 offset-2 border">
            <p class="h5 fw-light">Billing Address:</p>
        </div>
        <div class="col-lg-4 border">
            <p class="h5 fw-light">
                <span><?php echo $user_row['house_number']; ?>,<?php echo $user_row['street']; ?>,
                    <?php echo $user_row['locality']; ?>,<?php echo $user_row['city']; ?>
                    ,<?php echo $user_row['state']; ?>,<?php echo $user_row['country']; ?>
                </span>
            <div>Pincode: <?php echo $user_row['pincode']; ?></div>
            </p>
        </div>
    </div>
</section>
<?php
include("./footer_base.php");
?>