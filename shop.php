<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html><html lang="en"><head><script src="https://js.stripe.com/v3/"></script><meta charset="utf-8"/><meta name="viewport" content="width=device-width,initial-scale=1"/><meta name="theme-color" content="#000000"/><meta name="description"/><link rel="apple-touch-icon" href="./logo192.png"/><link rel="manifest" href="./manifest.json"/><title>Veikals</title><script defer="defer" src="./static/js/main.5e1b1a0c.js"></script><link href="./static/css/main.b7c811db.css" rel="stylesheet"></head><body>
    
<div style="margin: 350px"></div>
    
    <?php include 'php/navbar.php'; ?>
    
    <noscript>You need to enable JavaScript to run this app.</noscript><div id="root"></div>
    
    <script src="js/cart.js"></script>
    </body></html>