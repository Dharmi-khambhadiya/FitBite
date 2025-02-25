<?php
require_once('connection.php');
$id = $_GET['id'];
$select = "SELECT * FROM product where product_id = $id";
$query = mysqli_query($conn, $select);
$res = mysqli_fetch_assoc($query);
echo json_encode($res);
?>