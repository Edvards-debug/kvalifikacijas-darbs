<?php
header('Content-Type: application/json');

require 'db_connect.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} 

echo json_encode($products);

$conn->close();
?>