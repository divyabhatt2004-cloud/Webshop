<?php
include('./Connect.php');

$id = $_GET['id'];
$productquery = "DELETE FROM `product` WHERE `id`= $id";
$productresult = mysqli_query($conn, $productquery);

if ($productresult) {
    header("Location:./Product_Admin.php");
} else {
    echo 'failed';
}
?>
