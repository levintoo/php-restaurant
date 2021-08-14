<?php
session_start();
$db = mysqli_connect("localhost", "levo", "levoo.me", "food_order");
$fullname = mysqli_real_escape_string($db, $_POST['full-name']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$pass = md5(mysqli_real_escape_string($db, $_POST['password']));
$query = "INSERT into tbl_admin (full_name, username, password) VALUES ( '$fullname','$username','$pass')";
$result = mysqli_query($db, $query);
if( $result== true ){
    
    $_SESSION['newuser'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="mx-2">admin added successfully</strong>
    </div>';      
    header("Location: http://localhost:7882/wowfood/admin/manage-admin.php");  
     include('../../config/constants.php'); 
}
else {
    echo "not registered";
}
?>