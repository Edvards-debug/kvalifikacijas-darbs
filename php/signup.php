<?php if (isset($_GET['error'])): ?>
    <script>alert("<?php echo $_GET['error']; ?>");</script>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>

<div id="logo">
        <a href="../index.php">Hikingpath</a> 
    </div>

    <title>Piereģistrēties</title>
    <link rel="stylesheet" type="text/css" href="../css/signup.css">
</head>
<body>
    <div id="signup">
        <h2>Piereģistrēties</h2>
        <form action="db/db_signup.php" method="post">
            <label for="email">Epasts:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="newusername">Lietotājvārds:</label><br>
            <input type="text" id="newusername" name="newusername" required><br>
            <label for="newpassword">Parole:</label><br>
            <input type="password" id="newpassword" name="newpassword" required><br>
            <label for="confirm_password">Apstiprināt paroli:</label><br>
            <input type="password" id="confirm_password" name="confirm_password" required><br>
            <input type="submit" value="Piereģistrēties">
        </form>
        <button onclick="window.location.href='login.php'">Pieslēgties</button>
    </div>
</body>
</html>