<?php

include 'db_connect.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['newusername']);
$password = mysqli_real_escape_string($conn, $_POST['newpassword']);


$check = mysqli_query($conn, "SELECT * FROM Users WHERE email='$email' OR username='$username'");
if (mysqli_num_rows($check) > 0) {
    header("Location: ../signup.php?error=User with this username or email already exists");
    return;
}


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$insert = mysqli_query($conn, "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hashed_password')");
if ($insert) {
    header("Location: ../reg_succesfull.php");
} else {
    echo "Error: " . $conn->error;
}

