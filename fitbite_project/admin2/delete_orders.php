<?php
$id = $_GET['id'];
require_once('connection.php');
$delete = "DELETE FROM orders1 where id = $id";
mysqli_query($conn, $delete);
header("Location: view_orders.php");
?>



