<?php
include "./Connect.php";
$id = $_GET["id"];
$userquery = "DELETE FROM `contact_us` WHERE `id`= $id";

$userresult = mysqli_query($conn, $userquery);

if ($userresult) {
    header("Location:./Support_Admin.php");
} else {
    echo 'failed';
}
?>
