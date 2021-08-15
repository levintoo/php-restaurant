<?php
include('../config/constants.php'); 
session_destroy();
//redirect to login page
header('location: http://localhost:7882/wowfood/admin/login.php');
?>