<?php
include_once './config/config.php';
$conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
$id = $_GET['id'];
$query2 = "DELETE FROM gopmatinhluong WHERE id ='$id'";
$result2 = mysqli_query($conn, $query2) or die(mysql_error());
header("Location: ./gopmatinhluong.php");
?>