<?php
$orders_id = $_GET['orders_id'];
require_once('connection.php');
$delete = "DELETE FROM orders where orders_id = $orders_id";
mysqli_query($conn, $delete);
header("Location: view_orders.php");
?>