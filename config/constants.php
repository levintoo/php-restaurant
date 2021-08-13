<?php 


session_start();

$db = mysqli_connect("localhost", "levo", "levoo.me", "food_order");

define('SITEURL', 'http://localhost:7882/wowfood/');
define('LOCALHOST', 'localhost:7882');
define('DB_USERNAME', 'levo');
define('DB_PASSWORD', 'levo.me');
define('DB_NAME', 'food-order');


?>