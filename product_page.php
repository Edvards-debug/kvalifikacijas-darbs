<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
    session_start();
    require 'php/db/db_connect.php'; 
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
    } else {
        die('Produkta id nav atrasts.');
    }

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {

        die('Produkts nav atrasts.');
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product_page.css">
    <link rel="stylesheet" href="css/similar_products.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title><?php echo $product['name']; ?></title>
</head>
<body>

<?php include 'php/navbar.php'; ?>

<div class="pcontainer">
  <div class="product-info">
    <div class="product-name"><?php echo $product['name']; ?></div>
    <div class="product-price">&euro;<?php echo $product['price']; ?></div>
    <p class="product-description">
    <?php echo $product['description']; ?>
</p>
    <div id="choose">
        <label for="color">Krāsa:</label>
    <select id="color">
    <option value="">Krāsas izvēle</option>
      <option value="red">Melna</option>
      <option value="blue">Zila</option>
      <option value="green">Zaļa</option>
    </select>
    <label for="size">Izmērs:</label>
    <select id="size">
    <option value="">Izmēre izvēle</option>
      <option value="s">S</option>
      <option value="m">M</option>
      <option value="l">L</option>
    </select>
    <label for="quantity">Daudzums:</label>
    <input type="number" id="quantity" name="quantity" min="1" max="20" style="color: white">
  </div>
  <button class="add-to-cart-button" 
        data-name="<?php echo $product['name']; ?>"
        data-price="&euro;<?php echo $product['price']; ?>"
        data-image="<?php echo $product['image']; ?>">Pievienot grozam</button>
  </div>
  <div class="product-image" >
  <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width:100%">
  </div>
</div>

<?php include 'similar_products.php'; ?>





</body>
</html>