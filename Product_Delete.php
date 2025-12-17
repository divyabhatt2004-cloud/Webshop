<?php
include('./Connect.php');
if(!$_SESSION['isLogin'])
{
    header('Location:Login_User.php');
}

$id = $_GET['id'];
$productquery = "DELETE FROM `product` WHERE `id`= $id";
$productresult = mysqli_query($conn, $productquery);

if ($productresult) {
    header("Location:./Product_Admin.php");
} else {
    echo 'failed';
}
?>
