<?php
require 'db/db_connect.php';

$sql = "SELECT name FROM categories";
$result = $conn->query($sql);
$categories = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($categories, $row["name"]);
    }
} else {
    echo "No categories found";
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$products = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($products, $row);
    }
} else {
    echo "No products found";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Store</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                if ($(this).val() === 'new') {
                    $('#newCategory').show();
                } else {
                    $('#newCategory').hide();
                }
            });
        });
    </script>
</head>
<body>
<p>
<a href="admin_panel.php"><- Admina panelis</a>
</p>

<form method="post" action="db/db_products.php" enctype="multipart/form-data">
    <label for="name">Produkta nosaukums:</label><br>
    <input type="text" id="name" name="name"><br>

    <label for="category">Kategorija:</label><br>
    <select id="category" name="category">
    <?php
    foreach($categories as $category){
        echo "<option value=\"".$category."\">".$category."</option>";
    }
    ?>
    <option value="new">Pievienot jaunu kategoriju...</option>
    </select>
    <br>

    <input type="text" id="newCategory" name="newCategory" style="display: none;"><br>

    <label for="price">Cena:</label><br>
    <input type="number" id="price" name="price" step="0.01"><br>

    <label for="image">Produkta bilde:</label><br>
    <input type="file" id="image" name="image"><br>

    <label for="description">Produkta apraksts:</label><br>
    <textarea id="description" name="description" rows="4" cols="50"></textarea><br>

    <input type="submit" value="Submit">
</form>

 <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.more').each(function() {
                var content = $(this).html();
                if(content.length > 100) {
                    var shortContent = content.substr(0, 100);
                    var html = shortContent + '<span class="ellipsis">...</span><span class="morecontent"><span style="display: none;">' + content.substr(100) + '</span> <a href="" class="morelink">Show more</a></span>';
                    $(this).html(html);
                }
            });

            $(".morelink").click(function() {
                if($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html("Show more");
                } else {
                    $(this).addClass("less");
                    $(this).html("Show less");
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });
        });
    </script>
</head>
<body>
<table style="margin-top:50px;">
    <tr>
        <th>Produkta nosaukums</th>
        <th>Kategorija</th>
        <th>Cena</th>
        <th>Apraksts</th>
        <th></th>
    </tr>

    <?php
    foreach ($products as $product) {
        echo "<tr>";
        echo "<td>" . $product['name'] . "</td>";
        echo "<td>" . $product['category'] . "</td>";
        echo "<td>" . $product['price'] . "</td>";
        echo "<td class='more'>" . $product['description'] . "</td>";
        echo "<td>";
        echo "<form method='POST' action='db/delete_product.php' onsubmit='return confirm(\"Vai tiešām vēlieties dzēst šo produktu?\");'>";
        echo "<input type='hidden' name='product_id' value='". $product['id'] ."'>";
        echo "<input type='submit' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    ?>

</table>
</body>
</html>

</body>
</html>
