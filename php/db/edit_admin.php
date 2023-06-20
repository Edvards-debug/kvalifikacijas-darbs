<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'];
    $admin_code = $_POST['admin_code'];
    $admin_username = $_POST['admin_username'];

    $stmt = $conn->prepare("UPDATE admin_table SET admin_code = ?, admin_username = ? WHERE admin_id = ?");
    $stmt->bind_param("ssi", $admin_code, $admin_username, $admin_id);

    if ($stmt->execute()) {
        echo "Admin updated successfully";
    } else {
        echo "Error updating admin: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$conn->close();
?>