<?php
    require('../database_conn.php');

    $userid = $_POST['id'];

    $sql = "DELETE FROM `users` WHERE id = '$userid'";

    $result = mysqli_query($conn, $sql);

    if($result = true){
        header('Location: http://localhost/plant/admin/registered_users.php');
    }

    $conn->close();

?>