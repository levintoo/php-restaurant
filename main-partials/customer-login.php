<?php

if (!isset($_SESSION['customer'])){

    $_SESSION['no-login-message'] = '<p class="text-danger"></p>';
    header('location: http://localhost:7882/wowfood/login.php');
}else{
 
}
?>