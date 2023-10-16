<?php
    require('session_greeter.php');
    require('database_conn.php');

    $user_id = $_SESSION["logged_in_user_id"];
    $prod_name = $_POST['product_name'];
    $name = $_POST['name'];
    $email = $_POST["email"];
    $address = $_POST["delivery_address"];
    $city = $_POST["city"];
    $number = $_POST["phone_number"];

    // Execute sql query
    $sql = "INSERT INTO `orders` (`user_id`, `product_name` , `name`, `email`, `delivery_address`, `city`, `phone_number`, `order_time`) VALUES ('$user_id', '$prod_name' , '$name', '$email', '$address', '$city', '$number', current_timestamp())";


    if($conn->query($sql) == true){
        $insert = true;
        header('Location: http://localhost/plant/order_form.php');
    };

    $conn->close();

?>