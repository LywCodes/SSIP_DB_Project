<?php
// Include config file
require_once 'config.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    //The sql statement
    $sql = "select * from store where store_name = ? and store_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);    
    $stmt->execute();
    $result = $stmt->get_result(); 
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: vendorhome.html");
        exit;
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
    $conn->close();

} else {

}
//Run a test, fix the appliance of error message
?>
