<?php
    require('../database_conn.php');

    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $sql = "UPDATE `users` SET name='$user_name', email='$user_email', password='$user_password' WHERE id= '$user_id'";

    $result = mysqli_query($conn, $sql);
    if($result == true){
        header('Location: http://localhost/plant/admin/registered_users.php');
    };
?>