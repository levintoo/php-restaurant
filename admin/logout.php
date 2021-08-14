<?php
//destroy session data
session_destroy();
//redirect to login page
header('location: http://localhost:7882/wowfood/admin/login.php');
?>