<?php

ob_start();

require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = $_FILES['image'];

    if ($category === 'new') {
        $newCategory = $_POST['newCategory'];

        $sql = "SELECT * FROM categories WHERE name = '$newCategory'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO categories (name) VALUES ('$newCategory')";

            if ($conn->query($sql) === TRUE) {
                echo "New category added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $category = $newCategory;
        } else {
            echo "Category already exists";
            $category = $newCategory;
        }
    }

    $image_directory = "../../img/";
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($file_tmp, $image_directory.$file_name);
    $image = "https://hikingtrip.000webhostapp.com/img/".$file_name;

    $sql = "INSERT INTO products (name, category, price, image, description) 
    VALUES ('$name', '$category', $price, '$image', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: ../edit_store.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>