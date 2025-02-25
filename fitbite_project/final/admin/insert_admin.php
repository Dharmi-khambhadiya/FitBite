<?php
require_once('connection.php');
$admin_username = $_POST['admin_username'];
$admin_email = $_POST['admin_email'];
$admin_password = $_POST['admin_password'];
$insert = "INSERT INTO admin_login (admin_username, admin_email, admin_password) values ('$admin_username', '$admin_email', '$admin_password')";
$select = "SELECT * FROM admin_login where admin_username = '$admin_username'";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
	header("Location: admin_signup.php?register_msg=1");
}
else {
	mysqli_query($conn, $insert);
	header("Location: index.php");
}
?>
