<?php
ob_start();
include('./connect.php');
$id = $_GET['id'];
$productquery = "DELETE FROM `product` WHERE `id`= $id";
$productresult = mysqli_query($conn, $productquery);

if ($productresult) {
    header("Location:./product_admin.php");
} else {
    echo 'failed';
}
?>
