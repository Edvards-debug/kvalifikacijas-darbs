<?php
require 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['product_id'])) {
        echo "No product ID provided!";
        exit();
    }

    $product_id = $_POST['product_id'];
    $product_id = filter_var($product_id, FILTER_SANITIZE_NUMBER_INT);

    if (!filter_var($product_id, FILTER_VALIDATE_INT)) {
        echo "Invalid product ID!";
        exit();
    }

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        header("Location: ../edit_store.php");
        exit;
    } else {
        echo "Error deleting product: " . $stmt->error;
    }

    $stmt->close();

} else {
    echo "Invalid request";
}
$conn->close();
?>