<?php
include('./connect.php');

$id = $_GET['id'];
$quantity = $_GET['quantity'] ?? 1;
$user_id = $_SESSION["user_id"];

$Cart_Query = "SELECT * FROM `cart` WHERE `product_id` = '$id' AND `user_id`= '$user_id'";
$Cart_Result = mysqli_query($conn, $Cart_Query);
$Cart_row = mysqli_fetch_assoc($Cart_Result);

if (!mysqli_num_rows($Cart_Result)) {

    $productCart_query = "SELECT * FROM `product` WHERE `id`= $id";
    $productCart_result = mysqli_query($conn, $productCart_query);
    $productCart_row = mysqli_fetch_assoc($productCart_result);

    $Cartproduct_id = $productCart_row['id'];
    $Cartproduct_name = $productCart_row['product name'];
    $Cartproduct_description = $productCart_row['description'];
    $Cartproduct_image = $productCart_row['image'];
    $Cartproduct_quantity = $quantity;
    $Cartproduct_price = $productCart_row['price'];
    $Cartproduct_gst = $productCart_row['gst'];


    $Cartdata_query = "INSERT INTO `cart`(`user_id`,`product_id`,`product name`, `description`, `image`, `quantity`, `price`,`gst`) 
    VALUES ('$user_id','$Cartproduct_id', '$Cartproduct_name','$Cartproduct_description','$Cartproduct_image','$Cartproduct_quantity','$Cartproduct_price','$Cartproduct_gst')";
    $Cartdata_result = mysqli_query($conn, $Cartdata_query);

    if ($Cartdata_result) {
        header('location:shop.php');
    }
} else {
    $Cart_row["quantity"] = $Cart_row["quantity"] + $quantity;
    $cart_quantity = $Cart_row["quantity"];
    $Cart_update_query = "UPDATE `cart` SET `quantity`='$cart_quantity' WHERE `product_id`= $id AND `user_id`= '$user_id'";
    $Cart_update_Result = mysqli_query($conn, $Cart_update_query);

    if ($Cart_update_Result) {
        header('location:shop.php');
    } else {
        echo 'error';
    }
}
