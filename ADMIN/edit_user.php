<?php
    require('../session_handler.php');
    require('../database_conn.php');

    $userid = $_POST['id'];

    $sql = "SELECT * FROM `users` WHERE id = '$userid'";
    $result = mysqli_query($conn, $sql);
    $num =  mysqli_num_rows($result);
    if($num > 0){
        $row = mysqli_fetch_assoc($result);
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
    <div class="container" style="margin-top: 16rem;">
        <div class="row justify-content-center">
            <div class="col-11 col-lg-6 col-md-10 col-sm-10">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <svg class="my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <h4 style="margin-bottom: 30px;">Edit User</h4>
                        <form action="edit_user_post.php" method="post">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $row['id'] ?>">
                            <label for="user_name">User Name</label>
                            <input type="text" name="user_name" id="user_name" class="form-control my-4 py-2" value="<?php echo $row['name']; ?>" required>
                            <label for="user_email">User Email</label>
                            <input type="text" name="user_email" id="user_email" class="form-control my-4 py-2" value="<?php echo $row['email']; ?>" required>
                            <label for="user_password">User Password</label>
                            <input type="text" name="user_password" id="user_password" class="form-control my-4 py-2" value="<?php echo $row['password']; ?>" required>
                            <div class="text-center">
                                <button class="btn btn-success" type="submit" name="submit">Edit Product</button>
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