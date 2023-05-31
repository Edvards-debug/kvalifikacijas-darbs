<?php
   if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include 'php/db/db_connect.php';
    
    $username = $_SESSION['username'];
    $query = "SELECT email, username, reg_date FROM Users WHERE username = ?";
    
    if($stmt = $conn->prepare($query)){
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($email, $username, $reg_date);
        $stmt->fetch();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/trips.css">
    <title>Mans profils</title>
</head>
<body>
<?php include 'php/navbar.php'; ?>

<div id="main-cont">



<div id="user-info-cont">
    <div id="info-head">
    <h1>Mans profils</h1>
    </div>
    <div id="info-main">
        <div id="username">
            Lietotajvārds: <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>
        </div>
        <div id="email">
            Epasts: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>
        </div>
        <div id="reg-date">
            Reģistrēšanās datums: <?php echo htmlspecialchars($reg_date, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    </div>
</div>

<div id="my-trips-cont">
    <div id="my-trips-head">
    <h1>Mani pārgājieni</h1>
    </div>
    <div id=" trips-cont">

                <?php
                if(session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                include 'php/db/db_connect.php';

                $username = $_SESSION['username'];

                $query = mysqli_query($conn, "SELECT trip_id FROM user_trips WHERE username = '$username'");

                echo "<div id='trips-cont'>";

                $count = 0;
                $tripIds = array();
                while ($row = mysqli_fetch_assoc($query)) {
                    $tripId = $row['trip_id'];
                    $tripIds[] = $tripId;
                    if ($count < 3) {
                        echo "<div class='trip-item first-row'>";
                    } else {
                        echo "<div class='trip-item'>";
                    }
                    include "php/thumbnails/tbn{$tripId}.php";
                    include "php/modals/modal{$tripId}.php";
                    echo "</div>";
                    $count++;
                }
                
                echo "</div>";
                ?>


    </div>
</div>

</div>

<script src="js/modal.js"></script>
<script src="js/send_id.js"></script>
<script>
    <?php foreach ($tripIds as $tripId) { ?>
        setupModal('myModal<?php echo $tripId ?>', 'trip-window<?php echo $tripId ?>', 'more<?php echo $tripId ?>', 'myBtn<?php echo $tripId ?>');
    <?php } ?>
</script>
<script src="js/cart.js"></script>

</body>