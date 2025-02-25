<?php
require_once('connection.php');
$users_id = $_POST['users_id'];
$delivery_date = $_POST['delivery_date'];
$payment_method = $_POST['payment_method'];
$total_price = $_POST['total_price'];
$hidden_id = $_POST['hidden_orders'];
// $update = "UPDATE orders SET users_id = '$users_id', delivery_date = '$delivery_date', payment_method = '$payment_method', total_amount = '$total_amount' where orders_id = $hidden_id";
$update = "UPDATE orders1 SET users_id = '$users_id', delivery_date = '$delivery_date', payment_method = '$payment_method', total_price = '$total_price' where id = $hidden_id";

mysqli_query($conn, $update);
header('Location: view_orders.php?edit_msg=1');
?>


<?php
// require_once('connection.php'); // Include database connection

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $id = $_POST['hidden_orders']; // Get hidden order ID
//     $users_id = $_POST['users_id'];
//     $delivery_date = $_POST['delivery_date'];
//     $payment_method = $_POST['payment_method'];
//     $total_price = $_POST['total_price'];

//     // Update query
//     $update = "UPDATE orders1 SET 
//                users_id = '$users_id', 
//                delivery_date = '$delivery_date', 
//                payment_method = '$payment_method', 
//                total_price = '$total_price' 
//                WHERE id = '$id'";

//     if (mysqli_query($conn, $update)) {
//         header('Location: view_orders.php?edit_msg=1'); // Redirect after success
//     } else {
//         echo "Error updating record: " . mysqli_error($conn);
//     }
// } else {
//     echo "Invalid request!";
// }
?>
