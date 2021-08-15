<?php

if (!isset($_SESSION['user'])){

    $_SESSION['no-login-message'] = '<p class="text-danger">please login to access admin panel</p>';
    header('location: http://localhost:7882/wowfood/admin/login.php');
}else{
 
}
?>