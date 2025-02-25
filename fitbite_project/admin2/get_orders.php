<?php
// require_once('connection.php');
// $id = $_GET['id'];
// $select = "SELECT * FROM orders1 where id = $id";
// $query = mysqli_query($conn, $select);
// $res = mysqli_fetch_assoc($query);
// echo json_encode($res);

require_once('connection.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT o.id, u.users_id, o.product_name, o.product_price, o.quantity, o.total_price, o.delivery_date, o.payment_method FROM orders1 o 
    JOIN users_login u ON o.users_id = u.users_id
    WHERE o.id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($res = $result->fetch_assoc()) {
        echo json_encode($res);
    } else {
        echo json_encode(['error' => 'Order not found']);
    }
}
