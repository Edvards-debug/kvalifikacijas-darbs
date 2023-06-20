<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db_connect.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username_parts = explode("-", $_POST['username']);
    $admin_code = '';
    $username = $_POST['username'];

    if(count($username_parts) == 2) {
        $admin_code = $username_parts[0];
        $username = $username_parts[1];
    }

    if($admin_code) {

        $stmt = $conn->prepare("SELECT * FROM admin_table WHERE admin_username = ? AND admin_code = ?");
        $stmt->bind_param("ss", $username, $admin_code);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if($admin) {
            if(password_verify($_POST['password'], $admin['admin_password']) || $_POST['password'] === $admin['admin_password']) {
                $_SESSION['admin_id'] = $admin['admin_id']; 
                $_SESSION['admin_username'] = $admin['admin_username'];
                header("Location: ../admin_panel.php");
                exit();
            } else {
                echo("invalid admin password");
                exit();
            }
        } else {
            echo("invalid admin code or admin username");
            exit();
        }
    } else {

        $stmt = $conn->prepare("SELECT * FROM Users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if($user) {
            if(password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id']; 
                $_SESSION['username'] = $user['username'];
                header("Location: ../../index.php");
                exit();
            } else {
                echo("invalid user password");
                exit();
            }
        } else {
            echo("invalid user username");
            exit();
        }
    }
}
?>