<?php
include 'connection.php'; // Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $users_username = trim($_POST['users_username']);
    $users_email = trim($_POST['users_email']);
    $users_password = password_hash(trim($_POST['users_password']), PASSWORD_BCRYPT); // Hash the password
    $users_mobile = trim($_POST['users_mobile']);
    $users_address = trim($_POST['users_address']);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO users_login (users_username, users_email, users_password, users_mobile, users_address) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt) {
        $stmt->bind_param("sssss", $users_username, $users_email, $users_password, $users_mobile, $users_address);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "Signup successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error in preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>
