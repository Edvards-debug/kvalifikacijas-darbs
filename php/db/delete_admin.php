<?php
ob_start();
session_start();
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['admin_id'])) {
        echo "No admin ID provided!";
        exit();
    }

    $admin_id = $_POST['admin_id'];

    $admin_id = filter_var($admin_id, FILTER_SANITIZE_NUMBER_INT);

    if (!filter_var($admin_id, FILTER_VALIDATE_INT)) {
        echo "Invalid admin ID!";
        exit();
    }
    $stmt = $conn->prepare("DELETE FROM admin_table WHERE admin_id = ?");
    $stmt->bind_param("i", $admin_id);


    if ($stmt->execute()) {
        $_SESSION['message'] = "Admin deleted successfully";
        header("Location: admin_db.php");
        exit();
    } else {
        echo "Error deleting admin: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>