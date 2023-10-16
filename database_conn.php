<?php
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "online_plants_store";

    // Create a database connection
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check for connection success
    if(!$conn){
        die("conection to te database failed due to" . mysqli_connect_error());
    };
    // echo("Connection build succesfully");
?>