<?php
require_once('connection.php');
$users_id = $_POST['users_id'];
$delivery_date = $_POST['delivery_date'];
$payment_method = $_POST['payment_method'];
$total_amount = $_POST['total_amount'];
$hidden_id = $_POST['hidden_orders'];
$update = "UPDATE orders SET users_id = '$users_id', delivery_date = '$delivery_date', payment_method = '$payment_method', total_amount = '$total_amount' where orders_id = $hidden_id";
mysqli_query($conn, $update);
header('Location: view_orders.php?edit_msg=1');
?>