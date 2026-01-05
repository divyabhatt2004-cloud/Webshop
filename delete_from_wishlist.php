<?php
include('./connect.php');
$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$fav_Query = "DELETE FROM `wishlist` WHERE `product_id`= '$id' AND `user_id`= '$user_id'";
$fav_result = mysqli_query($conn, $fav_Query);

if ($fav_result) {
    if(basename($_SERVER['HTTP_REFERER']) == "shop.php"){
    header("Location:./shop.php");
    }else{
    header("Location:./wishlist.php");
    }
} else {
    echo 'failed';
}
?>
