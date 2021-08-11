<?php
$db = mysqli_connect("localhost", "root", "", "food_order");
$email = mysqli_real_escape_string($db, $_POST['email']);
$fullname = mysqli_real_escape_string($db, $_POST['full-name']);
$contact = mysqli_real_escape_string($db, $_POST['contact']);
$address = mysqli_real_escape_string($db, $_POST['address']);
$pass = mysqli_real_escape_string($db, $_POST['password']);
$pass = hash('sha512', $pass);
$query = "INSERT into tbl_customer (full_name, contact, email, address, password) VALUES ( '$fullname','$contact', '$email', '$address','$pass')";
$result = mysqli_query($db, $query);
echo "added" ,$email;
?>