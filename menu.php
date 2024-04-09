<?php
require_once 'config.php'; 

$store_id = "1";
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .food-item {
            display: flex;
            flex-direction: row;
        }
        .food-item .card-img-top {
            flex: 0 0 50%;
            max-width: 50%;
            height: auto;
        }
        .food-item .card-body {
            flex: 1;
        }
        .quantity-position {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
    </style>
    <script>

        var order = [];
        var total = 0;
        //function to add order
        function addToOrder(productId, productPrice) {
            var index = order.findIndex(item => item.product_id === productId);
            if (index !== -1) {
                order[index].quantity += 1;
            } else {
                order.push({ product_id: productId, quantity: 1 });
            }
        
            total += productPrice;
            updateQuantityDisplay(productId);
            alert(JSON.stringify(order));
            alert(total);
        }
        //function to remove order
        function removeFromOrder(productId, productPrice) {
            var index = order.findIndex(item => item.product_id === productId);
            if (index !== -1) {
                order[index].quantity -= 1;
                if (order[index].quantity <= 0) {
                    order.splice(index, 1);
                }
                total -= productPrice;
                updateQuantityDisplay(productId);
                alert(JSON.stringify(order));
                alert(total);
            }
        }
        //function to maintain dynamic update for quantity
        function updateQuantityDisplay(productId) {
            var quantitySpan = document.getElementById('quantity-' + productId);
            if (quantitySpan) {
                var index = order.findIndex(item => item.product_id === productId);
                if (index !== -1) {
                    quantitySpan.textContent = order[index].quantity;
                } else {
                    quantitySpan.textContent = '0';
                }
            }
        }

    </script>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_name = $row['product_name'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];
                $quantity = 0;
                $id = $row['product_id'];
                $availability = $row['product_availability'];
        
                if ($availability) {
                    echo '<div class="col-md-6 mb-4">';
                    echo '<div class="card food-item rounded">';
                    echo '<img src="' . $row['product_image'] . '" class="card-img-top"  style="max-width: 200px;" alt="Food Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $product_name . '</h5>';
                    echo '<p class="card-text">' . $product_description . '</p>';
                    echo '<p class="card-text">$' . $product_price . '</p>';
                    echo '</div>';
                    echo '<div class="quantity-position">';
                    echo '<button class="btn btn-primary mr-2" onclick="removeFromOrder(' . $id . ' , ' . $product_price .')">-</button>';
                    echo '<span class="quantity" id="quantity-' . $id . '">' . $quantity . '</span>';
                    echo '<button class="btn btn-primary ml-2" onclick="addToOrder(' . $id . ' , ' . $product_price .')">+</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        
            mysqli_free_result($result);
        } else {
            echo json_encode(array('error' => 'Failed to fetch products.'));
        }
        ?>
    </div>
</div>


</body>
</html>
