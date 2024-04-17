<?php
require_once '../config.php'; 
session_start();
if(!isset($_SESSION["customer"])){
    header("Location: identification.html");
  }

$store_id = $_GET['store_id'];
$query = "SELECT * FROM product WHERE store_id = $store_id";
$result = mysqli_query($conn, $query);
$storeRes = mysqli_query($conn, "SELECT store_brand, store_id FROM store");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       body {
            background-image: url('../image/wallpaper.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; 
            background-position: center; 
        }
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

        ul li{
            margin-right: 10px;
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
        function checkout(order) {
            var orderJson = JSON.stringify(order);
            var orderQueryParam = encodeURIComponent(orderJson);
            var url = 'payment.php?order=' + orderQueryParam;
            window.location.href = url;
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg" 
    style="background-color:#fcf2e8">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <img src="../source/logo.png" alt="logo" height="45" />
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="btn-group">
                        <a class="btn dropdown-toggle" style="background-color:#F7C566;" href="#" id="navbardrop" data-toggle="dropdown">
                            Check Another Store
                        </a>
                        <div class="dropdown-menu">
                            <?php
                                if(mysqli_num_rows($storeRes) > 0){
                                    while($row = mysqli_fetch_assoc($storeRes)){
                                        echo '<a class="dropdown-item" href="menu.php?store_id='. $row["store_id"].'">' . $row["store_brand"] . '</a>';
                                    }
                                }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-block" style="background-color:#90D26D;" href="./home.php">Back To Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-block" style="background-color:#FA7070;" href="./logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




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
                        echo '<div class="card food-item rounded border-0">'; 
                        echo '<img src="../image/' . $row['product_image'] . '" class="card-img-top rounded" style="max-width: 200px; max-height: 169px; object-fit: cover;" alt="Food Image">';
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
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" onclick="checkout(order)">Checkout</button>
            </div>
        </div>
    </div>


</body>
</html>
