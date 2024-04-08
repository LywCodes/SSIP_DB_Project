<?php
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $phone = $_POST["phone"];

        include_once("config.php");
        $query = "INSERT INTO customer (customer_name, customer_number) VALUES (?,?)";
        $result = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($result, "ss", $name, $phone);
        $result->execute();
        $result->close();
        $conn->close();

        if($result){
            header("Location: home.html");
        }
    }
?>