<?php
  $connect = mysqli_connect("localhost", "root", "", "e_canteen");
  if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
    }
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $availability = $_POST['availability'];

        $connect = mysqli_connect("localhost", "root", "", "e_canteen");
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $saveQuery = "INSERT INTO product (product_name, product_price, product_description, product_availability)
            VALUES ('$product_name', '$price', '$description', '$availability')";

        if ($connect->query($saveQuery) === TRUE) {
            echo "berhasil hehe";
            header("Location: " . $_SERVER['PHP_SELF']);
      exit();
        } else {
            echo "Error: ";
        }
      
        $connect->close();
      }
      ?>
<?php
  if (isset($_GET['delete_id'])) {
      $delete_id = $_GET['delete_id'];
      $delete_query = "DELETE FROM product WHERE product_id = $delete_id";
      if ($connect->query($delete_query) === TRUE) {
          header("Location: " . $_SERVER['PHP_SELF']);
          exit();
      } else {
          echo "Error: " . $connect->error;
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #495057;
        }

        h2 {
            margin-bottom: 30px;
            color: #343a40;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 20px;
            padding: 15px;
        }

        .btn-primary {
            border-radius: 20px;
            padding: 15px 40px;
            font-size: 18px;
            letter-spacing: 1px;
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .table-container {
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #343a40;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .delete-link {
            color: #dc3545;
            text-decoration: none;
            transition: color 0.3s;
        }

        .delete-link:hover {
            color: #bd2130;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Form Input Produk</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 form-container">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="product_name">Nama Produk:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Harga:</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="form-group">
                        <label for="image">URL Gambar:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi:</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="availability">Ketersediaan:</label>
                        <select class="form-control" id="availability" name="availability">
                            <option value="In Stock">In Stock</option>
                            <option value="Out of Stock">Out of Stock</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

<?php
  $connect = mysqli_connect("localhost", "root", "", "e_canteen");
  if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
  }

  $sql = "SELECT * FROM product";
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {
?>
  <table>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['product_price']; ?></td>
        <td><?php echo $row['product_image']; ?></td>
        <td><?php echo $row['product_description']; ?></td>
        <td><?php echo $row['product_availability']; ?></td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>

<?php
  $connect->close();
?>

//delete part
    <div class="table-container">
            <h2>Daftar Produk</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>URL Gambar</th>
                        <th>Deskripsi</th>
                        <th>Ketersediaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            $connect = mysqli_connect("localhost", "root", "", "e_canteen");
            if ($connect->connect_error) {
                die("Connection failed: " . $connect->connect_error);
            }

            $sql = "SELECT * FROM product";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><?php echo $row['product_image']; ?></td> 
                        <td><?php echo $row['product_description']; ?></td>
                        <td><?php echo $row['product_availability']; ?></td>
                        <td>
                            <a href="?delete_id=<?php echo $row['product_id']; ?>">Delete</a> 
                        </td>
                    </tr>
                <?php
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <td>
        <a href="?delete_id=<?php echo $row['product_id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Delete</a>
    </td>
</body>

</html>                   