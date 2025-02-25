<?php
session_start();
unset($_SESSION['cart']); // Cart session ko empty kar do
header("Location: cart.php"); // Wapas cart page par redirect karein
exit();
?>
