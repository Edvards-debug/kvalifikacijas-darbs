<?php
$servername = "localhost";
$username = "id20757047_edzahiking";
$password = "Qwer10!)";
$dbname = "id20757047_hikingtrip";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


