<?php
include('./Connect.php');

$id = $_GET['id'];
$cart_query = "DELETE FROM `cart` WHERE `id`= $id";
$cart_result = mysqli_query($conn, $cart_query);

if ($cart_result) {
    header("Location:./Product_Cart.php");
} else {
    echo 'failed';
}
?>
