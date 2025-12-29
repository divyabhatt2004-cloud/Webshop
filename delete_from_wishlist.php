<?php
include('./connect.php');
$id = $_GET['id'];
$fav_Query = "DELETE FROM `wishlist` WHERE `product_id`= $id";
$fav_result = mysqli_query($conn, $fav_Query);

if ($fav_result) {
    header("Location:./wishlist.php");
} else {
    echo 'failed';
}
?>
