<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WowFood Admin Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .food-search {
            height: 100vh;
        }
    </style>
</head>

<body>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <h2 class="text-center text-white">Admin Login</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Admin Details</legend>

                    <?php if (isset($_SESSION['no-login-message'])) {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    } ?>
                    <?php if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    } ?>
                    <div class="order-label">Username</div>
                    <input type="text" name="username" placeholder="" class="input-responsive" required>

                    <div class="order-label">Password</div>
                    <input type="password" name="password" placeholder="" class="input-responsive" required>

                    <div class="order-label">Don't have an account yet? <a href="http://localhost:7882/wowfood/admin/add-admin.php"> Sign Up</a> </div>

                    <input type="submit" name="submit" value="login" class="btn btn-primary px-2">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->
    <?php include('./partials/footer.php'); ?>
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = "SELECT * FROM tbl_admin WHERE username ='$username' AND password ='$password'";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
        if ($result == true) {
            if ($count == 1) {
                $_SESSION['user'] = $username;
                $_SESSION['login'] = '<div class="alert text-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                <strong class="me-5">Login successful</strong>
                </div>';
                header('location: http://localhost:7882/wowfood/admin/index.php');
            } else {
                $_SESSION['login'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
                <strong class="me-5">Error check your details</strong>
                </div>';
                header('location: http://localhost:7882/wowfood/admin/login.php');
            }
        } else {
            $_SESSION['login'] = '<div class="alert alert-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="me-5">Stack error</strong>
            </div>';
            header('location: http://localhost:7882/wowfood/admin/login.php');
        }
    } else {
    }

    ?>