<?php
    require('session_greeter.php');
    require('database_conn.php');

    if(isset($_GET['search_term'])){

        $search = $_GET['search_term'];

        $sql = "SELECT * FROM `products` where product_name LIKE '%".$_GET['search_term']."%' OR product_category LIKE '%".$_GET['search_term']."%'";
        $result = mysqli_query($conn, $sql);

        $num =  mysqli_num_rows($result);
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
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
                        <?php } else { ?>
                            <div style='margin-left: 1rem;'>
                                <a class='nav-link' href='/plant/login.php' id="color">Login</a>
                            </div>
                        <?php } ?>
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

    <div class="container" style="margin-top: 8rem; ">
    <?php
    if ($num > 0) {
        $card_count = 0; // Initialize a counter variable

        while ($row = mysqli_fetch_assoc($result)) {
            // Start a new row if the counter is divisible by 3
            if ($card_count % 3 == 0) {
                echo '<div class="row" style="margin-bottom: 20px;">';
            } 
            echo ("
                <div class='col-11 col-lg-4 col-md-5 col-sm-6'>
                    <div class='card border-0 shadow' style='border-radius: 2.5%;'>
                        <img src='./images/uploads/" . $row["product_picture"] . "' alt='' class='card-img-top'>
                        <div class='card-body text-center'>
                            <h5 class='card-title'><u>" . $row["product_name"] . "</u></h5>
                            <p class='card-text'>" . $row["product_category"] . "</p>
                            <p class='card-text'><b>Rs." . $row["product_price"] . "</b></p>");
                            if(isset($_SESSION['logged_in_username'])){
                                echo ("<a href='./order_form.php?productId=".$row['id']."' class='btn btn-primary' name='submit'>BUY</a>");
                            } else {
                                echo ("<a href='./login.php' class='btn btn-primary'>BUY</a>");
                            }
                            echo("
                        </div>
                    </div>
                </div>
            ");

            $card_count++; // Increment the counter

            // Close the row div if we have displayed three cards
            if ($card_count % 3 == 0) {
                echo '</div>';
            }
        };

        // Close the row div if there are remaining cards
        if ($card_count % 3 != 0) {
            echo '</div>';
        }
    };
    ?>
</div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>