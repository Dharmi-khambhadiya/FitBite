<?php
$cat_id = $_GET['cat_id'];
require_once('connection.php');
$delete = "DELETE FROM category where category_id = $cat_id";
mysqli_query($conn, $delete);
header("Location: view_category.php");
?>