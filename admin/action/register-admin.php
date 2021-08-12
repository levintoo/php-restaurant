<?php
$db = mysqli_connect("localhost", "levo", "levoo.me", "food_order");
$fullname = mysqli_real_escape_string($db, $_POST['full-name']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$pass = mysqli_real_escape_string($db, $_POST['password']);
$pass = hash('sha512', $pass);
$query = "INSERT into tbl_admin (full_name, username, password) VALUES ( '$fullname','$username','$pass')";
$result = mysqli_query($db, $query);

header("Location: http://localhost:7882/wowfood/admin");
?>