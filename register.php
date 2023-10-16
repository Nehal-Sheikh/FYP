<?php
    require('database_conn.php');
    $insert = false;

    if(isset($_POST['submit'])){
    
        // Collect post variables
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO `users` (`name`, `email`, `password`, `created_at`) VALUES ('$name', '$email', '$password', current_timestamp());";

        if($conn->query($sql) == true){
            $insert = true;
        };

        $conn->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    
</head>
<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg" id="nav">
        <a class="navbar-brand mx-2" href="/plant" id="color">Online Plants Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center mx-2" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/plant" id="color">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/plant/Web_Pages/summer_plants.php" id="color">Summer Plants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/plant/Web_Pages/winter_plants.php" id="color">Winter Plants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/plant/Web_Pages/fertilizers.php" id="color">Fertilizers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/plant/Web_Pages/pots.php" id="color">Pots</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/plant/Web_Pages/gardening_tools.php" id="color">Gardening Tools</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/plant/contact_us.php" id="color">Contact Us</a>
                    </li>
                    <div style="margin-left: 2rem;">
                        <a class="nav-link" href="/plant/login.php" id="color">Login</a>
                    </div>
                    <div>
                        <form action="search_result.php" method="GET" class=" d-flex mx-2" role="search">
                            <input class="form-control mr-sm-2" type="text" name="search_term" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success mx-2 my-sm-0" type="submit" name="submit1">Search</button>
                        </form>
                    </div>
                </ul>
        </div>  
    </nav>


    <!-- BODY -->
    <?php
    if($insert == true){
    echo("<div class='alert alert-primary' role='alert'>
            <p class='text-center'>Registered Succesfully</p>
        </div>");
    }
    ?>
        <div class="container" style="margin-top: 15rem;">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-4 col-md-7 col-sm-8">
                    <div class="card border-0 shadow">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <svg class="my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            </svg>
                            <h4>REGISTER</h4>
                            <form action="register.php" method="post">
                                <input type="text" name="name" id="name" class="form-control my-4 py-2" placeholder="Full Name" required>
                                <input type="email" name="email" id="eail" class="form-control my-4 py-2" placeholder="Email Address" required>
                                <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password" required>
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary" type="submit" name="submit">REGISTER</button>
                                    <a href="/plant/login.php" class="nav-link my-4">Already Have An Account? Sign In Now</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>