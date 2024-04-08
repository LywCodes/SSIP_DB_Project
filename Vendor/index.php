<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Makanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('bg2.jpg'); 
            background-size: cover; 
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            width: 90%;
            max-width: 1200px;
            padding: 20px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #800000;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            animation: slideInDown 1s ease-in-out;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-20px);
            }
            to {
                transform: translateY(0);
            }
        }

        .search-container input[type="text"] {
            width: 70%;
            padding: 10px;
            border: 2px solid #800000;
            border-radius: 5px;
            color: #800000;
            font-size: 16px;
            font-weight: bold;
            outline: none;
        }
        .btn-primary {
            background-color: #800000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background-color: #4c0000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #800000;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn-container {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>The Menu List</h2>
        <div class="search-container">
            <input type="text" id="searchInput" class="form-control" placeholder="Find the name of the food...">
            <a href="add_menu.php" class="btn btn-primary">Add New Menu</a>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Availability</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="menuTable">
                    <?php
                        $connect = mysqli_connect("localhost", "root", "", "e_canteen");
                        if ($connect->connect_error) {
                            die("Connection failed: " . $connect->connect_error);
                        }

                        $sql = "SELECT * FROM menu";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row['product_id']."</td>";
                                echo "<td>".$row['product_name']."</td>";
                                echo "<td>".$row['product_price']."</td>";
                                echo "<td>".$row['product_availability']."</td>";
                                echo "<td><a href='edit_menu.php?id=".$row['product_id']."' class='btn btn-sm btn-primary'>Edit</a> <a href='delete_menu.php?id=".$row['product_id']."' class='btn btn-sm btn-danger'>Hapus</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Tidak ada menu</td></tr>";
                        }
                        $connect->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('#menuTable tr');

            rows.forEach(row => {
                const foodName = row.children[1].textContent.toLowerCase();
                if (foodName.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
