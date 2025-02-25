<?php
$users_id = $_GET['users_id'];
require_once('connection.php');
$delete = "DELETE FROM users_login where users_id = $users_id";
mysqli_query($conn, $delete);
header("Location: view_users.php");
?>