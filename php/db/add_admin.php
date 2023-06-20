<?php
ob_start(); 
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $admin_code = $_POST['admin_code'];
    $admin_username = $_POST['admin_username'];
    $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO admin_table (admin_code, admin_username, admin_password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $admin_code, $admin_username, $admin_password);

    if ($stmt->execute()) {
        $_SESSION['message'] = "New admin created successfully"; 
        header("Location: admin_db.php");
        exit();
    } else {
        echo "Error creating admin: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>