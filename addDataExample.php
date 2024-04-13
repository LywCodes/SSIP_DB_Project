<?php
    include("config.php");
    if(isset($_POST["submit"])){
        $brand = $_POST["storeBrand"];
        $openingTime = $_POST["openingTime"];
        $closingTime = $_POST["closingTime"];
        
        $fileName = $_FILES["image"]["name"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
    
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "Invalid image format. Please upload a JPG or JPEG file.";
            exit; 
        }
    
        $newName = uniqid() . '.' . $imageExtension;
        move_uploaded_file($tmpName, 'img/' . $newName); 

        $query = "INSERT INTO store (store_brand, opening_time, closing_time, store_image)
                  VALUES ('$brand', '$openingTime', '$closingTime', '$newName')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
        <label for="storeBrand">Store Brand : </label>
        <input type="text" name="storeBrand"><br><br>
        <label for="openingTime">Opening Time : </label>
        <input type="time" name="openingTime"><br><br>
        <label for="closingTime">Closing Time : </label>
        <input type="time" name="closingTime"><br><br>
        <label for="image">Image : </label>
        <input type="file" name="image" accept=".jpg, .jpeg"><br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>