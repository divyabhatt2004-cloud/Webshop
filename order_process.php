<?php
include "./connect.php";
include('./header_base.php');

if(!$_SESSION['isLogin'])
{
    header('Location:login.php');
}

//$user_query = "SELECT * FROM `user`";
$Cart_Query = "SELECT * FROM `cart`";
$Cart_Result = mysqli_query($conn, $Cart_Query);
?>    
<?php
include("./footer_base.php");
?>