<?php
    require_once '../config.php';

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT store_id FROM store WHERE store_brand = ? AND store_password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);    
        $stmt->execute();
        $result = $stmt->get_result(); 

        if ($result->num_rows > 0) {
            $id = $result->fetch_assoc();
            $store_id = $id['store_id'];

            session_start();
            $_SESSION['store_id'] = $store_id;
            header("Location: homepage.php");
            exit;
        } else {
            header("Location: vendorlogin.html?error=Invalid username or password");
            exit;
        }
        $stmt->close();
        $conn->close();

    } else {
        header("Location: vendorlogin.html?error=What are you doing?");
    }
?>
