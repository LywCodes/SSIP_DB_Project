<?php

 $connect = mysqli_connect("localhost", "root", "", "e_canteen");
 if (mysqli_connect_error()) {
     die("Connection failed: " . mysqli_connect_error());
 }
?>
<?php
//ini untuk submit button
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
       $product_name = $_POST['product_name'];
       $price = $_POST['price'];
       $description = $_POST['description'];
       $availability = $_POST['availability'];

       $connect = mysqli_connect("localhost", "root", "", "e_canteen");
       if (mysqli_connect_error()) {
           die("Connection failed: " . mysqli_connect_error());
       }
//ini untuk foto2 product 
       $target_pict = "image/";
       $fileNames = basename($_FILES["image"]["name"]);
       $target_file = $target_pict . $fileNames;
       $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
       $image_size = $_FILES["image"]["size"];
       
       if (!isset($_FILES["image"]["tmp_name"])) {
           echo "File is not uploaded.";
           exit();
       }
       if ($image_size > 500000) {
           echo "Sorry, your file is too large.";
           exit();
       }
       if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
           echo "Sorry, only JPG, JPEG & PNG files are allowed.";
           exit();
       }
       if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
           echo "Sorry, there was an error uploading your file.";
           exit();
       }
//ini untuk menggabungkan data2
       $saveQuery = "INSERT INTO product (product_name, product_price, product_description, product_availability, product_image)
           VALUES ('$product_name', '$price', '$description', '$availability', '$fileNames')";

       if (mysqli_query($connect, $saveQuery)) {
           echo "berhasil hehe";
           header("Location: " . $_SERVER['PHP_SELF']);
     exit();
       } else {
           echo "Error: ";
       }
       mysqli_close($connect);
     }
     ?>

<?php
//ini untuk delete
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
    <title>Product Input Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('img/wallpaper.jpg');
            
        }

        h2 {
            padding-top: 30px;
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
            color:black;
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
            background-color: #ffffff;
        }

        table {
    width: 100%;
    color: #343a40; /* Warna teks utama */
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
    color: #343a40; /* Warna teks di dalam sel */
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

        .delete-link {
        color: #fff;
        background-color: #dc3545;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
        display: inline-block;
    }

    .delete-link:hover {
        background-color: orange;
    }
    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">>
            <a class="navbar-brand" href="#"><img src="./img/logo.png" alt="Logo" style="position: absolute; top: 20px; left: 20px; width: 120px; height: auto;"</a>
            <button class="navbar-toggler" type ="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<div class="container">
        <h2>Product Input Form</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 form-container">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Picture URL:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="availability">Availability:</label>
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

    <br>

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
    <?php 
    //ini table bersih dan rapih
        while ($row = $result->fetch_assoc()) {  
    ?>
      <tr>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['product_price']; ?></td>
        <td><?php echo $row['product_image']; ?></td>
        <td><?php echo $row['product_description']; ?></td>
        <td><?php echo $row['product_availability']; ?></td>
      </tr>
    <?php 
        } 
    ?>
  </table>
<?php 
    }
?>

<?php
  $connect->close();
?>

<br>
    <div class="table-container">
            <h2>Product List</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Picture URL</th>
                        <th>Description</th>
                        <th>Availability</th>
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
                    <!--ini table kotor (untuk edit2)-->
                    <tr>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><img src="img/<?php echo $row['product_image']; ?>" alt="Product Image" width="200px"; heigth="200px"; ></td> 
                        <td><?php echo $row['product_description']; ?></td>
                        <td><?php echo $row['product_availability']; ?></td>
                        <td>
                        <a href="?delete_id=<?php echo $row['product_id']; ?>" class="delete-link" onclick="return confirm('Are you sure want to delete this?');">Delete</a>
                            <br>
                            <br>
                            <a href="update.php?id=<?php echo $row['product_id']; ?>"class="delete-link" onclick="return confirm('Are you sure want to uppdate this?');">Update</a>
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
</body>

</html>
