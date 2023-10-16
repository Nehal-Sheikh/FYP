<?php
    require('../database_conn.php');

    $order_id = $_POST['order_id'];
    $order_name = $_POST['order_name'];
    $user_name = $_POST['user_name'];
    $delivery_address = $_POST['delivery_address'];
    $city = $_POST['city'];
    $number = $_POST['phone_number'];
    $order_status = $_POST['order_status'];

    $sql = "UPDATE `orders` SET product_name='$order_name', name='$user_name', delivery_address='$delivery_address', city='$city', phone_number='$number', order_status='$order_status' WHERE id= '$order_id'";

    $result = mysqli_query($conn, $sql);
    if($result == true){
        header('Location: http://localhost/plant/admin/orders.php');
    };
?>