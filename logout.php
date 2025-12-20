<?php
include "./connect.php";

$_SESSION["user_id"] = null;
$_SESSION["user_type"] = null;
$_SESSION['isLogin'] = false;

header('Location:index.php');
?>
