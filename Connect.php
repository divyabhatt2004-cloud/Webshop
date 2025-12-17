<?php
$conn = mysqli_connect('localhost','root','','ecommerce');
  $_SESSION['isLogin'] =false;
if (!$conn) {
    echo "Connetion failed";
}else{
    session_start();

}
?>
