<?php
session_start();

include 'db_connect.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
    $stmt = $conn->prepare("SELECT * FROM Users WHERE username = ?");
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($user) {

        if(password_verify($_POST['password'], $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            
            session_regenerate_id();

            $session_id = session_id();

        
            $stmt = $conn->prepare("SELECT * FROM usessions WHERE username = ?");
            $stmt->bind_param("s", $_POST['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            $usession = $result->fetch_assoc();

            if($usession) {
                
                $stmt = $conn->prepare("UPDATE usessions SET session_id = ? WHERE username = ?");
            } else {
              
                $stmt = $conn->prepare("INSERT INTO usessions (session_id, username) VALUES (?, ?)");
            }

            $stmt->bind_param("ss", $session_id, $_POST['username']);
            $stmt->execute();

            header("Location: ../../index.php");
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "Username does not exist!";
    }
}



?>

