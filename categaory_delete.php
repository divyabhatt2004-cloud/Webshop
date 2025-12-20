<?php
ob_start();
include('./connect.php');

$id = $_GET['id'];
$categoryquery = "DELETE FROM `categories` WHERE `id`= $id";
$categoryresult = mysqli_query($conn, $categoryquery);

if ($categoryresult) {
    header("Location:./categories_Admin.php");
} else {
    echo 'failed';
}
?>
