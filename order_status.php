<?php
    require('session_greeter.php');
    require('database_conn.php');

    $sql = "SELECT * FROM `orders` WHERE user_id='". $_SESSION['logged_in_user_id'] ."'";
    $result = mysqli_query($conn, $sql);
                                
    $num =  mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
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
                                    <li><a class='dropdown-item' href='./order_status.php'>Order Status</a></li>
                                    <li><a class='dropdown-item' href='./change_passw.php'>Change Password</a></li>
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
    <?php if($num <= 0): ?>
        <div style="margin-top: 20rem;">
            <h3 class="text-center">No Orders Found</h3>
        </div>
    <?php else: ?>
        <div class="container" style="margin-top: 10rem;">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-12 col-md-10 col-sm-11">       
                    <h3>Order Status</h3><br><br>
                    <div class="card border-0 shadow">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Order id</th>
                                    <th scope="col">Order Name</th>
                                    <th scope="col">Order Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if($num > 0){

                                        while($row = mysqli_fetch_assoc($result)){
                                            echo("<tr>
                                                    <td scope='row'>" . $row['id'] . "</td>
                                                    <td>" . $row['product_name'] . "</td>
                                                    <td>" . $row['order_status'] . "</td>
                                                </tr>
                                            ");
                                        };
                                    };
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>