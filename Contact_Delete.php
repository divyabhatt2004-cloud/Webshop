<?php
include "./Connect.php";

if(!$_SESSION['isLogin'])
{
    header('Location:Login_User.php');
}

$id = $_GET["id"];
$userquery = "DELETE FROM `contact_us` WHERE `id`= $id";

$userresult = mysqli_query($conn, $userquery);

if ($userresult) {
    header("Location:./Support_Admin.php");
} else {
    echo 'failed';
}
?>
