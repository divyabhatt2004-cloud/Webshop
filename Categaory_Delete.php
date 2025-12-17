<?php
include('./Connect.php');
if(!$_SESSION['isLogin'])
{
    header('Location:Login_User.php');
}

$id = $_GET['id'];
$categoryquery = "DELETE FROM `categories` WHERE `id`= $id";
$categoryresult = mysqli_query($conn, $categoryquery);

if ($categoryresult) {
    header("Location:./Categories_Admin.php");
} else {
    echo 'failed';
}
?>
