<?php
session_start();
include 'db_connect.php';

$username = $_SESSION['username'];
$tripId = $_POST['tripId'];

$query = mysqli_query($conn, "SELECT * FROM user_trips WHERE username = '$username' AND trip_id = '$tripId'");

if (mysqli_num_rows($query) > 0) {
    echo "registered";
} else {
    echo "not_registered";
}

?>