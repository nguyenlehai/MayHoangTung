<?php
include_once './config/config.php';
$username = $_POST['username'];
$password = md5($_POST['password'].'hoangtung!1');
$conn = mysqli_connect($db_ip, $db_user, $db_password,$db_name);
$query = "SELECT * FROM user WHERE username = '".$username ."' AND password = '".$password ."'";
$result = mysqli_query($conn,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
if($rows==1){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['permission'] = $rows['permission'];	
	header("Location: ./home");
    }else{
	header("Location: ./index.php?notification=wrong");
	}
?>
