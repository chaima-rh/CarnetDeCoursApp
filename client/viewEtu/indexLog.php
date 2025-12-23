<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index2.php");
    exit();
}
require_once("../controlersEtu/controlersloginA.php");
$error = login_action(); // خاص تخزن الناتج هنا باش تستعمله فالفيو
include("ViewLoginEtu.php");
?>
