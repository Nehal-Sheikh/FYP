<?php
    require('../session_handler.php');
    require('../database_conn.php');

    $sql = "SELECT * FROM `products`";
    $result = mysqli_query($conn, $sql);

    $num =  mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
                        <a class="nav-link" href="home.php" id="color">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registered_users.php" id="color">Manage Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_product.php" id="color">Add Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Products</a>
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
    <div class="container" style="margin-top: 10rem;">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12 col-md-10 col-sm-11">
                <h3>Products</h3><br><br>                                                                  <!-- here col-lg is controlling the width of the div -->
                <div class="card border-0 shadow">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product id</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Category</th>
                                    <th scope="col">Product Picture</th>
                                    <th scope="col">Product Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($num > 0){

                                        while($row = mysqli_fetch_assoc($result)){
                                            echo("<tr>
                                                    <td scope='row'>" . $row['id'] . "</td>
                                                    <td>" . $row['product_name'] . "</td>
                                                    <td>" . $row['product_category'] . "</td>
                                                    <td><img src='../images/uploads/".$row['product_picture']."'></td>
                                                    <td>" . $row['product_price'] . "</td>
                                                    <td>
                                                        <form action='edit_product.php' method='post'>
                                                            <input type='hidden' name='id' value='". $row['id'] ."'>
                                                            <button type='submit' class='btn btn-primary' type='submit' name='submit'>EDIT</button>
                                                        </form>
                                                        <form action='./delete_product.php' method='post'>
                                                            <input type='hidden' name='id' value='". $row['id'] ."'>
                                                            <button type='submit' class='btn btn-danger' type='submit' name='submit'>DELETE</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            ");
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>