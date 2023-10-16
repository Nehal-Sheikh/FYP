<?php
    require('session_greeter.php');
    require('database_conn.php');

    if(isset($_GET['productId'])){
    
        $product_id = $_GET['productId'];

        $sql = "SELECT * FROM `products` WHERE id = $product_id";

        $result = mysqli_query($conn, $sql);
        if($num =  mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
        };
    
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
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
                        <a class="nav-link" id="color"href="/plant" >Home</a>
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
                        <?php } ?>
                    <div>
                        <form class=" d-flex mx-2" role="search">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success mx-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </ul>
        </div>  
    </nav>


    <!-- BODY -->

    <?php
    if(isset($_POST['submit'])): ?>
        <div class='alert alert-primary' role='alert'>
            <p class='text-center'>Ordered Succesfully</p>
        </div>
    <?php endif; ?>
    <div class="container" style="margin-top: 10rem;">
        <div class="row justify-content-center">
            <div class="col-11 col-lg-6 col-md-10 col-sm-10">                                                                  <!-- here col-lg is controlling the width of the div -->
                <div class="card border-0 shadow">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <svg class="my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                        <h4>YOUR DETAILS</h4>
                        <form action="order_post.php" method="post" style="width: 62%;">
                            <input type="text" name="name" id="name" class="form-control my-4 py-2" placeholder="Full Name" required>
                            <input type="hidden" name="product_name" value="<?php echo $row["product_name"]; ?>" required>
                            <input type="email" name="email" id="email" class="form-control my-4 py-2" placeholder="Email Address" required>
                            <input type="text" name="delivery_address" id="delivery_address" class="form-control my-4 py-2" placeholder="Delivery Address" required>
                            <input type="text" name="city" id="city" class="form-control my-4 py-2" placeholder="City" required>
                            <input type="text" name="phone_number" id="phone_number" class="form-control my-4 py-2" placeholder="Phone Number" required>
                            <h5>Payment Method</h5>
                            <ul>
                                <li>Cash On Delivery</li>
                            </ul>
                            <svg style="margin-left: 2rem;" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                            </svg>
                            <div class="text-center mt-3">
                                <button class="btn btn-primary" type="submit" name="submit">Place Order</button>
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