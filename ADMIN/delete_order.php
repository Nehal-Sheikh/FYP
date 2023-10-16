<?php
    require('../database_conn.php');

    $orderId = $_POST['id'];

    $sql = "DELETE FROM `orders` WHERE id = '$orderId'";

    $result = mysqli_query($conn, $sql);

    if($result = true){
        header('Location: http://localhost/plant/admin/orders.php');
    }

    $conn->close();

?>