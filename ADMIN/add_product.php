<?php
require('../session_handler.php');
require('../database_conn.php');
$insert = false;
if(isset($_POST['submit'])){

    $targetDir = '../images/uploads/';
    
    $name = $_POST['product_name'];
    $category = $_POST['product_category'];
    $price = $_POST['product_price'];

    $_FILES['file']['name'];
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){

        $sql = $conn->query("INSERT INTO `products` (`product_name`, `product_category`, `product_picture`, `product_price`, `created at`) VALUES ('$name', '$category', '$fileName', '$price', current_timestamp());");
        $insert = true;
    };

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
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
                        <a class="nav-link" href="#">Add Products</a>
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

    <?php
    if($insert == true){
    echo("<div class='alert alert-success' role='alert'>
            <p class='text-center'>Product added successfully</p>
        </div>");
    };
    ?>
    <div class="container" style="margin-top: 16rem;">
        <div class="row justify-content-center">
            <div class="col-11 col-lg-6 col-md-10 col-sm-10">
                <div class="card border-0 shadow">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cloud-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                            <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                        </svg>
                        <h4>ADD PRODUCT</h4>
                        <form action="add_product.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="product_name" id="product_name" class="form-control my-4 py-2" placeholder="Product Name" required>
                            <div class="form-group my-2">
                                <label for="product_category">Product Category</label>
                                <select class="form-control" id="product_category" name="product_category">
                                    <option>Summer Plant</option>
                                    <option>Winter Plant</option>
                                    <option>Fertilizer</option>
                                    <option>Gardening Tool</option>
                                    <option>Pot</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_picture">Upload Product Picture</label><br>
                                <input type="file" class="form-control-file" id="product_picture" name="file" required>
                            </div>
                            <input type="number" name="product_price" id="product_price" class="form-control my-4 py-2" placeholder="Product Price" required>
                            <div class="text-center">
                                <button class="btn btn-success" type="submit" name="submit">Add Product</button>
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