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
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<div id="bg-nav">

</div>
<nav>
    <div class="nav-container">
        <div id="right">
            <a href="" id="wname" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
            EDZAHIKING
            </a>
        </div>
        <ul>
            <li><a href="index.php">Jaunumi</a></li>
            <li><a href="trips.php">Pārgājieni</a></li>
            <li><a href="services.php">Pakalpojumi</a></li>

        
        
        <?php
            if(isset($_SESSION['user_id'])){
                echo '
                <li class="dropdown">
                    <a href="profile.php" class="dropbtn">Profils</a>
                    <div class="dropdown-content">
                        <a href="profile.php">Mans profils</a>
                        <a href="php/logout.php">Izrakstīties</a>
                    </div>
                </li>';
            } else {
                echo '<li class="right"><a href="php/login.php">Pierakstīties</a></li>';
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
                <div id="carthead">Your cart</div>
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
<script src="https://js.stripe.com/v3/"></script>
<body>
</body>
</html>