<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
    <div id="left">
    <div id="logo">
        <a href="../index.php">Hikingpath</a> 
    </div>
    <div id="imgcont">
        
    </div>
    </div>
    <div id="right">
        <div id="login">
            <h1>Pieslēdzies un dodies piedzīvojumos!</h1>
            <h2>Pieslēgties</h2>
            <form action="db/db_login.php" method="post">
                <label for="username">Lietotājvārds:</label><br>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Parole:</label><br>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Pieslēgties">
            </form>
            <button onclick="window.location.href='signup.php'">Piereģistrēties</button>
        </div>
    </div>
</body>
</html>

