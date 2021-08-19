<?php

include('../config/constants.php') ;
$email = mysqli_real_escape_string($db, $_POST['email']);
$fullname = mysqli_real_escape_string($db, $_POST['full-name']);
$contact = mysqli_real_escape_string($db, $_POST['contact']);
$address = mysqli_real_escape_string($db, $_POST['address']);
$pass = mysqli_real_escape_string($db, $_POST['password']);
$pass = md5($pass);

$query = "SELECT * FROM tbl_customer WHERE email= '$email'";
$result = mysqli_query($db, $query);
    if ($result == true){
        $count = mysqli_num_rows($result);

        if ($count > 0){
            $_SESSION['emailtaken'] = '<div class="alert text-danger alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
            <strong class="me-5">Email is already registered</strong>
            </div>';
            header('location: http://localhost:7882/wowfood/register.php');
        }else{

            $query = "INSERT into tbl_customer (full_name, contact, email, address, password) VALUES ( '$fullname','$contact', '$email', '$address','$pass')";
            $result = mysqli_query($db, $query);
            
            header("Location: http://localhost:7882/wowfood/index.php");
        }
    }else{

    }


?>