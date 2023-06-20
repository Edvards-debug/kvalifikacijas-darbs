<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    echo "not_logged_in";
    exit();
}
$username = $_SESSION['username'];
$tripId = $_POST['tripId'];

$query = mysqli_query($conn, "SELECT * FROM user_trips WHERE username = '$username' AND trip_id = '$tripId'");

if (mysqli_num_rows($query) > 0) {
    $delete = mysqli_query($conn, "DELETE FROM user_trips WHERE username = '$username' AND trip_id = '$tripId'");
    if ($delete) {
        echo "Trip removed successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    $insert = mysqli_query($conn, "INSERT INTO user_trips (username, trip_id) VALUES ('$username', '$tripId')");
    if ($insert) {
        echo "Trip added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



