<?php
include('./connect.php');
$id = $_GET['id'];
$fav_Query = "DELETE FROM `wishlist` WHERE `product_id`= $id";
$fav_result = mysqli_query($conn, $fav_Query);

if ($fav_result) {
    if($_SERVER['HTTP_REFERER'] == "http://localhost/webshop/shop.php"){
    header("Location:./shop.php");
    }else{
    header("Location:./wishlist.php");
    }
} else {
    echo 'failed';
}
?>
