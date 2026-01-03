<?php
$conn = mysqli_connect('localhost','root','','ecommerce');

if (!$conn) {
    echo "Connetion failed";
}else{
    session_start();
    $userLoginRequired = ['product_cart.php','cart_checkout.php','admin.php','add_to_cart.php','categaory_delete.php',
        'categories_admin.php','categories_create.php','category_update.php','contact_delete.php','contact_update.php',
        'delete_from_cart.php','order_process.php','product_admin.php','product_create.php','product_delete.php','product_update.php',
        'support_admin.php','account.php','wishlist.php','logout.php','verify.php','user_update.php','add_to_wishlist.php','delete_from_wishlist.php','user_delete.php'];

    $userTypecheck = ['admin.php','categaory_delete.php','categories_admin.php','categories_create.php','category_update.php','contact_delete.php',
        'contact_update.php','product_admin.php','product_create.php',
        'product_delete.php','product_update.php','support_admin.php'];
    $isLogin = $_SESSION['isLogin'] ?? false;


    if (!$isLogin && in_array(basename($_SERVER['PHP_SELF']), $userLoginRequired))
    {
        header('Location: login.php');
        exit;
    }

    if ((isset($_SESSION["user_type"]) && $_SESSION["user_type"] === 'user') && in_array(basename($_SERVER['PHP_SELF']), $userTypecheck))
    {
        header('Location: index.php');
        exit;
    }
}
?>
