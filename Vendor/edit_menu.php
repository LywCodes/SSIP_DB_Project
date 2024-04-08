<?php
    $connect = mysqli_connect("localhost", "root", "", "e_canteen");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    if(isset($_GET['product_id'])) {
        $id = $_GET['product_id'];
        $sql = "SELECT * FROM menu WHERE product_id=$id";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nama = $row['product_name'];
            $harga = $row['product_price'];
            $sedia = $row['product_availability'];
        } else {
            echo "Menu tidak ditemukan";
        }
    }

    $connect->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Makanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit the Menu</h2>
        <form action="edit_menu_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="nama">ID:</label>
                <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $id; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama">Food:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Price:</label>
                <textarea class="form-control" id="product_price" name="product_price" value="<?php echo $price; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Availability:</label>
                <input type="text" class="form-control" id="product_availability" name="product_availability" value="<?php echo $sedia; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="index.php" class="btn btn-secondary">Go Back</a>
        </form>
    </div>
</body>
</html>
