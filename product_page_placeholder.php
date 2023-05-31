<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product_page.css">
    <link rel="stylesheet" href="css/similar_products.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Product placeholder</title>
</head>
<body>

<?php include 'php/navbar.php'; ?>

<div class="pcontainer">
  <div class="product-info">
    <div class="product-name">Product placeholder</div>
    <div class="product-price">&euro;75.49</div>
    <p class="product-description">
        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham..</p>
    <div id="choose">
        <label for="color">Choose a color:</label>
    <select id="color">
    <option value="">Select color</option>
      <option value="red">Red</option>
      <option value="blue">Blue</option>
      <option value="green">Green</option>
    </select>
    <label for="size">Choose a size:</label>
    <select id="size">
    <option value="">Select size</option>
      <option value="s">Small</option>
      <option value="m">Medium</option>
      <option value="l">Large</option>
    </select>
    <label for="quantity">Daudzums:</label>
    <input type="number" id="quantity" name="quantity" min="1" max="20" style="color: white">
  </div>
  <button class="add-to-cart-button" 
        data-name="Product placeholder"
        data-price="&euro;75.49"
        data-image="img/ph_img.webp">Add to basket</button>
  </div>
  <div class="product-image" >
    <img src="img/ph_img.webp" alt="Product image" style="width:100%">
  </div>
</div>

<?php include 'similar_products.php'; ?>

<script src="https://js.stripe.com/v3/"></script>
<script src="js/cart.js"></script>


</body>
</html>