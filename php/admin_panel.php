<?php
session_start();

if (!isset($_SESSION['admin_username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        .admin-panel {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .admin-panel button {
            width: 200px;
            height: 50px;
            margin: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <button onclick="window.location.href='../index.php'">Apskatit mājaslapu</button>
        <button onclick="window.location.href='https://databases-auth.000webhost.com/index.php'">phpMyAdmin</button>
        <button onclick="window.location.href='db/admin_db.php'">Administratoru datubāze</button>
        <button onclick="window.location.href='edit_store.php'">Rediģēt veikalu</button>
    </div>
</body>
</html>