<?php
    require('session_greeter.php');
    require('database_conn.php');

    $status = false;
    if(isset($_POST['submit'])){
        $new_password = $_POST['new_password'];
    
        $sql = 'update users set password = "'. $new_password .'"where id = "'. $_SESSION['logged_in_user_id'] .'"';

        if($result = $conn->query($sql)){
            $status = true;
        };
    
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
                    <?php
                        if(isset($_SESSION['logged_in_username'])){ ?>
                            <div class='dropdown' style='margin-left: 2rem;'>
                                <a class='dropdown-toggle nav-link' style="color: inherit;" id='color dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'><?php echo( $_SESSION['logged_in_username'] )?></a>
                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                    <li><a class='dropdown-item' href='order_status.php'>Order Status</a></li>
                                    <li><a class='dropdown-item' href='change_passw.php'>Change Password</a></li>
                                    <li><a class='dropdown-item' href='/plant/admin/logout.php'>Logout</a></li>
                                </ul>
                            </div>        
                        <?php } else ?>
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
    if($status == true){
    echo("<div class='alert alert-success' role='alert'>
            <p class='text-center'>Password Changed Succesfully</p>
        </div>");
    }
    ?>
        <div class="container" style="margin-top: 15rem;">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-4 col-md-7 col-sm-8 ">
                    <div class="card border-0 shadow">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <svg class="my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            <h4>CHANGE PASSWORD</h4>
                            <form action="change_passw.php" method="post">
                                <input type="password" name="new_password" id="new_password" class="form-control my-4 py-2" placeholder="New Password" required>
                                <div class="text-center">
                                    <button class="btn btn-success" type='submit' name='submit'>Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        

    <!-- FOOTER -->
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>