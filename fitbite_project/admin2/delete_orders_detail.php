<?php
$orders_detail_id = $_GET['orders_detail_id'];
require_once('connection.php');
$delete = "DELETE FROM orders_detail where orders_detail_id = $orders_detail_id";
mysqli_query($conn, $delete);
header("Location: view_orders.php");
?>