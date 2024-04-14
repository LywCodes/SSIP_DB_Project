<?php
$id = $_GET["id"]; 
$connect = mysqli_connect("localhost", "root", "", "e_canteen");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
if (isset($_POST['submit'])) {
    $price = $_POST['Price'];
    $availability = $_POST['Availability']; 
    $updateQuery = mysqli_query($connect, "UPDATE product SET product_price = '$price', product_availability = '$availability' WHERE product_id = '$id'");
    if ($updateQuery) {
        header("Location: form.php");
        exit();
    } else {
        echo "<p>Error: " . mysqli_error($connect) . "</p>";
    }
}

$result = mysqli_query($connect, "SELECT * FROM product WHERE product_id=$id");
if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
    $price = $product['product_price']; 
    $availability = $product['product_availability']; 
} else {
    echo "No product found with that ID.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFDD0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        input[type="text"], input[type="file"], select {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        select {
            height: 46px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 0;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .file-upload-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 10px;
            font-size: 16px;
        }
        .file-upload-btn:hover {
            background-color: #45a049;
        }
        .file-upload-btn:focus {
            outline: none;
        }
    </style>
</head>
<body>
<img src="./source/logo.png" alt="Logo" style="position: absolute; top: 20px; center: 50px; width: 200px; height: auto;">
    <div class="container">
        <h1>Update Product</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Price">Price:</label>
                <input type="text" id="Price" name="Price" placeholder="Enter price">
            </div>
            <div class="form-group">
                <label for="Picture">Picture:</label>
                <input type="file" id="Picture" name="Picture" style="display: none;">
                <label for="Picture" class="file-upload-btn">Upload Picture</label>
            </div>
            <div class="form-group">
                <label for="Availability">Availability:</label>
                <select id="Availability" name="Availability">
                    <option value="In Stock">In Stock</option>
                    <option value="Out of Stock">Out of Stock</option>
                </select>
            </div>
            <input type="submit" name="submit" value="Update" />
        </form>
    </div>
</body>
</html>