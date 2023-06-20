<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://hikingtrip.000webhostapp.com/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://js.stripe.com/v3/"></script>
    <title>Document</title>
</head>
<div id="bg-nav">

</div>
<nav>
    <div class="nav-container"> 
        <div id="right">
            <a href="https://hikingtrip.000webhostapp.com/index.php" id="wname" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
            HIKINGPATH
            </a>
        </div>
        <ul>
            <li><a href="https://hikingtrip.000webhostapp.com/index.php">Jaunumi</a></li>
            <li><a href="https://hikingtrip.000webhostapp.com/trips.php">Pārgājieni</a></li>
            <li><a href="https://hikingtrip.000webhostapp.com/shop.php">Veikals</a></li>

       
        
        <?php
    if(isset($_SESSION['user_id']) || isset($_SESSION['admin_username'])){
        echo '
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">';
        if(isset($_SESSION['admin_username'])) {
            echo 'Admina panelis';
        } else {
            echo 'Profils';
        }
        echo '</a>
            <div class="dropdown-content">
        ';
        if(isset($_SESSION['admin_username'])) {
            echo '<a href="https://hikingtrip.000webhostapp.com/php/admin_panel.php">Admina panelis</a>';
        } else {
            echo '<a href="https://hikingtrip.000webhostapp.com/profile.php">Mans profils</a>';
        }
        echo '
                <a href="https://hikingtrip.000webhostapp.com/php/logout.php">Izrakstīties</a>
            </div>
        </li>';
    } else {
        echo '<li class="right"><a href="https://hikingtrip.000webhostapp.com/php/login.php">Pierakstīties</a></li>';
    }
?>

        </ul>
        <div id="left">
            <a href="javascript:void(0)" id="openCart">
            <i class="fa fa-shopping-cart"></i>
            </a>
        </div>
        <div id="cartModal" class="modal-cart">
            <div class="modal-content-cart">
                <span class="close-cart">&times;</span>
                <div id="carthead">Jūsu grozs</div>
                <div id="cart-products">

                </div>
                <div id="cart-total">

                </div>
            </div>
        </div>
    </div>
</nav>

<script>



window.onscroll = function() {myFunction()};

function myFunction() {
    var navbar = document.getElementsByTagName('nav')[0];
    if (document.body.scrollTop > 160 || document.documentElement.scrollTop > 160) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
}

var modal = document.getElementById("cartModal");
var btn = document.getElementById("openCart");
var span = document.getElementsByClassName("close-cart")[0];

btn.onclick = function() {
    event.preventDefault();
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script src="js/cart.js"></script>
<body>
</body>
</html>