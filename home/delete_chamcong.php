<?php
include_once './config/config.php';
$conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
$macongnhan = $_GET['mcn'];
$ngay = $_GET['ngay'];
$query2 = "DELETE FROM bangchamcong WHERE macongnhan ='$macongnhan' AND ngay ='$ngay'";
$result2 = mysqli_query($conn, $query2) or die(mysql_error());
header("Location: ./nhapchamcong.php");
?>