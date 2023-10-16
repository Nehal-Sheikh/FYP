<?php
    require('../database_conn.php');
    $targetDir = '../images/uploads/';

    $prod_id = $_POST['product_id'];
    $prod_name = $_POST['product_name'];
    $prod_category = $_POST['product_category'];
    $prod_price = $_POST['product_price'];

    if(!empty($_FILES['file']['name'])){
        $fileName = basename($_FILES['file']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
            $sql = "UPDATE `products` SET product_name = '$prod_name', product_category = '$prod_category', product_picture = '$fileName', product_price = '$prod_price' WHERE id = '$prod_id'";
            $result = mysqli_query($conn, $sql);
        };
    }else{
        $sql = "UPDATE `products` SET product_name = '$prod_name', product_category = '$prod_category', product_price = '$prod_price' WHERE id = '$prod_id'";
        $result = mysqli_query($conn, $sql);
    };
    if($result == true){
        header('Location: http://localhost/plant/admin/manage_products.php');
    };

?>