<?php
$conn = mysqli_connect('localhost','root','','ecommerce');

if (!$conn) {
    echo "Connetion failed";
}else{
    session_start();

    $userLoginRequired = ['product_cart.php','checkout.php'];
    if (in_array(basename($_SERVER['PHP_SELF']), $userLoginRequired)) {
        header('Location:login.php');
    }
}
?>
