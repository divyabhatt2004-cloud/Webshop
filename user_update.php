<?php
ob_start();
include('./connect.php');

$id = $_GET['id']; 

$active_query ="SELECT `active` FROM `user` WHERE `id`='$id'";
$active_result = mysqli_query($conn, $active_query);
$active_row = mysqli_fetch_assoc($active_result);

if($active_row["active"] == 1) {

$update_active = "UPDATE `user` SET `active`='0' WHERE `id`='$id'";
$query = mysqli_query($conn, $update_active);

if($query){
    header("Location:admin.php");
}else{
    echo 'failed';
}
}
else{
$update_active = "UPDATE `user` SET `active`='1' WHERE `id`='$id'";
$query = mysqli_query($conn, $update_active);

if($query){
    header("Location:admin.php");
}else{
    echo 'failed';
}  
}
?>