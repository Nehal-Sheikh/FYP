<?php
    require('../session_handler.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    
</head>
<body>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg" id="nav">
        <a class="navbar-brand mx-2" id="color">Online Plants Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-2">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" >Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registered_users.php" id="color">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_product.php" id="color">Add Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_products.php" id="color">Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php" id="color">Manage Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="change_passw.php" id="color">Change Password</a>
                    </li>
                    <div style="margin-left: 2rem;">
                        <a class="nav-link" href="logout.php" style="font-weight: bold">Logout</a>
                    </div>
                </ul>
            </div>
        </div>  
    </nav>



    <!-- BODY -->

    
    <div class="container">
        <h2 class="text-center" style="margin-top: 15rem;">
            WELCOME TO THE ADMIN DASHBOARD
        </h2>
    </div>
    
        

    <!-- FOOTER -->
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>