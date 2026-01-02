<?php
ob_start();
include('./connect.php');
$id = $_GET['id'];

$user_delquery = "DELETE FROM `user` WHERE `id`= $id";
$user_delresult = mysqli_query($conn, $user_delquery);

if ($user_delresult) {
    header("Location:./admin.php");
} else {
    echo 'failed';
}
?>