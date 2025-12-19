<?php
$conn = mysqli_connect('localhost','root','','ecommerce');

if (!$conn) {
    echo "Connetion failed";
}else{
    session_start();
    
    $_SESSION['isLogin'] = false;
    $_SESSION["user_type"] = 'user';
}
?>
