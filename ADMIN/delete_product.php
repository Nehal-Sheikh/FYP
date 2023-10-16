<?php
    require('../database_conn.php');

    $prodId = $_POST['id'];

    $sql = "DELETE FROM `products` WHERE id = '$prodId'";

    $result = mysqli_query($conn, $sql);

    if($result = true){
        header('Location: http://localhost/plant/admin/manage_products.php');
    }

    $conn->close();

?>