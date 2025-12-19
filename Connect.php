<?php
$conn = mysqli_connect('localhost','root','','ecommerce');
session_start();
$_SESSION['isLogin'] =false;
$_SESSION["user_type"] = 'user';
if (!$conn) {
    echo "Connetion failed";
}
?>
