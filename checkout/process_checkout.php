<?php
// Koneksi ke database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "e_canteen";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Ambil data dari form
$store_id = $_POST['store_id'];
$customer_id = $_POST['customer_id'];
$order_date = date('Y-m-d');
$order_note = $_POST['order_note'];
$order_seat = $_POST['order_seat'];
$payment_status = "Pending"; // Default status pembayaran

// Query untuk menyimpan data ke dalam tabel orders
$sql = "INSERT INTO orders (store_id, customer_id, order_date, order_note, order_seat) VALUES ('$store_id', '$customer_id', '$order_date', '$order_note', '$order_seat')";
$conn->exec($sql);

// Ambil ID order yang baru saja di-generate
$order_id = $conn->lastInsertId();

// Looping untuk menyimpan detail produk yang dibeli
foreach ($_POST['product_id'] as $index => $product_id) {
    $quantity = $_POST['quantity'][$index];
    $total_price = $_POST['total_price'][$index];

    // Query untuk menyimpan detail produk ke dalam tabel masterkey
    $sql = "INSERT INTO masterkey (order_id, product_id, quantity, total_price) VALUES ('$order_id', '$product_id', '$quantity', '$total_price')";
    $conn->exec($sql);
}

// Query untuk menyimpan data pembayaran ke dalam tabel payment
$total_price = $_POST['total_price'];
$sql = "INSERT INTO payment (order_id, total_price, payment_status) VALUES ('$order_id', '$total_price', '$payment_status')";
$conn->exec($sql);

// Redirect ke halaman terima kasih
header("Location: thank_you.php");
exit();
?>
