<?php

require 'db_connect.php';

$sql = "SELECT DISTINCT category FROM products";
$result = $conn->query($sql);
$categories = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($categories, $row["category"]);
    }
} else {
    echo "No categories found";
}

echo json_encode($categories);

$conn->close();