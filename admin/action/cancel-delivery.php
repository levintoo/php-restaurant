<?php
include('../../config/constants.php');
include('../partials/login-check.php');
$id = $_GET['id'];

$comment = $_POST['coment'];
$password = $_POST['password'];


 $password = md5($_POST['password']);

 $query = "SELECT * FROM tbl_admin WHERE password ='$password'";

 $result = mysqli_query($db, $query);
 $count = mysqli_num_rows($result);
 if ($count >0){
    $query = "UPDATE tbl_order SET comment = '$comment', delivery_status =3 WHERE id = '$id'";
    $result = mysqli_query($db, $query);
    if ($result == true){
        $_SESSION['wrongpass'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
        <strong class="mx-2">Delivery cancelled sucessfully</strong>
        </div>';
        header('location: http://localhost:7882/wowfood/admin/manage-order.php');   
    }
 }else{
    $_SESSION['wrongpass'] = '<div class="alert alert-success alert-dismissible fade show p-2 w-auto d-flex h-auto align-items-center" role="alert">
    <strong class="mx-2">Administrators password is wrong</strong>
    </div>';
    header('location: http://localhost:7882/wowfood/admin/manage-order.php');
 }
?>