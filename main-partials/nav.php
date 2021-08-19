<?php include('./config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-item" href="#">
                <div class="logo">
                    <a href="#" title="Logo">
                        <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                    </a>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse menu text-right" id="navbarText">
                <div class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <?php if (isset($_SESSION['customerlogin'])) {
                        echo $_SESSION['customerlogin'];
                        unset($_SESSION['customerlogin']);
                    } ?></div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a href="http://localhost:7882/wowfood/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://localhost:7882/wowfood/categories.html">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="foods.html">Foods</a>
                    </li>
                    <li class="nav-item">
                        <a href="#">Contact</a>
                    </li>
                    

                    <?php

                    if (isset($_SESSION['customer'])) {
                        $email = $_SESSION['customer'];

                        $query = "SELECT * FROM tbl_customer WHERE email= '$email'";
                        $result = mysqli_query($db, $query);
                        $row = mysqli_fetch_assoc($result);
                        $username = $row['full_name'];
                        echo '  
                        <li class="user">
                        <a href="http://localhost:7882/wowfood/php/log-out.php" class="badge text-success bg-none p-2">'.$username.'</a>
                        </li>
                        
                        <li class="guest nav-item">
                            <a href="http://localhost:7882/wowfood/php/log-out.php" class="badge bg-success p-2">logout</a>
                            </li>
                          
                    ';
                    } else {
                        echo '<li class="guest nav-item">
                            <a href="http://localhost:7882/wowfood/login.php" class="badge bg-success p-2">login</a>
                        </li>
                        <li class="guest nav-item">
                            <a href="http://localhost:7882/wowfood/register.php" class="btn-sm btn-danger p-2">Register</a>
                        </li>';
                    }


                    ?>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Navbar Section ends Here -->