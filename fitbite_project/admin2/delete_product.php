<?php
$prod_id = $_GET['prod_id'];
require_once('connection.php');
$delete = "DELETE FROM product where product_id = $prod_id";
mysqli_query($conn, $delete);
header("Location: view_product.php");
?>