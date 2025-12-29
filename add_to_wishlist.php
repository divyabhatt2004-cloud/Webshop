<?php
include('./connect.php');

$id = $_GET['id'];
// $quantity = $_GET['quantity'] ?? 1;
$user_id = $_SESSION["user_id"];

$fav_Query = "SELECT * FROM `wishlist` WHERE `product_id` = '$id' AND `user_id`= '$user_id'";
$fav_Result = mysqli_query($conn, $fav_Query);

if (!mysqli_num_rows($fav_Result)) {

    $productfav_query = "SELECT * FROM `product` WHERE `id`= $id";
    $productfav_result = mysqli_query($conn, $productfav_query);
    $productfav_row = mysqli_fetch_assoc($productfav_result);

    $fav_product_id = $productfav_row['id'];
    $fav_product_name = $productfav_row['product name'];
    $fav_product_description = $productfav_row['description'];
    $fav_product_image = $productfav_row['image'];
    $fav_product_quantity = $productfav_row['quantity'];
    $fav_product_price = $productfav_row['price'];
    $fav_product_gst = $productfav_row['gst'];


    $fav_data_query = "INSERT INTO `wishlist`(`user_id`,`product_id`,`product_name`, `description`, `image`, `quantity`, `price`,`gst`) 
    VALUES ('$user_id','$fav_product_id', '$fav_product_name','$fav_product_description','$fav_product_image','$fav_product_quantity',
    '$fav_product_price','$fav_product_gst')";
    $fav_data_result = mysqli_query($conn, $fav_data_query);

    if ($fav_data_result) {
        header('location:shop.php');
    }
} else {
    header('location:shop.php');
}
