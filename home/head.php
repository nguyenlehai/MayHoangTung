<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>Hệ thống quản lý nội bộ - May Hoàng Tùng</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/fav/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/fav/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/fav/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/fav/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/fav/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/fav/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/fav/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/fav/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/fav/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/fav/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/fav/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/fav/favicon-16x16.png">
    <link rel="manifest" href="assets/fav/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/fav/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css"/>

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css"/>
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="assets/js/ace-extra.min.js"></script>
    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
</head>
<?php
include_once './config/config.php';
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: ../index.php");
  exit();
}
$username = $_SESSION['username'];
$conn = mysqli_connect($db_ip, $db_user, $db_password, $db_name);
$query = "SELECT * FROM user WHERE username ='$username'";
$result = mysqli_query($conn, $query) or die(mysql_error());
$row = mysqli_fetch_assoc($result);
$check = false;
for ($i = 0; $i < count($permission); $i++) {
  if ($row['permission'] == $permission[$i]) {
    $check = true;
  }
}
if ($check == false) {
  header("Location: ./index.php");
}
?>	
