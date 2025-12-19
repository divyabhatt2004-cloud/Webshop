<?php
include "./connect.php";

if(!$_SESSION['isLogin'])
{
    header('Location:login.php');
}

$id = $_GET["id"];
$userquery = "DELETE FROM `contact_us` WHERE `id`= $id";

$userresult = mysqli_query($conn, $userquery);

if ($userresult) {
    header("Location:./support_admin.php");
} else {
    echo 'failed';
}
?>
