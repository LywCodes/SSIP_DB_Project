<?php
    $conn = mysqli_connect("localhost", "root", "", "e_canteen");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $id = $_POST['product_id'];
    $nama = $_POST['product_name'];
    $harga = $_POST['product_price'];
    $sedia = $_POST['product_availability'];

    $sql = "UPDATE menu SET Food='$nama', Price='$harga', Availiblity='$sedia' WHERE id=$id";
    if ($connect->query($sql) === TRUE) {
        echo "Menu successfully Updated";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

    $connect->close();
?>
